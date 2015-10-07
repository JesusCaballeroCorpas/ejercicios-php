<!DOCTYPE html>
<!--
Capitulo 4 Bucles

Ejercicio 10
Escribe un programa que calcule la media de un conjunto de números positivos introducidos por
teclado. A priori, el programa no sabe cuántos números se introducirán. El usuario indicará que ha
terminado de introducir los datos cuando meta un número negativo.

@author: Jesús Caballero Corpas
-->
<html>
  <head>
    <title>Ejercicio 10 Media Numeros Positivos</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <h1>Ejercicios PHP Capitulo 4 Bucles</h1>
      <div align="center">
        <h2>Ejercicio 10 Media Numeros Positivos</h2>
        
        <?php
          $contador = 0;
          if(isset($_POST[contador])){
            $contador = $_POST['contador'];
            $numeroIntroducido = $_POST['numeroIntroducido'];
            $suma = $_POST['suma'];
            $suma += $numeroIntroducido;
          }
          
          if($numeroIntroducido < 0){
            echo "La media de los ", --$contador , " números introducidos es: " , ($suma / --$contador) ;
          } else {
            echo "Vaya introduciendo números positivos para calcular la media, "
            , "y cuando quiera terminar introduzca uno negativo.<br><br>";
            echo "Hasta ahora ha introducido ", $contador , " números.<br><br>";
            $contador++;?>
            <form action="ejer10Media.php" method="post">
              <input type="number" step="1" name="numeroIntroducido">
              <input type="hidden" name="contador" value=<?= $contador ?>>
              <input type="hidden" name="suma" value=<?= $suma ?>>
              <input type="submit" value="Calcular">
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
