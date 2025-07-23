CREATE TABLE Pedidos (
                         ID_Pedido INT AUTO_INCREMENT PRIMARY KEY,
                         ID_Usuario INT NOT NULL,
                         ID_Libro INT NOT NULL,
                         Cantidad INT NOT NULL,
                         Subtotal DECIMAL(10,2) NOT NULL,
                         FOREIGN KEY (ID_Usuario) REFERENCES Usuarios(ID_Usuario),
                         FOREIGN KEY (ID_Libro) REFERENCES Libros(ID_Libro)
);