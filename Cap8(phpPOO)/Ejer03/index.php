<!DOCTYPE html>
<?php
  session_start();
  
  //Includes
  include_once 'Zona.php';
          
  //Si no se reciben las zonas se crean estas 3;
  if(!isset($_SESSION['zonas'])){
    $_SESSION['zonas'] = serialize([new Zona("Sala Principal", 1000),
                                    new Zona("Compra-Venta", 200),
                                    new Zona("VIP", 25)]);
    $_SESSION['numZonas'] = Zona::getNumZonas();
  }
  $zonas = unserialize($_SESSION['zonas']);
?>
<!--
Ejercicio 3

Queremos gestionar la venta de entradas (no numeradas) de Expocoches Campanillas que tiene
3 zonas, la sala principal con 1000 entradas disponibles, la zona de compra-venta con 200 entradas
disponibles y la zona vip con 25 entradas disponibles. Hay que controlar que existen entradas
antes de venderlas. Define las clase Zona con sus atributos y métodos correspondientes y crea
un programa que permita vender las entradas. En la pantalla principal debe aparecer información
sobre las entradas disponibles y un formulario para vender entradas. Debemos indicar para qué
zona queremos las entradas y la cantidad de ellas. Lógicamente, el programa debe controlar que no
se puedan vender más entradas de la cuenta.

 @author: Jesús Caballero Corpas
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta author="Jesús Caballero Corpas">
        <title>Expocampanillas</title>
        <link rel="stylesheet" href="css/jquery-ui.min.css" />
        <script src="js/jquery.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        <!--<link rel="stylesheet" href="css/style.css" />-->
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/bootstrap-theme.min.css" />
        <script src="js/bootstrap.min.js"></script>
        <script>
            $(function() {
              $( "#dialog-confirm" ).dialog({
                resizable: false,
                buttons: {
                  "Aceptar": function() {
                    $( this ).dialog( "close" );
                  }
                }
              });
            });
        </script>
    </head>
    <body class="container text-center panel-default">
        <header class="panel-heading">
            <h1>Expocoches Campanillas</h1>
        </header>
        <section class="panel panel-primary">
            <div class="panel-heading"><h2>Venta de entradas</h2></div>
            
            <?php
            //Se realiza la venta
            $numZona = $_POST['zona'];
            $numEntradas = $_POST["numeroEntradas$numZona"];
            if(isset($numZona)){
              if($zonas[$numZona]->venderEntradas($numEntradas)){
                echo "<div id='dialog-confirm' title='Compra Completada'>";
                echo $numEntradas . " entradas para la zona " . $zonas[$numZona]->getNombre() . " compradas correctamente.</div>";
              } else {
                echo "<div id='dialog-confirm' title='Fallo en la Compra'>";
                echo "No se ha podido realizar la compra de entradas para la zona " . $zonas[$numZona]->getNombre() . 
                     "<br> Quedan " . $zonas[$numZona]->getEntradasLibres() . " entradas libres.</div>";
              }
            }
            ?>
            
            <form action="index.php" method="post">
              <?php
              //Se muestran todas las zonas
              $numeroZona = 0;
              foreach ($zonas as $zona) {
                  echo "<div class='panel-body'>" . $zona . "<br><br>";
              ?>
                  <input type="number" name="numeroEntradas<?= $numeroZona ?>" step="1" min="0" max="<?= $zona->getEntradasLibres() ?>">
                  <button name="zona" value="<?= $numeroZona ?>">Comprar Entradas</button>
                </div>
              <?php
              $numeroZona++;
              }
              ?>
            </form>
          <?php
          
          //Se muestra el total de zonas
          echo "<div class='panel-footer'><h2>Número total de zonas: " . $_SESSION['numZonas'] . "</h2></div>";
          
          //Se guardan las onas en la sesion
          $_SESSION['zonas'] = serialize($zonas);
          ?>
        </section>
    </body>
</html>