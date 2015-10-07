<!DOCTYPE html>
<!--
Capitulo 4 Bucles

Ejercicio 23
Escribe un programa que permita ir introduciendo una serie indeterminada de números hasta que la
suma de ellos supere el valor 10000. Cuando esto último ocurra, se debe mostrar el total acumulado,
el contador de los números introducidos y la media.

@author: Jesús Caballero Corpas
-->
<html>
  <head>
    <title>Ejercicio 23 Estadistica de números</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <h1>Ejercicios PHP Capitulo 4 Bucles</h1>
      <div align="center">
        <h2>Ejercicio 23 Estadistica de números</h2>
        <h3>CALCULA SUMA, MEDIA y TOTAL DE NUMEROS HASTA 10.000</h3>
        <p>Por favor, introduzca números enteros hasta que el total de ellos sume 10.000</p>
        <?php
          $contador = 0;
          $numeroIntroducido = 0;
          $suma = 0;
         if(isset($_REQUEST['contador'])){
            $contador = $_REQUEST['contador'];
            $numeroIntroducido = $_REQUEST['numeroIntroducido'];
            $suma = $_REQUEST['suma'];
            $suma += $numeroIntroducido;
          }
          
          if($suma >= 10000){?>
            <p>La suma total es: <?= $suma; ?></p>
            <p>La media de todos los números es: <?= ($suma / $contador); ?></p>
            <p>El total de número introducidos es: <?= $contador; ?></p>
          <?php
          } else {
            echo "<p>La suma total hasta ahora es: " , $suma , " </p>";
            $contador++; ?>
            <form action="ejer23EstadisticaNumeros.php" method="post">
              <input type="number" step="1" name="numeroIntroducido">
              <input type="hidden" name="contador" value=<?= $contador; ?>>
              <input type="hidden" name="suma" value=<?= $suma; ?>>
              <input type="submit" value="Añadir">
            </form>
            
          <?php } ?>
        
        <br>
        <form action="index.html" method="post">
          <input type="submit" value="Volver">
        </form>
      </div>
  </body>
</html>
