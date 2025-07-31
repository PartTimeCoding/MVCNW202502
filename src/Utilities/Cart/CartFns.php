<?php
namespace Utilities\Cart;

class CartFns
{
    /**
     * Tiempo válido para mantener productos en la carretilla de usuarios autenticados (6 horas)
     */
    public static function getAuthTimeDelta()
    {
        return 21600; // 6 * 60 * 60
    }

    /**
     * Tiempo válido para mantener productos en la carretilla anónima (10 minutos)
     */
    public static function getUnAuthTimeDelta()
    {
        return 600; // 10 * 60
    }

    /**
     * Devuelve un código único para la carretilla anónima
     */
    public static function getAnnonCartCode()
    {
        if (isset($_SESSION["annonCartCode"])) {
            return $_SESSION["annonCartCode"];
        }

        $_SESSION["annonCartCode"] = substr(
            md5("libroscart_" . time() . random_int(10000, 99999)),
            0,
            128
        );
        return $_SESSION["annonCartCode"];
    }
}
