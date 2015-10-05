<!DOCTYPE html>
<!--
Capitulo 4 Bucles

Ejercicio 16
Escribe un programa que diga si un número introducido por teclado es o no primo. Un número
primo es aquel que sólo es divisible entre él mismo y la unidad.

@author: Jesús Caballero Corpas
-->
<html>
  <head>
    <title>Ejercicio 16 Números Primos</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <h1>Ejercicios PHP Capitulo 4 Bucles</h1>
      <div align="center">
        <h2>Ejercicio 16 Números Primos</h2>
        
        <?php
          $primo = 0;
          $numeroIntroducido = $_GET['numero'];
          for($i = 1;$i <= $numeroIntroducido;$i++) {
            if(($numeroIntroducido % $i) == 0) {
              $primo++;
            } 
          }
          if($primo <= 2) {
            echo "El " , $numeroIntroducido , " SI es un número primo.";
          } else {
            echo "El " , $numeroIntroducido , " NO es un número primo.";
          }
        ?>
        
        <br><br>
        <form action="index.html" method="post">
          <input type="submit" value="Volver">
        </form>
      </div>
  </body>
</html>
