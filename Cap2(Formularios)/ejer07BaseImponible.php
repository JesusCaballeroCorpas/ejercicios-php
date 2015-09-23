<!DOCTYPE html>
<!--
Capitulo 1 Salida por pantalla y Variables

Ejercicio 7
Escribe un programa que calcule el total de una factura a partir de la base imponible.

@author: Jesús Caballero Corpas
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicio 7 Capitulo 2</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <div align="center">
      <h2>Ejercicio 7 Capitulo 2</h2>
      <?php
        $baseImponible = $_GET['base'];
        echo "Base Imponible: ", $baseImponible , " € <br>";
        echo "IVA: 21% <br>";
        echo "<b>Total Factura: ", ($baseImponible * 1.21), " € </b><br>";
      ?>
    </div>
  </body>
</html>
