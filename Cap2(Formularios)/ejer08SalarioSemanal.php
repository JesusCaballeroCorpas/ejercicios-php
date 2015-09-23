<!DOCTYPE html>
<!--
Capitulo 1 Salida por pantalla y Variables

Ejercicio 8
Escribe un programa que calcule el salario semanal de un trabajador en base a las horas trabajadas.
Se pagarán 12 euros por hora.

@author: Jesús Caballero Corpas
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicio 8 Capitulo 2</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <div align="center">
      <h2>Ejercicio 8 Capitulo 2</h2>
      <?php
        $horas = $_GET['horas'];
        echo "Total Horas: ", $horas , " <br>";
        echo "Precio Hora: 12€ <br>";
        echo "<b>Salario Semanal: ", ($horas * 12), " € </b><br>";
      ?>
    </div>
  </body>
</html>
