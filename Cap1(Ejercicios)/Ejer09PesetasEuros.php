<!DOCTYPE html>
<!--
Capitulo 1 Salida por pantalla y Variables

Ejercicio 9
Realiza un conversor de pesetas a euros. La cantidad en pesetas que se quiere convertir deberá estar
almacenada en una variable.

@author: Jesús Caballero Corpas
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicio 9</title>
  </head>
  <body>
    <form>
    <?php
      $pesetas = 1000;
      echo $pesetas, " pesetas son ", $pesetas / 166.386 , " €";
    ?>
    </form>
  </body>
</html>