<?php

namespace Controllers\Libreria\Historial;

use Controllers\PublicController;
use Views\Renderer;

class Transacciones extends PublicController
{
    private array $viewData;

    public function __construct()
    {
        parent::__construct();
        $this->viewData = [
            "transacciones" => [],
        ];
    }

    public function run(): void
    {
        $this->viewData["transacciones"] = [
            [
                "transaccionId" => 101,
                "usercod" => 1,
                "fecha" => "2025-07-01",
                "monto" => "450.00",
                "estado" => "Completada"
            ],
            [
                "transaccionId" => 102,
                "usercod" => 2,
                "fecha" => "2025-07-02",
                "monto" => "199.99",
                "estado" => "Pendiente"
            ],
            [
                "transaccionId" => 103,
                "usercod" => 3,
                "fecha" => "2025-07-03",
                "monto" => "320.50",
                "estado" => "Cancelada"
            ],
        ];
        Renderer::render("libreria/historial/transacciones", $this->viewData);
    }
}
