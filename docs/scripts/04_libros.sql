CREATE TABLE Libros (
                        ID_Libro INT AUTO_INCREMENT PRIMARY KEY,
                        NombreLibro VARCHAR(200) NOT NULL,
                        Precio DECIMAL(10,2) NOT NULL,
                        Stock INT NOT NULL DEFAULT 0,
                        Autor VARCHAR(150) NOT NULL,
                        Categoria INT NOT NULL,
                        Descripcion TEXT,
                        AnioPublicacion INT,
                        Editorial VARCHAR(100),
                        FOREIGN KEY (Categoria) REFERENCES Categoria(ID_Categoria)
);