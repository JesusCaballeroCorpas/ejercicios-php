CREATE DATABASE if not exists gestesimalProfe;
USE gestesimalProfe;

CREATE TABLE articulo (
    codigo VARCHAR(10) NOT NULL,
    descripcion VARCHAR(100) NOT NULL,
    precio_compra DECIMAL(10.2) NOT NULL,
    precio_venta DECIMAL(10.2) NOT NULL,
    stock INT,
    CONSTRAINT PK_articulo PRIMARY KEY (codigo)
);

INSERT INTO articulo VALUES ('COD01','Martillo',5,10,50);
INSERT INTO articulo VALUES ('COD02','Destornillador de Estrella',3,8,50);
INSERT INTO articulo VALUES ('COD03','Destornillador Plano',3,8,100);
INSERT INTO articulo VALUES ('COD04','Serrucho',10,20,20);
INSERT INTO articulo VALUES ('COD05','Lijadora',25,50,10);
INSERT INTO articulo VALUES ('COD06','Papel de lija Grano 1',1,2,500);
