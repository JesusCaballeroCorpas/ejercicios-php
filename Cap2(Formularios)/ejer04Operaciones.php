<!DOCTYPE html>
<!--
Capitulo 1 Salida por pantalla y Variables

Ejercicio 4
Escribe un programa que sume, reste, multiplique y divida dos números introducidos por teclado.

@author: Jesús Caballero Corpas
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicio 4 Capitulo 2</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <div align="center">
      <h2>Ejercicio 4 Capitulo 2</h2>
      <?php
        $primerNumero = $_GET['factor1'];
        $segundoNumero = $_GET['factor2'];
        echo "<h3>Primer Número: ", $primerNumero , "<br>Segundo Número: ", $segundoNumero, "</h3>";
        echo "Resultado de la suma: ", $primerNumero + $segundoNumero, "<br>";
        echo "Resultado de la resta: ", $primerNumero - $segundoNumero, "<br>";
        echo "Resultado de la multiplicación: ", $primerNumero * $segundoNumero, "<br>";
        echo "Resultado de la división: ", round($primerNumero / $segundoNumero), "<br>";
      ?>
    </div>
  </body>
</html>
