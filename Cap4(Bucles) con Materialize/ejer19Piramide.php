<!DOCTYPE html>
<!--
Capitulo 4 Bucles

Ejercicio 19
Realiza un programa que pinte una pirámide por pantalla. La altura se debe pedir por teclado
mediante un formulario. La pirámide estará hecha de bolitas, ladrillos o cualquier otra imagen
de las 5 que se deben dar a elegir mediante un formulario.

@author: Jesús Caballero Corpas
-->
<html>
  <head>
    <title>Ejercicio 19 Piramide</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <h1>Ejercicios PHP Capitulo 4 Bucles</h1>
      <div align="center">
        <h2>Ejercicio 19 Piramide</h2>
        
        <?php
          $altura = $_REQUEST['altura'];
          $figura = $_REQUEST['figura'];
          for($i = 0;$i < $altura;$i++) { // Recorro la altura de la piramide.
            for($j = 0;$j <= (2 * $i);$j++){ // Recorro el ancho de la piramide metiendo la figura.
              echo "<img src='images/" , $figura , ".png' />";
            }
            echo "<br>";
          }
        ?>
        
        <br><br>
        <form action="index.html" method="post">
          <input type="submit" value="Volver">
        </form>
      </div>
  </body>
</html>
