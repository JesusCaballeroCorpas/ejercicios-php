<!DOCTYPE html>
<!--
Capitulo 1 Salida por pantalla y Variables

Ejercicio 11
Realiza un conversor de Kb a Mb.

@author: Jesús Caballero Corpas
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicio 11 Capitulo 2</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <div align="center">
      <h2>Ejercicio 11 Capitulo 2</h2>
      <?php
        $kb = $_GET['kb'];
        echo $kb," Kb son ", round($kb / 1024, 2) ," Mb";
      ?>
    </div>
  </body>
</html>
