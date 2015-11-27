# ---------------------------------------------------------------------- #
# Script generated with: DeZign for Databases v6.2.1                     #
# Target DBMS:           MySQL 5                                         #
# Project file:          gestesimalConVenta.dez                          #
# Project name:                                                          #
# Author:                                                                #
# Script type:           Database creation script                        #
# Created on:            2015-11-22 08:54                                #
# ---------------------------------------------------------------------- #


# ---------------------------------------------------------------------- #
# Tables                                                                 #
# ---------------------------------------------------------------------- #

# ---------------------------------------------------------------------- #
# Add table "articulo"                                                   #
# ---------------------------------------------------------------------- #

CREATE TABLE `articulo` (
    `CodArt` VARCHAR(10) NOT NULL,
    `DesArt` VARCHAR(100) NOT NULL,
    `PreCom` DECIMAL(10,2) NOT NULL,
    `PreVen` DECIMAL(10,2) NOT NULL,
    `StoArt` INTEGER,
    CONSTRAINT `PK_articulo` PRIMARY KEY (`CodArt`)
);

# ---------------------------------------------------------------------- #
# Add table "venta"                                                      #
# ---------------------------------------------------------------------- #

CREATE TABLE `venta` (
    `CodVen` VARCHAR(10) NOT NULL,
    `FecVen` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT `PK_venta` PRIMARY KEY (`CodVen`)
);

# ---------------------------------------------------------------------- #
# Add table "factura"                                                    #
# ---------------------------------------------------------------------- #

CREATE TABLE `factura` (
    `CodArt` VARCHAR(10) NOT NULL,
    `CodVen` VARCHAR(10) NOT NULL,
    `CanArt` INTEGER NOT NULL,
    `PreArt` DECIMAL(10,2) NOT NULL,
    CONSTRAINT `PK_factura` PRIMARY KEY (`CodArt`, `CodVen`)
);

# ---------------------------------------------------------------------- #
# Foreign key constraints                                                #
# ---------------------------------------------------------------------- #

ALTER TABLE `factura` ADD CONSTRAINT `articulo_factura` 
    FOREIGN KEY (`CodArt`) REFERENCES `articulo` (`CodArt`);

ALTER TABLE `factura` ADD CONSTRAINT `venta_factura` 
    FOREIGN KEY (`CodVen`) REFERENCES `venta` (`CodVen`);
