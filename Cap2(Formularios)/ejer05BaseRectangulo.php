<!DOCTYPE html>
<!--
Capitulo 1 Salida por pantalla y Variables

Ejercicio 5
Escribe un programa que calcule el área de un rectángulo.

@author: Jesús Caballero Corpas
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicio 5 Capitulo 2</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <div align="center">
      <h2>Ejercicio 5 Capitulo 2</h2>
      <?php
        $base = $_GET['base'];
        $altura = $_GET['altura'];
        echo "<h3>Base: ", $base , "<br>Altura: ", $altura, "</h3>";
        echo "Área del Rectángulo: ", $base * $altura, "<br>";
      ?>
    </div>
  </body>
</html>
