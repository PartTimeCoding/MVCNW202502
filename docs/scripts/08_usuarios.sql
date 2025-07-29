CREATE TABLE Usuarios (
                          ID_Usuario INT AUTO_INCREMENT PRIMARY KEY,
                          Nombre VARCHAR(100) NOT NULL,
                          Apellido VARCHAR(100) NOT NULL,
                          Contraseña VARCHAR(255) NOT NULL,
                          Correo VARCHAR(120) NOT NULL UNIQUE,
                          FechaCreacion DATETIME DEFAULT NOW(),
                          Cod_Rol INT NOT NULL,
                          FOREIGN KEY (Cod_Rol) REFERENCES Roles(Cod_Rol)
);