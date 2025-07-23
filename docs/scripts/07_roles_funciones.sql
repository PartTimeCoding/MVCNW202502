CREATE TABLE Roles_Funciones (
                                 Cod_Rol INT NOT NULL,
                                 Cod_Funcion INT NOT NULL,
                                 PRIMARY KEY (Cod_Rol, Cod_Funcion),
                                 FOREIGN KEY (Cod_Rol) REFERENCES Roles(Cod_Rol),
                                 FOREIGN KEY (Cod_Funcion) REFERENCES Funciones(Cod_Funcion)
);