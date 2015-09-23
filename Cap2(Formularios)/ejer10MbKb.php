<!DOCTYPE html>
<!--
Capitulo 1 Salida por pantalla y Variables

Ejercicio 10
Realiza un conversor de Mb a Kb.

@author: Jesús Caballero Corpas
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicio 10 Capitulo 2</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <div align="center">
      <h2>Ejercicio 10 Capitulo 2</h2>
      <?php
        $mb = $_GET['mb'];
        echo $mb," Mb son ", $mb * 1024 ," Kb";
      ?>
    </div>
  </body>
</html>
