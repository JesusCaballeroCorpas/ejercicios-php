<!DOCTYPE html>
<!--
Capitulo 1 Salida por pantalla y Variables
Ejercicio 4
Escribe un programa que muestre tu horario de clase mediante una tabla. Aunque se puede hacer
íntegramente en HTML (igual que los ejercicios anteriores), ve intercalando código HTML y PHP
para familiarizarte con éste último.

@author: Jesús Caballero Corpas
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <table border="1">
      <?php
      echo "<tr><td></td><td>LUNES</td><td>MARTES</td><td>MIERCOLES</td><td>JUEVES</td><td>VIERNES</td></tr>";
      echo "<tr><td>8:15 - 9:15</td><td>DAWES</td><td>DEWC</td><td>DWES</td><td>DWEC</td><td>DIW</td></tr>";
      echo "<tr><td>9:15 - 10:15</td><td>DAWES</td><td>DEWC</td><td>DWES</td><td>DWEC</td><td>DIW</td></tr>";
      echo "<tr><td>10:15 - 11:15</td><td>DAWES</td><td>DEWC</td><td>DWES</td><td>DWEC</td><td>DIW</td></tr>";
      echo "<tr><td>11:45 - 12:45</td><td>EINEM</td><td>DAW</td><td>HLC</td><td>EINEM</td><td>DIW</td></tr>";
      echo "<tr><td>12:45 - 13:45</td><td>DIW</td><td>DAW</td><td>HLC</td><td>EINEM</td><td>DWES</td></tr>";
      echo "<tr><td>13:45 - 14:45</td><td>DIW</td><td>DAW</td><td>HLC</td><td>EINEM</td><td>DWES</td></tr>";
      ?>
    </table>
  </body>
</html>
