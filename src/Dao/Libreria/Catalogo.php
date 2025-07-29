<?php

namespace Dao\Libreria;

use Dao\Table;

class Catalogo extends Table
{
    public const categorias = [
        1 => 'Fantasía',
        2 => 'Horror',
        3 => 'Ciencia Ficción/Distopía',
    ];

    public static function ObtenerLibros(): array
    {
        return [
            [
                "id" => 1,
                "nombreLibro" => "El Principito",
                "precio" => 100.0,
                "stock" => 100,
                "autor" => "Antoine de Saint-Exupéry",
                "categoria" => 1,
                "descripcion" => "Libro animado para niños",
                "anioPublicacion" => 2000,
                "editorial" => "HCH",
                "image_url" => "https://via.placeholder.com/300x180?text=El+Principito"
            ],
            [
                "id" => 2,
                "nombreLibro" => "Cien Años de Soledad",
                "precio" => 150.0,
                "stock" => 200,
                "autor" => "Gabriel García Márquez",
                "categoria" => 2,
                "descripcion" => "Obra maestra del realismo mágico",
                "anioPublicacion" => 1967,
                "editorial" => "Sudamericana",
                "image_url" => "https://via.placeholder.com/300x180?text=Cien+Anios+Soledad"
            ],
            [
                "id" => 3,
                "nombreLibro" => "Don Quijote de la Mancha",
                "precio" => 120.0,
                "stock" => 80,
                "autor" => "Miguel de Cervantes",
                "categoria" => 2,
                "descripcion" => "Clásico de la literatura española",
                "anioPublicacion" => 1605,
                "editorial" => "Francisco de Robles",
                "image_url" => "https://via.placeholder.com/300x180?text=Don+Quijote"
            ],
            [
                "id" => 4,
                "nombreLibro" => "1984",
                "precio" => 90.0,
                "stock" => 60,
                "autor" => "George Orwell",
                "categoria" => 3,
                "descripcion" => "Distopía política sobre vigilancia y control",
                "anioPublicacion" => 1949,
                "editorial" => "Secker & Warburg",
                "image_url" => "https://via.placeholder.com/300x180?text=1984"
            ],
            [
                "id" => 5,
                "nombreLibro" => "Harry Potter y la piedra filosofal",
                "precio" => 130.0,
                "stock" => 150,
                "autor" => "J.K. Rowling",
                "categoria" => 1,
                "descripcion" => "Inicio de la saga del joven mago",
                "anioPublicacion" => 1997,
                "editorial" => "Bloomsbury",
                "image_url" => "https://via.placeholder.com/300x180?text=Harry+Potter+1"
            ],
            [
                "id" => 6,
                "nombreLibro" => "El Hobbit",
                "precio" => 110.0,
                "stock" => 75,
                "autor" => "J.R.R. Tolkien",
                "categoria" => 1,
                "descripcion" => "Aventura fantástica en la Tierra Media",
                "anioPublicacion" => 1937,
                "editorial" => "Allen & Unwin",
                "image_url" => "https://via.placeholder.com/300x180?text=El+Hobbit"
            ],
            [
                "id" => 7,
                "nombreLibro" => "Orgullo y Prejuicio",
                "precio" => 95.0,
                "stock" => 90,
                "autor" => "Jane Austen",
                "categoria" => 2,
                "descripcion" => "Novela romántica clásica inglesa",
                "anioPublicacion" => 1813,
                "editorial" => "T. Egerton",
                "image_url" => "https://via.placeholder.com/300x180?text=Orgullo+Prejuicio"
            ],
            [
                "id" => 8,
                "nombreLibro" => "La Odisea",
                "precio" => 85.0,
                "stock" => 50,
                "autor" => "Homero",
                "categoria" => 2,
                "descripcion" => "Viaje épico del héroe Odiseo",
                "anioPublicacion" => -800,
                "editorial" => "Clásicos Griegos",
                "image_url" => "https://via.placeholder.com/300x180?text=La+Odisea"
            ],
            [
                "id" => 9,
                "nombreLibro" => "Rayuela",
                "precio" => 140.0,
                "stock" => 60,
                "autor" => "Julio Cortázar",
                "categoria" => 2,
                "descripcion" => "Novela experimental e innovadora",
                "anioPublicacion" => 1963,
                "editorial" => "Sudamericana",
                "image_url" => "https://via.placeholder.com/300x180?text=Rayuela"
            ],
            [
                "id" => 10,
                "nombreLibro" => "El Alquimista",
                "precio" => 105.0,
                "stock" => 110,
                "autor" => "Paulo Coelho",
                "categoria" => 2,
                "descripcion" => "Fábula sobre seguir los sueños",
                "anioPublicacion" => 1988,
                "editorial" => "Rocco",
                "image_url" => "https://via.placeholder.com/300x180?text=El+Alquimista"
            ],
            [
                "id" => 11,
                "nombreLibro" => "Fahrenheit 451",
                "precio" => 98.0,
                "stock" => 85,
                "autor" => "Ray Bradbury",
                "categoria" => 3,
                "descripcion" => "Crítica a la censura y quema de libros",
                "anioPublicacion" => 1953,
                "editorial" => "Ballantine Books",
                "image_url" => "https://via.placeholder.com/300x180?text=Fahrenheit+451"
            ],
            [
                "id" => 12,
                "nombreLibro" => "Matar a un ruiseñor",
                "precio" => 115.0,
                "stock" => 70,
                "autor" => "Harper Lee",
                "categoria" => 2,
                "descripcion" => "Novela sobre justicia y racismo",
                "anioPublicacion" => 1960,
                "editorial" => "J.B. Lippincott & Co.",
                "image_url" => "https://via.placeholder.com/300x180?text=Matar+Ruise%C3%B1or"
            ],
            [
                "id" => 13,
                "nombreLibro" => "Drácula",
                "precio" => 100.0,
                "stock" => 60,
                "autor" => "Bram Stoker",
                "categoria" => 3,
                "descripcion" => "Clásico de la literatura gótica",
                "anioPublicacion" => 1897,
                "editorial" => "Archibald Constable",
                "image_url" => "https://via.placeholder.com/300x180?text=Dracula"
            ],
            [
                "id" => 14,
                "nombreLibro" => "Los juegos del hambre",
                "precio" => 125.0,
                "stock" => 100,
                "autor" => "Suzanne Collins",
                "categoria" => 3,
                "descripcion" => "Distopía juvenil de supervivencia",
                "anioPublicacion" => 2008,
                "editorial" => "Scholastic",
                "image_url" => "https://via.placeholder.com/300x180?text=Juegos+Hambre"
            ],
            [
                "id" => 15,
                "nombreLibro" => "La sombra del viento",
                "precio" => 135.0,
                "stock" => 95,
                "autor" => "Carlos Ruiz Zafón",
                "categoria" => 2,
                "descripcion" => "Misterio literario en Barcelona",
                "anioPublicacion" => 2001,
                "editorial" => "Planeta",
                "image_url" => "https://via.placeholder.com/300x180?text=Sombra+Viento"
            ]
        ];
    }

    public static function ObtenerLibrosFiltrados($categoriaId = null): array
    {
        $todosLosLibros = self::ObtenerLibros();
        $librosFiltrados = [];

        // Normalizamos categoría
        $categoriaId = (is_numeric($categoriaId)) ? (int)$categoriaId : null;

        foreach ($todosLosLibros as $libro) {
            $libro['nombreCategoria'] = self::categorias[$libro['categoria']] ?? 'Desconocida';
            if ($categoriaId === null || $libro['categoria'] === $categoriaId) {
                $librosFiltrados[] = $libro;
            }
        }
        return $librosFiltrados;
    }

    public static function ObtenerCategoriasDisponibles(): array
    {
        return self::categorias;
    }
}
