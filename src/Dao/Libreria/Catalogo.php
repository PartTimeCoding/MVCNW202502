<?php

namespace Dao\Libreria;

use Dao\Table;

class Catalogo extends Table {
    public const generos = [
        1 => 'Fantasía',
        2 => 'Horror',
        3 => 'Ciencia Ficción',
    ];

    public static function ObtenerLibros(): array
    {
        return [
            [
                "id" => 1,
                "nombreLibro" => "El Principito",
                "precio" => "L. 350",
                "stock" => 100,
                "autor" => "Antoine de Saint-Exupéry",
                "genero" => 1,
                "descripcion" => "Libro animado para niños",
                "anioPublicacion" => 2000,
                "editorial" => "HCH",
                "image_url" => "https://via.placeholder.com/300x180?text=El+Principito"
            ],
            [
                "id" => 2,
                "nombreLibro" => "Cien Años de Soledad",
                "precio" => "L. 500",
                "stock" => 200,
                "autor" => "Gabriel García Márquez",
                "genero" => 2,
                "descripcion" => "Obra maestra del realismo mágico",
                "anioPublicacion" => 1967,
                "editorial" => "Sudamericana",
                "image_url" => "https://via.placeholder.com/300x180?text=Cien+Anios+Soledad"
            ],
            [
                "id" => 3,
                "nombreLibro" => "Don Quijote de la Mancha",
                "precio" => "L. 420",
                "stock" => 80,
                "autor" => "Miguel de Cervantes",
                "genero" => 2,
                "descripcion" => "Clásico de la literatura española",
                "anioPublicacion" => 1605,
                "editorial" => "Francisco de Robles",
                "image_url" => "https://via.placeholder.com/300x180?text=Don+Quijote"
            ],
            [
                "id" => 4,
                "nombreLibro" => "1984",
                "precio" => "L. 310",
                "stock" => 60,
                "autor" => "George Orwell",
                "genero" => 3,
                "descripcion" => "Distopía política sobre vigilancia y control",
                "anioPublicacion" => 1949,
                "editorial" => "Secker & Warburg",
                "image_url" => "https://via.placeholder.com/300x180?text=1984"
            ],
            [
                "id" => 5,
                "nombreLibro" => "Harry Potter y la piedra filosofal",
                "precio" => "L. 600",
                "stock" => 150,
                "autor" => "J.K. Rowling",
                "genero" => 1,
                "descripcion" => "Inicio de la saga del joven mago",
                "anioPublicacion" => 1997,
                "editorial" => "Bloomsbury",
                "image_url" => "https://via.placeholder.com/300x180?text=Harry+Potter+1"
            ],
            [
                "id" => 6,
                "nombreLibro" => "El Hobbit",
                "precio" => "L. 470",
                "stock" => 75,
                "autor" => "J.R.R. Tolkien",
                "genero" => 1,
                "descripcion" => "Aventura fantástica en la Tierra Media",
                "anioPublicacion" => 1937,
                "editorial" => "Allen & Unwin",
                "image_url" => "https://via.placeholder.com/300x180?text=El+Hobbit"
            ],
            [
                "id" => 7,
                "nombreLibro" => "Orgullo y Prejuicio",
                "precio" => "L. 320",
                "stock" => 90,
                "autor" => "Jane Austen",
                "genero" => 2,
                "descripcion" => "Novela romántica clásica inglesa",
                "anioPublicacion" => 1813,
                "editorial" => "T. Egerton",
                "image_url" => "https://via.placeholder.com/300x180?text=Orgullo+Prejuicio"
            ],
            [
                "id" => 8,
                "nombreLibro" => "La Odisea",
                "precio" => "L. 290",
                "stock" => 50,
                "autor" => "Homero",
                "genero" => 2,
                "descripcion" => "Viaje épico del héroe Odiseo",
                "anioPublicacion" => -800,
                "editorial" => "Clásicos Griegos",
                "image_url" => "https://via.placeholder.com/300x180?text=La+Odisea"
            ],
            [
                "id" => 9,
                "nombreLibro" => "Rayuela",
                "precio" => "L. 540",
                "stock" => 60,
                "autor" => "Julio Cortázar",
                "genero" => 2,
                "descripcion" => "Novela experimental e innovadora",
                "anioPublicacion" => 1963,
                "editorial" => "Sudamericana",
                "image_url" => "https://via.placeholder.com/300x180?text=Rayuela"
            ],
            [
                "id" => 10,
                "nombreLibro" => "El Alquimista",
                "precio" => "L. 400",
                "stock" => 110,
                "autor" => "Paulo Coelho",
                "genero" => 2,
                "descripcion" => "Fábula sobre seguir los sueños",
                "anioPublicacion" => 1988,
                "editorial" => "Rocco",
                "image_url" => "https://via.placeholder.com/300x180?text=El+Alquimista"
            ],
            [
                "id" => 11,
                "nombreLibro" => "Fahrenheit 451",
                "precio" => "L. 360",
                "stock" => 85,
                "autor" => "Ray Bradbury",
                "genero" => 3,
                "descripcion" => "Crítica a la censura y quema de libros",
                "anioPublicacion" => 1953,
                "editorial" => "Ballantine Books",
                "image_url" => "https://via.placeholder.com/300x180?text=Fahrenheit+451"
            ],
            [
                "id" => 12,
                "nombreLibro" => "Matar a un ruiseñor",
                "precio" => "L. 430",
                "stock" => 70,
                "autor" => "Harper Lee",
                "genero" => 2,
                "descripcion" => "Novela sobre justicia y racismo",
                "anioPublicacion" => 1960,
                "editorial" => "J.B. Lippincott & Co.",
                "image_url" => "https://via.placeholder.com/300x180?text=Matar+Ruise%C3%B1or"
            ],
            [
                "id" => 13,
                "nombreLibro" => "Drácula",
                "precio" => "L. 380",
                "stock" => 60,
                "autor" => "Bram Stoker",
                "genero" => 2,
                "descripcion" => "Clásico de la literatura gótica",
                "anioPublicacion" => 1897,
                "editorial" => "Archibald Constable",
                "image_url" => "https://via.placeholder.com/300x180?text=Dracula"
            ],
            [
                "id" => 14,
                "nombreLibro" => "Los juegos del hambre",
                "precio" => "L. 550",
                "stock" => 100,
                "autor" => "Suzanne Collins",
                "genero" => 3,
                "descripcion" => "Distopía juvenil de supervivencia",
                "anioPublicacion" => 2008,
                "editorial" => "Scholastic",
                "image_url" => "https://via.placeholder.com/300x180?text=Juegos+Hambre"
            ],
            [
                "id" => 15,
                "nombreLibro" => "La sombra del viento",
                "precio" => "L. 470",
                "stock" => 95,
                "autor" => "Carlos Ruiz Zafón",
                "genero" => 2,
                "descripcion" => "Misterio literario en Barcelona",
                "anioPublicacion" => 2001,
                "editorial" => "Planeta",
                "image_url" => "https://via.placeholder.com/300x180?text=Sombra+Viento"
            ]
        ];
    }

    public static function ObtenerLibrosFiltrados($generoId = null): array {
        $todosLosLibros = self::ObtenerLibros();
        $librosFiltrados = [];

        $generoId = (is_numeric($generoId)) ? (int)$generoId : null;

        foreach ($todosLosLibros as $libro) {
            $libro['nombreGenero'] = self::generos[$libro['genero']] ?? 'Desconocido';
            if ($generoId === null || $libro['genero'] === $generoId) {
                $librosFiltrados[] = $libro;
            }
        }
        return $librosFiltrados;
    }

    public static function ObtenerGenerosDisponibles(): array {
        return self::generos;
    }
}
