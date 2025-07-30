<?php
namespace Dao\Cart;

use Dao\Table;

class Cart extends Table
{
    /**
     * Obtiene todos los productos disponibles con stock actualizado
     * considerando los productos reservados en las carretillas.
     */
    public static function getProductosDisponibles()
    {
        $sqlAllProductos = "SELECT * FROM products WHERE productStatus = 'ACT';";
        $productos = self::obtenerRegistros($sqlAllProductos);

        // Stock reservado (carretilla de usuarios logueados)
        $sqlCarretilla = "SELECT productId, SUM(crrctd) AS reserved
                          FROM carretilla
                          WHERE TIME_TO_SEC(TIMEDIFF(NOW(), crrfching)) <= :delta
                          GROUP BY productId;";
        $reservados = self::obtenerRegistros($sqlCarretilla, [
            "delta" => \Utilities\Cart\CartFns::getAuthTimeDelta()
        ]);

        // Stock reservado (carretilla anónima)
        $sqlCarretillaAnon = "SELECT productId, SUM(crrctd) AS reserved
                              FROM carretillaanon
                              WHERE TIME_TO_SEC(TIMEDIFF(NOW(), crrfching)) <= :delta
                              GROUP BY productId;";
        $reservadosAnon = self::obtenerRegistros($sqlCarretillaAnon, [
            "delta" => \Utilities\Cart\CartFns::getUnAuthTimeDelta()
        ]);

        // Ajustar el stock
        $productosAjustados = [];
        foreach ($productos as $prod) {
            $productosAjustados[$prod["productId"]] = $prod;
        }

        foreach (array_merge($reservados, $reservadosAnon) as $res) {
            if (isset($productosAjustados[$res["productId"]])) {
                $productosAjustados[$res["productId"]]["productStock"] -= $res["reserved"];
            }
        }

        return array_values($productosAjustados);
    }

    /**
     * Obtiene el detalle de un producto por ID.
     */
    public static function getProductoById($productId)
    {
        $sql = "SELECT * FROM products WHERE productId = :id LIMIT 1;";
        return self::obtenerUnRegistro($sql, ["id" => $productId]);
    }
}
