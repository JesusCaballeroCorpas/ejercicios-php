# ---------------------------------------------------------------------- #
# Script generated with: DeZign for Databases v6.2.1                     #
# Target DBMS:           MySQL 5                                         #
# Project file:          Tienda.dez                                      #
# Project name:                                                          #
# Author:                                                                #
# Script type:           Database creation script                        #
# Created on:            2015-11-19 17:45                                #
# ---------------------------------------------------------------------- #


# ---------------------------------------------------------------------- #
# Tables                                                                 #
# ---------------------------------------------------------------------- #

# ---------------------------------------------------------------------- #
# Add table "JUEGOS"                                                     #
# ---------------------------------------------------------------------- #
CREATE DATABASE tienda;
USE tienda;

CREATE TABLE juegos (
    codigo VARCHAR(10) NOT NULL,
    nombre VARCHAR(60) NOT NULL,
    precio DECIMAL NOT NULL,
    imagen VARCHAR(40),
    detalle VARCHAR(500),
    CONSTRAINT PK_JUEGOS PRIMARY KEY (codigo)
);

INSERT INTO juegos VALUES ('COD01','7 Wonders',40,'7Wonders.png','Juego de cartas de 2 a 7 jugadores con una duración media de 45 minutos.');
INSERT INTO juegos VALUES ('COD02','Carcassonne',20,'carcassonne.png','Juego de tablero de 2 a 4 jugadores con una duración entre 30 y 45 minutos.');
INSERT INTO juegos VALUES ('COD03','Caylus',42,'caylus.png','Juego de tablero de 2 a 4 jugadores con una duración media de 1 hora y 30 minutos.');
INSERT INTO juegos VALUES ('COD04','La Villa',28,'lavilla.png','Juego de tablero de 2 a 4 jugadores con una duración media de 1 hora y 20 minutos.');
