<?php

namespace Controllers\Libreria;

use Controllers\PublicController;
use Views\Renderer;
use Dao\Libreria\Catalogo as CatalogoDAO;

class Catalogo extends PublicController {
    public function run(): void {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $categoriaSeleccionada = (isset($_GET['categoria']) && $_GET['categoria'] !== '') 
            ? $_GET['categoria'] 
            : null;

        $Libros = CatalogoDAO::ObtenerLibrosFiltrados($categoriaSeleccionada);
        $categoriasDisponibles = CatalogoDAO::ObtenerGenerosDisponibles();

        $categoriasRender = [];
        foreach ($categoriasDisponibles as $nombreGenero) {
            $categoriasRender[] = [
                "id" => $nombreGenero,  // usar el nombre como id
                "nombre" => $nombreGenero,
                "selected" => ($categoriaSeleccionada === $nombreGenero) ? 'selected' : ''
            ];
        }

        $carritoCount = 0;
        if (isset($_SESSION["carrito"])) {
            foreach ($_SESSION["carrito"] as $item) {
                $carritoCount += $item["cantidad"];
            }
        }

        $viewData = [
            "mensaje" => "Librería",
            "libreria" => $Libros,
            "categorias" => $categoriasRender,
            "selected_null" => ($categoriaSeleccionada === null) ? 'selected' : '',
            "carrito_count" => $carritoCount
        ];

        Renderer::render("libreria/catalogo", $viewData);
    }
}
