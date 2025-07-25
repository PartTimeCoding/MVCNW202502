<?php

namespace Dao\Libreria\Historial;

use Dao\Table;

class Transacciones extends Table
{
    public static function obtenerHistorialPorUsuario($userId)
    {
        return self::obtenerRegistros(
            "SELECT * FROM transacciones WHERE usercod = :userId ORDER BY fecha DESC",
            ["userId" => $userId]
        );
    }

    public static function obtenerHistorialCompleto()
    {
        return self::obtenerRegistros(
            "SELECT * FROM transacciones ORDER BY fecha DESC",
            []
        );
    }
}
