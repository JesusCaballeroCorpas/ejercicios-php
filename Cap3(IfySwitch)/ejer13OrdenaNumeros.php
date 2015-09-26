<!DOCTYPE html>
<!--
Capitulo 3 If y Switch

Ejercicio 13
Escribe un programa que ordene tres números enteros introducidos por teclado.

@author: Jesús Caballero Corpas
-->
<html>
  <head>
    <title>Ejercicio 13 Ordena Números</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <h1>Ejercicios PHP Capitulo 3. If y Switch</h1>
      <div align="center">
        <h2>Ejercicio 13 Ordena Números</h2>
        <?php
          $num1 = $_GET['num1'];
          $num2 = $_GET['num2'];
          $num3 = $_GET['num3'];
          
          
          $mayor = ($num1 > $num2 && $num1 > $num3) ? $num1 : (($num2 > $num3) ? $num2 : $num3);
          $menor = ($num1 < $num2 && $num1 < $num3) ? $num1 : (($num2 < $num3) ? $num2 : $num3); 
          $medio = ($num1 != $mayor && $num1 != $menor) ? $num1 : 
                   (($num2 != $mayor && $num2 != $menor) ? $num2 : $num3);
                  
          echo "Los números ordenados de menor a mayor son: " , $menor ," ", $medio ," ", $mayor;
        ?>
        <br><br>
        <form action="index.html" method="get">
          <input type="submit" value="Volver">
        </form>
      </div>
  </body>
</html>
