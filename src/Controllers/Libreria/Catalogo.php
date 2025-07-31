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

        $generoSeleccionado = (isset($_GET['genero']) && $_GET['genero'] !== '') 
            ? $_GET['genero'] 
            : null;

        $Libros = CatalogoDAO::ObtenerLibrosFiltrados($generoSeleccionado);
        $generosDisponibles = CatalogoDAO::ObtenerGenerosDisponibles();

        $generosRender = [];
        foreach ($generosDisponibles as $nombreGenero) {
            $generosRender[] = [
                "id" => $nombreGenero,
                "nombre" => $nombreGenero,
                "selected" => ($generoSeleccionado === $nombreGenero) ? 'selected' : ''
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
            "generos" => $generosRender,
            "selected_genero_null" => ($generoSeleccionado === null) ? 'selected' : '',
            "carrito_count" => $carritoCount
        ];

        Renderer::render("libreria/catalogo", $viewData);
    }
}
