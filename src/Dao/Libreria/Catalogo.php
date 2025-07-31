<?php

namespace Dao\Libreria;

use Dao\Table;

class Catalogo extends Table{

    public static function obtenerLibros(): array{
        $sqlstr= "SELECT * FROM Libros;";
        return self::obtenerRegistros($sqlstr, [] );
    }

   public static function obtenerLibrosFiltrados(?string $categoriaNombre = null): array {
    $sql = "SELECT * FROM libros";
    $params = [];

    if (!empty($categoriaNombre)) {
        $sql .= " WHERE libroGenero = :categoria";
        $params['categoria'] = $categoriaNombre;  
    }

    return self::obtenerRegistros($sql, $params);
}


    public static function obtenerCategoriasDisponibles(): array {
        $sql = "SELECT DISTINCT libroGenero FROM libros ORDER BY libroGenero ASC";
        $result = self::obtenerRegistros($sql, []);
        return array_column($result, 'libroGenero');
    }



}
