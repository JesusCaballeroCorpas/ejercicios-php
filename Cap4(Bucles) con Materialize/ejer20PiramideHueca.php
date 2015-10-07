<!DOCTYPE html>
<!--
Capitulo 4 Bucles

Ejercicio 20
Igual que el ejercicio anterior pero esta vez se debe pintar una pirámide hueca.

@author: Jesús Caballero Corpas
-->
<html>
  <head>
    <title>Ejercicio 20 Piramide Hueca</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <h1>Ejercicios PHP Capitulo 4 Bucles</h1>
      <div align="center">
        <h2>Ejercicio 20 Piramide Hueca</h2>
        
        <?php
          $altura = $_REQUEST['altura'];
          $figura = $_REQUEST['figura'];
          for($i = 0;$i < $altura - 1;$i++) { // Recorro la altura de la piramide.
            echo "<img src='images/" , $figura , ".png' />";
            for($j = 0;$j <= ((2 * $i)-2);$j++){ // Recorro el ancho de la piramide metiendo la figura en blanco.
              echo "<img src='images/blanco.png' />";
            }
            // Inserto la segunda figura.
            if($i >= 1){
              echo "<img src='images/" , $figura , ".png' />";
            }
            echo "<br>";
          }// Final de recorrer la antura de la piramide menos la base.
          for($i = 0;$i < ((2 * $altura) - 1);$i++){ // Inserto la base de la piramide.
            echo "<img src='images/" , $figura , ".png' />";
          }
        ?>
        
        <br><br>
        <form action="index.html" method="post">
          <input type="submit" value="Volver">
        </form>
      </div>
  </body>
</html>
