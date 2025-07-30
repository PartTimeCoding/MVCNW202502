<?php
namespace Dao\Cart;

use Dao\Table;

class Cart extends Table
{

    public static function getProductosDisponibles()
    {
        $sqlAllProductos = "SELECT * FROM products WHERE productStatus = 'ACT';";
        $productos = self::obtenerRegistros($sqlAllProductos);

        $sqlCarretilla = "SELECT productId, SUM(crrctd) AS reserved
                          FROM carretilla
                          WHERE TIME_TO_SEC(TIMEDIFF(NOW(), crrfching)) <= :delta
                          GROUP BY productId;";
        $reservados = self::obtenerRegistros($sqlCarretilla, [
            "delta" => \Utilities\Cart\CartFns::getAuthTimeDelta()
        ]);

        $sqlCarretillaAnon = "SELECT productId, SUM(crrctd) AS reserved
                              FROM carretillaanon
                              WHERE TIME_TO_SEC(TIMEDIFF(NOW(), crrfching)) <= :delta
                              GROUP BY productId;";
        $reservadosAnon = self::obtenerRegistros($sqlCarretillaAnon, [
            "delta" => \Utilities\Cart\CartFns::getUnAuthTimeDelta()
        ]);

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


    public static function getProductoById($productId)
    {
        $sql = "SELECT * FROM products WHERE productId = :id LIMIT 1;";
        return self::obtenerUnRegistro($sql, ["id" => $productId]);
    }


    public static function getAuthCart($userId)
    {
        $sql = "SELECT c.productId, p.productName, p.productDescription,
                       c.crrctd, c.crrprc
                FROM carretilla c
                INNER JOIN products p ON p.productId = c.productId
                WHERE c.userId = :userId;";
        return self::obtenerRegistros($sql, ["userId" => $userId]);
    }


    public static function addToAuthCart($productId, $userId, $amount, $price)
    {
        $sql = "INSERT INTO carretilla (userId, productId, crrctd, crrprc, crrfching)
                VALUES (:userId, :productId, :amount, :price, NOW())
                ON DUPLICATE KEY UPDATE crrctd = crrctd + :amount, crrfching = NOW();";

        return self::executeNonQuery($sql, [
            "userId"    => $userId,
            "productId" => $productId,
            "amount"    => $amount,
            "price"     => $price
        ]);
    }
}
