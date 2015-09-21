<!DOCTYPE html>
<!--
Capitulo 1 Salida por pantalla y Variables
Ejercicio 3
Escribe un programa que muestre por pantalla 10 palabras en inglés junto a su correspondiente
traducción al castellano. Las palabras deben estar distribuidas en dos columnas. Utiliza la etiqueta
<table> de HTML.

@author: Jesús Caballero Corpas
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicio 3</title>
  </head>
  <body>
    <table>
      <?php
      echo "<tr><td>ESPAÑOL</td><td>INGLES</td></tr>";
      echo "<tr><td>Hola</td><td>Hello</td></tr>";
      echo "<tr><td>Adios</td><td>Bye</td></tr>";
      echo "<tr><td>Sol</td><td>Sun</td></tr>";
      echo "<tr><td>Luna</td><td>Moon</td></tr>";
      echo "<tr><td>Gato</td><td>Cat</td></tr>";
      echo "<tr><td>Perro</td><td>Dog</td></tr>";
      echo "<tr><td>Chico</td><td>Boy</td></tr>";
      echo "<tr><td>Chica</td><td>Girl</td></tr>";
      echo "<tr><td>Bola</td><td>Ball</td></tr>";
      echo "<tr><td>Lapiz</td><td>Pencil</td></tr>";
      ?>
    </table>
  </body>
</html>
