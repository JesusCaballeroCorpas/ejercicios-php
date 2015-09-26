<!DOCTYPE html>
<!--
Capitulo 3 If y Switch

Ejercicio 9
Realiza un programa que resuelva una ecuación de segundo grado (del tipo ax 2 + bx + c = 0).

@author: Jesús Caballero Corpas
-->
<html>
  <head>
    <title>Ejercicio 9 Ecuaciones</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <h1>Ejercicios PHP Capitulo 3. If y Switch</h1>
      <div align="center">
        <h2>Ejercicio 9</h2>
        <?php
          $a = $_GET['a'];
          $b = $_GET['b'];
          $c = $_GET['c'];
          echo "La ecuación propuesta es: ";
          echo $a, "x² + ", $b , "x + " , $c , " = 0 <br>";
          if ($a < 0) {
            echo "Como a es negativo multiplicamos los dos miebros por -1 <br>";
            echo "(-1) * (" , $a, "x² + ", $b , "x + " , $c , ") = (-1) * 0 <br>";
            $a = -$a;
            $b = -$b;
            $c = -$c;
            echo "Y nos queda así: ";
            echo $a, "x² + ", $b , "x + " , $c , " = 0 <br>";
          }
          $raizCuadrada = (($b * $b) - (4 * $a * $c));
          if ($raizCuadrada < 0) {
            echo "La ecuación no tiene solución <br>";
          } else if ( $a == 0 ) {
              echo "Como a es 0 se nos queda una ecuación de primer grado <br>";
              echo $b , "x + " , $c , " = 0 <br>";
              echo "SOLUCION: "; 
              echo "x = ", -$c / $b ;
            } else if ($raizCuadrada == 0 ) {
                echo "SOLUCION: "; 
                echo "x = ", (-$b + Math.sqrt( ($b * $b) - (4 * $a * $c) ) ) / (2 * $a);
              } else if ( $raizCuadrada > 0 ) {
                  echo "La ecuación tiene dos soluciones:  <br>"; 
                  echo "x1 = ", (-$b + Math.sqrt( ($b * $b) - (4 * $a * $c) ) ) / (2 * $a) ," <br>";
                  echo "x2 = ", (-$b - Math.sqrt( ($b * $b) - (4 * $a * $c) ) ) / (2 * $a);
                }
        ?>
        <br><br>
        <form action="index.html" method="get">
          <input type="submit" value="Volver">
        </form>
      </div>
  </body>
</html>
