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
          //$a = $_REQUEST['a'];
          $a = $_GET['a'];
          $b = $_GET['b'];
          $c = $_GET['c'];
          echo "La ecuación propuesta es: ";
          echo $a, "x² + ", $b , "x + " , $c , " = 0 <br>";
          
          // 0x^2 + 0x + 0 = 0

          if (($a == 0) && ($b == 0) && ($c == 0)) {
            echo "La ecuación tiene infinitas soluciones.";
          }

          // 0x^2 + 0x + c = 0  con c distinto de 0

          if (($a == 0) && ($b == 0) && ($c != 0)) {
            echo "La ecuación no tiene solución.";
          }

          // ax^2 + bx + 0 = 0  con a y b distintos de 0

          if (($a != 0) && ($b != 0) && ($c == 0)) {
            echo "x<sub>1</sub> = 0";
            echo "<br>x<sub>2</sub> = ", (-$b / $a);
          }

          // 0x^2 + bx + c = 0  con b y c distintos de 0

          if (($a == 0) && ($b != 0) && ($c != 0)) {
            echo "x<sub>1</sub> = x<sub>2</sub> = ", (-$c / $b);
          }

          // ax^2 + bx + c = 0  con a, b y c distintos de 0

          if (($a != 0) && ($b != 0) && ($c != 0)) {  

            $discriminante = ($b * $b) - (4 * $a * $c);

            if ($discriminante < 0) {
              echo "La ecuación no tiene soluciones reales";
            } else {
              echo "x<sub>1</sub> = ", (-$b + sqrt($discriminante)) / (4 * $a * $c);
              echo "<br>x<sub>2</sub> = ", (-$b - sqrt($discriminante)) / (4 * $a * $c);
            }
          }
          
          /*if ($a < 0) {
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
                }*/
        ?>
        <br><br>
        <form action="index.html" method="get">
          <input type="submit" value="Volver">
        </form>
      </div>
  </body>
</html>
