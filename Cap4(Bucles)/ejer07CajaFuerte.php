<!DOCTYPE html>
<!--
Capitulo 4 Bucles

Ejercicio 7
Realiza el control de acceso a una caja fuerte. La combinación será un número de 4 cifras. El
programa nos pedirá la combinación para abrirla. Si no acertamos, se nos mostrará el mensaje
“Lo siento, esa no es la combinación” y si acertamos se nos dirá “La caja fuerte se ha abierto
satisfactoriamente”. Tendremos cuatro oportunidades para abrir la caja fuerte.

@author: Jesús Caballero Corpas
-->
<html>
  <head>
    <title>Ejercicio 7 Caja Fuerte</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <h1>Ejercicios PHP Capitulo 4 Bucles</h1>
      <div align="center">
        <h2>Ejercicio 7 Caja Fuerte</h2>
        
        <?php
          if(!isset($_GET[intentos])){
            $codigo = 11111;
            $intentos = 4;
          } else {
            $codigo = $_GET['codigo'];
            $intentos = $_GET['intentos'];
          }
          
          if($codigo == 5555){
            echo "Ha acertado el código secreto y ha abierto la caja fuerte.";
          } else if($intentos == 0){
            echo "Lo siento ha agotado todos los intentos y la caja fuerte sigue cerrada.";
          } else {
              echo "Introduzca un número de 4 cifras.<br><br>";
              echo "Le quedan ", $intentos , " intentos para abrir la caja fuerte.<br><br>";
              $intentos--;?>
              <form action="ejer07CajaFuerte.php" method="get">
                <input type="number" step="1" min="0" max="9999" name="codigo">
                <input type="hidden" name="intentos" value=<?= $intentos ?>>
                <input type="submit" value="Intentar Abrir">
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
