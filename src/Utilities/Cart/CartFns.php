<?php
namespace Utilities\Cart;

class CartFns
{
    /**
     * Tiempo máximo (en segundos) que una carretilla de usuario autenticado
     * puede reservar productos (6 horas).
     */
    public static function getAuthTimeDelta()
    {
        return 21600; // 6 horas
    }

    /**
     * Tiempo máximo (en segundos) que una carretilla anónima
     * puede reservar productos (10 minutos).
     */
    public static function getUnAuthTimeDelta()
    {
        return 600; // 10 minutos
    }

    /**
     * Genera o recupera el código de carrito anónimo para un usuario no logueado.
     */
    public static function getAnnonCartCode()
    {
        if (isset($_SESSION["annonCartCode"])) {
            return $_SESSION["annonCartCode"];
        }
        $_SESSION["annonCartCode"] = substr(
            md5("cart202502" . time() . random_int(10000, 99999)),
            0,
            128
        );
        return $_SESSION["annonCartCode"];
    }
}
