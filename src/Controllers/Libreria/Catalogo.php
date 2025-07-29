<?php

namespace Controllers\Libreria;

use Controllers\PublicController;
use Views\Renderer;
use Dao\Libreria\Catalogo as CatalogoDAO;

class Catalogo extends PublicController
{
    private string $HolaMessage;

    public function run(): void
    {
        // Si 'categoria' no está definida o está vacía, será null
        $categoriaSeleccionada = (isset($_GET['categoria']) && $_GET['categoria'] !== '')
            ? $_GET['categoria']
            : null;

        // Obtener libros según la categoría
        $Libros = CatalogoDAO::ObtenerLibrosFiltrados($categoriaSeleccionada);

        // Categorías
        $categoriasDisponibles = CatalogoDAO::ObtenerCategoriasDisponibles();

        $this->HolaMessage = "Libreria";

        // Construimos categorías para la vista
        $categoriasRender = [];
        foreach ($categoriasDisponibles as $id => $nombre) {
            $categoriasRender[] = [
                "id" => $id,
                "nombre" => $nombre,
                "selected" => ((int)$categoriaSeleccionada === $id) ? 'selected' : ''
            ];
        }

        $viewData = [
            "mensaje" => $this->HolaMessage,
            "libreria" => $Libros, // Siempre lleva libros
            "categorias" => $categoriasRender,
            "selected_null" => ($categoriaSeleccionada === null) ? 'selected' : ''
        ];

        Renderer::render("libreria/catalogo", $viewData);
    }
}
