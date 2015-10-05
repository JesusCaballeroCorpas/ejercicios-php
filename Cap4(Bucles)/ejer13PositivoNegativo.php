<!DOCTYPE html>
<!--
Capitulo 4 Bucles

Ejercicio 13
Escribe un programa que lea una lista de diez números y determine cuántos son positivos, y cuántos
son negativos.

@author: Jesús Caballero Corpas
-->
<html>
  <head>
    <title>Ejercicio 13 Positivos y Negativos</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <h1>Ejercicios PHP Capitulo 4 Bucles</h1>
      <div align="center">
        <h2>Ejercicio 13 Números Positivos y Negativos</h2>
        
        <?php
          $contador = 0;
          $positivos = 0;
          if(isset($_REQUEST[contador])){
            $contador = $_REQUEST['contador'];
            $numeroIntroducido = $_REQUEST['numeroIntroducido'];
            $positivos = $_REQUEST['positivos'];
            if ($numeroIntroducido >= 0){
              $positivos++;
            }
          }
          
          if($contador == 10){
            echo "Se han introducido ", $positivos , " números positivos y " 
                    , ($contador - $positivos) , " números negativos.";
          } else {
            echo "Introduzca diez números para que comprobemos cuantos son positivos "
            , "y cuantos negativos.<br><br>";
            echo "Hasta ahora ha introducido ", $contador , " números.<br><br>";
            $contador++;?>
            <form action="ejer13PositivoNegativo.php" method="post">
              <input type="number" step="1" name="numeroIntroducido">
              <input type="hidden" name="contador" value=<?= $contador ?>>
              <input type="hidden" name="positivos" value=<?= $positivos ?>>
              <input type="submit" value="Introducir">
            </form>
            <?php
          }
        ?>
        
        <br><br>
        <form action="index.html" method="post">
          <input type="submit" value="Volver">
        </form>
      </div>
  </body>
</html>
