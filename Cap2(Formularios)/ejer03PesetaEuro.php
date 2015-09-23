<!DOCTYPE html>
<!--
Capitulo 1 Salida por pantalla y Variables

Ejercicio 3
Realiza un conversor de pesetas a euros. La cantidad en pesetas que se quiere convertir se deberá
introducir por teclado.

@author: Jesús Caballero Corpas
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicio 3 Capitulo 2</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <div align="center">
      <h2>Ejercicio 3 Capitulo 2</h2><br>
      <?php
        echo $_GET['peseta']," pts son ", round(($_GET['peseta'] / 166.386),2) ," €";
      ?>
    </div>
  </body>
</html>
