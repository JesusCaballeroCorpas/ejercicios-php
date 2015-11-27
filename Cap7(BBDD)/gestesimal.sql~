# ---------------------------------------------------------------------- #
# De cada artículo se debe saber el código, la descripción, el precio de #
# compra, el precio de venta y el stock (número de unidades). La entrada #
# y salida de mercancía supone respectivamente el incremento y           #
# decremento de stock de un determinado artículo. Hay que controlar que  #
# no se pueda sacar más mercancía de la que hay en el almacén. El        #
# programa debe tener, al menos, las siguientes funcionalidades: listado,#
# alta, baja, modificación, entrada de mercancía y salida de mercancía.  #
# ---------------------------------------------------------------------- #
CREATE DATABASE if not exists gestesimal;
USE gestesimal;

CREATE TABLE if not exists articulo (
    CodArt VARCHAR(10) NOT NULL,
    DesArt VARCHAR(100) NOT NULL,
    PreCom DECIMAL(10.2) NOT NULL,
    PreVen DECIMAL(10.2) NOT NULL,
    StoArt INT,
    CONSTRAINT PK_articulo PRIMARY KEY (CodArt)
);

CREATE TABLE if not exists venta(
    CodVen VARCHAR(10) NOT NULL,
    FecVen DATETIME NOT NULL,
    PRIMARY KEY (CodVen)
);

CREATE TABLE if not exists factura(
    CodVen VARCHAR(10) NOT NULL,
    CodArt VARCHAR(10) NOT NULL,
    CanArt INT NOT NULL,
    PreArt DECIMAL(10.2) NOT NULL,
    PRIMARY KEY (CodVen,CodArt),
    FOREIGN KEY (CodVen) REFERENCES venta (CodVen) 
	ON UPDATE no action 
	ON DELETE no action,
    FOREIGN KEY (CodArt) REFERENCES articulo (CodArt) 
	ON UPDATE no action 
	ON DELETE no action
);

INSERT INTO articulo VALUES ('COD01','Martillo',5,10,50);
INSERT INTO articulo VALUES ('COD02','Destornillador de Estrella',3,8,50);
INSERT INTO articulo VALUES ('COD03','Destornillador Plano',3,8,100);
INSERT INTO articulo VALUES ('COD04','Serrucho',10,20,20);
INSERT INTO articulo VALUES ('COD05','Lijadora',25,50,10);
INSERT INTO articulo VALUES ('COD06','Papel de lija Grano 1',1,2,500);
