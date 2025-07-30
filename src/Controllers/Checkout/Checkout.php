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


        $viewData["carretilla"] = Cart::getAuthCart(Security::getUserId());

        if ($this->isPostBack()) {
            $processPayment = true;


            if (isset($_POST["removeOne"]) || isset($_POST["addOne"])) {
                $productId = intval($_POST["productId"]);
                $productoDisp = Cart::getProductoById($productId);

                $amount = isset($_POST["removeOne"]) ? -1 : 1;

                // Agregar producto si hay stock
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


                $viewData["carretilla"] = Cart::getAuthCart(Security::getUserId());
                $processPayment = false;
            }

            // Proceso de pago con PayPal (opcional)
            if ($processPayment && !empty($viewData["carretilla"])) {
                $PayPalOrder = new \Utilities\Paypal\PayPalOrder(
                    "order_" . time(),
                    "http://localhost/mvcNW202502/index.php?page=Checkout_Error",
                    "http://localhost/mvcNW202502/index.php?page=Checkout_Accept"
                );

                foreach ($viewData["carretilla"] as $producto) {
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


        if (method_exists($this, 'render')) {
            $this->render("checkout", $viewData);
        } else {
            // Si tu controlador no usa "render", ajusta al método de tu framework
            $this->renderView("checkout", $viewData);
        }
    }
}
