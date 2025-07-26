<?php

namespace Controllers\Libreria;

use Controllers\PublicController;
use Views\Renderer;
use Dao\Libreria\Catalogo as CatalogoDAO;

class Catalogo extends PublicController {
    private string $HolaMessage;

    public function run(): void {
        // Llama al método del DAO
        $Libros = CatalogoDAO::ObtenerLibros();

        $this->HolaMessage = "Libreria";

        Renderer::render("libreria/catalogo", [
            "mensaje" => $this->HolaMessage,
            "libreria" => $Libros
        ]);
    }
}
