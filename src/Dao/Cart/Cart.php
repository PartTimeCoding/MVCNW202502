<?php
namespace Dao\Cart;

use Dao\Table;

class Cart extends Table
{
    public static function getLibrosDisponibles()
    {
        $sqlAll = "SELECT * FROM libros WHERE libroEstado = 'ACT';";
        $libros = self::obtenerRegistros($sqlAll);

        $sqlCrr = "SELECT libroId, SUM(crrctd) AS reserved
                   FROM carretilla
                   WHERE TIME_TO_SEC(TIMEDIFF(NOW(), crrfching)) <= :delta
                   GROUP BY libroId;";
        $resAut = self::obtenerRegistros($sqlCrr, [
            "delta" => \Utilities\Cart\CartFns::getAuthTimeDelta()
        ]);

        $sqlAnon = "SELECT libroId, SUM(crrctd) AS reserved
                    FROM carretillaanon
                    WHERE TIME_TO_SEC(TIMEDIFF(NOW(), crrfching)) <= :delta
                    GROUP BY libroId;";
        $resAnon = self::obtenerRegistros($sqlAnon, [
            "delta" => \Utilities\Cart\CartFns::getUnAuthTimeDelta()
        ]);

        $librosFinal = [];
        foreach ($libros as $libro) {
            $librosFinal[$libro["libroId"]] = $libro;
        }

        foreach (array_merge($resAut, $resAnon) as $res) {
            if (isset($librosFinal[$res["libroId"]])) {
                $librosFinal[$res["libroId"]]["libroStock"] -= $res["reserved"];
            }
        }

        return array_values($librosFinal);
    }

    public static function getLibroById($libroId)
    {
        $sql = "SELECT * FROM libros WHERE libroId = :id LIMIT 1;";
        return self::obtenerUnRegistro($sql, ["id" => $libroId]);
    }

    public static function getAuthCart($usercod)
    {
        $sql = "SELECT c.libroId, l.libroNombre, l.libroDescripcion,
                       c.crrctd, c.crrprc
                FROM carretilla c
                INNER JOIN libros l ON l.libroId = c.libroId
                WHERE c.usercod = :usercod;";
        return self::obtenerRegistros($sql, ["usercod" => $usercod]);
    }

    public static function addToAuthCart($libroId, $usercod, $amount, $price)
    {
        $sql = "INSERT INTO carretilla (usercod, libroId, crrctd, crrprc, crrfching)
                VALUES (:usercod, :libroId, :amount, :price, NOW())
                ON DUPLICATE KEY UPDATE crrctd = crrctd + :amount, crrfching = NOW();";

        return self::executeNonQuery($sql, [
            "usercod" => $usercod,
            "libroId" => $libroId,
            "amount"  => $amount,
            "price"   => $price
        ]);
    }
}
