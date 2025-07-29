CREATE TABLE `ordenes` (
    `ordenId` INT AUTO_INCREMENT PRIMARY KEY,
    `usercod` BIGINT(10) NOT NULL,
    `fechaOrden` DATETIME DEFAULT NOW(),
    `estado` ENUM('Pendiente', 'Completado', 'Cancelado', 'Enviado') DEFAULT 'Pendiente',
    `montoTotal` DECIMAL(12, 2) NOT NULL,
    FOREIGN KEY (`usercod`) REFERENCES `usuario`(`usercod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `pedidos` (
    `pedidoId` INT AUTO_INCREMENT PRIMARY KEY,
    `ordenId` INT NOT NULL,
    `libroId` INT NOT NULL,
    `cantidad` INT NOT NULL,
    `precioUnitario` DECIMAL(12, 2) NOT NULL,
    FOREIGN KEY (`ordenId`) REFERENCES `ordenes`(`ordenId`),
    FOREIGN KEY (`libroId`) REFERENCES `libros`(`libroId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `transacciones` (
    `transaccionId` INT AUTO_INCREMENT PRIMARY KEY,
    `ordenId` INT NOT NULL,
    `paypalData` JSON,  -- Almacena el JSON completo de PayPal
    `fechaTransaccion` DATETIME DEFAULT NOW(),
    `estado` ENUM('Aprobado', 'Rechazado', 'Pendiente'),
    FOREIGN KEY (`ordenId`) REFERENCES `ordenes`(`ordenId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;