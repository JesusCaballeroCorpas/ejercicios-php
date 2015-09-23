<!DOCTYPE html>
<!--
Capitulo 1 Salida por pantalla y Variables

Ejercicio 9
Escribe un programa que calcule el volumen de un cono mediante la fórmula V = 1/3 πr 2 h.

@author: Jesús Caballero Corpas
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicio 9 Capitulo 2</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head
  <body>
    <div align="center">
      <h2>Ejercicio 9 Capitulo 2</h2>
      <?php
        $radio = $_GET['radio'];
        $altura = $_GET['altura'];
        echo "<h3>Radio: ", $radio , "<br>Altura: ", $altura, "</h3>";
        echo "Volumen del Cono: ", round((pi() * pow($radio, 2) * $altura) / 3, 2), " <br>";
      ?>
    </div>
  </body>
</html>
