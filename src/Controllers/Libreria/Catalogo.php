<?php

namespace Controllers\Libreria;

use Controllers\PublicController;
use Views\Renderer;
use Dao\Libreria\Catalogo as CatalogoDAO;

class Catalogo extends PublicController {
    private string $HolaMessage;

    public function run(): void {
        $generoSeleccionado = (isset($_GET['categoria']) && $_GET['categoria'] !== '') 
            ? $_GET['categoria'] 
            : null;

        $Libros = CatalogoDAO::ObtenerLibrosFiltrados($generoSeleccionado);

        $generosDisponibles = CatalogoDAO::ObtenerGenerosDisponibles();

        $this->HolaMessage = "Librería";

        $generosRender = [];
        foreach ($generosDisponibles as $id => $nombre) {
            $generosRender[] = [
                "id" => $id,
                "nombre" => $nombre,
                "selected" => ((int)$generoSeleccionado === $id) ? 'selected' : ''
            ];
        }

        $viewData = [
            "mensaje" => $this->HolaMessage,
            "libreria" => $Libros,
            "categorias" => $generosRender,
            "selected_null" => ($generoSeleccionado === null) ? 'selected' : ''
        ];

        Renderer::render("libreria/catalogo", $viewData);
    }
}
