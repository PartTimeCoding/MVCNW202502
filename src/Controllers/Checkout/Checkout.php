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

        // Obtener la carretilla del usuario autenticado
        $carretilla = Cart::getAuthCart(Security::getUserId());

        // Procesar productos para calcular row, subtotal y total
        foreach ($carretilla as $prod) {
            $prod["row"] = $counter;
            $prod["subtotal"] = number_format($prod["crrprc"] * $prod["crrctd"], 2);
            $total += $prod["crrprc"] * $prod["crrctd"];
            $prod["crrprc"] = number_format($prod["crrprc"], 2);
            $finalCarretilla[] = $prod;
            $counter++;
        }

        $viewData["carretilla"] = $finalCarretilla;
        $viewData["total"] = number_format($total, 2);

        if ($this->isPostBack()) {
            $processPayment = true;

            // Botones + o -
            if (isset($_POST["removeOne"]) || isset($_POST["addOne"])) {
                $productId = intval($_POST["productId"]);
                $productoDisp = Cart::getProductoById($productId);

                $amount = isset($_POST["removeOne"]) ? -1 : 1;

                if ($amount === 1 && $productoDisp["productStock"] > 0) {
                    Cart::addToAuthCart(
                        $productId,
                        Security::getUserId(),
                        $amount,
                        $productoDisp["productPrice"]
                    );
                } elseif ($amount === -1) {
                    Cart::addToAuthCart(
                        $productId,
                        Security::getUserId(),
                        $amount,
                        $productoDisp["productPrice"]
                    );
                }

                // Recargar carretilla y recalcular totales
                $finalCarretilla = [];
                $counter = 1;
                $total = 0;
                $carretilla = Cart::getAuthCart(Security::getUserId());
                foreach ($carretilla as $prod) {
                    $prod["row"] = $counter;
                    $prod["subtotal"] = number_format($prod["crrprc"] * $prod["crrctd"], 2);
                    $total += $prod["crrprc"] * $prod["crrctd"];
                    $prod["crrprc"] = number_format($prod["crrprc"], 2);
                    $finalCarretilla[] = $prod;
                    $counter++;
                }
                $viewData["carretilla"] = $finalCarretilla;
                $viewData["total"] = number_format($total, 2);
                $processPayment = false;
            }

            // Proceso de pago con PayPal
            if ($processPayment && !empty($finalCarretilla)) {
                $PayPalOrder = new \Utilities\Paypal\PayPalOrder(
                    "order_" . time(),
                    "http://localhost/mvcNW202502/index.php?page=Checkout_Error",
                    "http://localhost/mvcNW202502/index.php?page=Checkout_Accept"
                );

                foreach ($finalCarretilla as $producto) {
                    $PayPalOrder->addItem(
                        $producto["productName"],
                        $producto["productDescription"] ?? "",
                        $producto["productId"],
                        $producto["crrprc"],
                        0,
                        $producto["crrctd"],
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

        // Renderizar vista
        $this->renderView("checkout", $viewData);
    }
}
