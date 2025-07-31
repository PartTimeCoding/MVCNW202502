<?php

namespace Controllers\Checkout;

use Controllers\PublicController;
use Dao\Cart\Cart;
use Utilities\Security;

class Checkout extends PublicController
{
    public function run(): void
    {
        $viewData = [];
        $finalCarretilla = [];
        $counter = 1;
        $total = 0;

        $carretilla = Cart::getAuthCart(Security::getUserId());

        foreach ($carretilla as $libro) {
            $libro["row"] = $counter;
            $libro["subtotal"] = number_format($libro["crrprc"] * $libro["crrctd"], 2);
            $total += $libro["crrprc"] * $libro["crrctd"];
            $libro["crrprc"] = number_format($libro["crrprc"], 2);
            $finalCarretilla[] = $libro;
            $counter++;
        }

        $viewData["carretilla"] = $finalCarretilla;
        $viewData["total"] = number_format($total, 2);

        if ($this->isPostBack()) {
            $processPayment = true;

            if (isset($_POST["removeOne"]) || isset($_POST["addOne"])) {
                $libroId = intval($_POST["productId"]);
                $libro = Cart::getLibroById($libroId);
                $amount = isset($_POST["removeOne"]) ? -1 : 1;

                if ($amount === 1 && $libro["libroStock"] > 0) {
                    Cart::addToAuthCart(
                        $libroId,
                        Security::getUserId(),
                        $amount,
                        $libro["libroPrecio"]
                    );
                } elseif ($amount === -1) {
                    Cart::addToAuthCart(
                        $libroId,
                        Security::getUserId(),
                        $amount,
                        $libro["libroPrecio"]
                    );
                }

                // Recalcular carretilla
                $finalCarretilla = [];
                $counter = 1;
                $total = 0;
                $carretilla = Cart::getAuthCart(Security::getUserId());

                foreach ($carretilla as $libro) {
                    $libro["row"] = $counter;
                    $libro["subtotal"] = number_format($libro["crrprc"] * $libro["crrctd"], 2);
                    $total += $libro["crrprc"] * $libro["crrctd"];
                    $libro["crrprc"] = number_format($libro["crrprc"], 2);
                    $finalCarretilla[] = $libro;
                    $counter++;
                }

                $viewData["carretilla"] = $finalCarretilla;
                $viewData["total"] = number_format($total, 2);
                $processPayment = false;
            }

            // PayPal (opcional)
            if ($processPayment && !empty($finalCarretilla)) {
                $PayPalOrder = new \Utilities\Paypal\PayPalOrder(
                    "order_" . time(),
                    "http://localhost/mvcNW202502/index.php?page=Checkout_Error",
                    "http://localhost/mvcNW202502/index.php?page=Checkout_Accept"
                );

                foreach ($finalCarretilla as $libro) {
                    $PayPalOrder->addItem(
                        $libro["libroNombre"],
                        $libro["libroDescripcion"] ?? "",
                        $libro["libroId"],
                        $libro["crrprc"],
                        0,
                        $libro["crrctd"],
                        "DIGITAL_GOODS"
                    );
                }

                $PayPalRestApi = new \Utilities\PayPal\PayPalRestApi(
                    \Utilities\Context::getContextByKey("PAYPAL_CLIENT_ID"),
                    \Utilities\Context::getContextByKey("PAYPAL_CLIENT_SECRET")
                );
                $PayPalRestApi->getAccessToken();
                $response = $PayPalRestApi->createOrder($PayPalOrder);

                $_SESSION["orderid"] = $response->id;
                foreach ($response->links as $link) {
                    if ($link->rel === "approve") {
                        \Utilities\Site::redirectTo($link->href);
                    }
                }
            }
        }

        $this->renderView("checkout", $viewData);
    }
}
