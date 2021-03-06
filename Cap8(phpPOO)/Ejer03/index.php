<!DOCTYPE html>
<?php
  session_start();
  
  //Includes
  include_once 'Zona.php';
          
  //Si no se reciben las zonas se crean estas 3;
  if(!isset($_SESSION['zonas'])){
    $_SESSION['zonas'] = serialize([new Zona("Sala Principal", 1000, 10),
                                    new Zona("Compra-Venta", 200, 25),
                                    new Zona("VIP", 25, 100)]);
    $_SESSION['numZonas'] = Zona::getNumZonas();
    $_SESSION['dinGanado'] = Zona::getDineroGanado();
  }
  $zonas = unserialize($_SESSION['zonas']);
  
  //Si recibo una nueva zona
  if(isset($_POST['nombre'])){
    //Actualizo las zonas que habia creadas en sesion
    Zona::setNumZonas($_SESSION['numZonas']);
    //Creo la zona recibida
    $zonas[] = new Zona($_POST['nombre'], $_POST['aforo'], $_POST['precio']);
    //Vuelvo a guardar en la sesion el número de zonas creadas
    $_SESSION['numZonas'] = Zona::getNumZonas();
  }
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
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/bootstrap-theme.min.css" />
        <script src="js/jquery.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script>
            $(function() {
              $( "#dialog-confirm" ).dialog({
                resizable: false,
                buttons: {
                  "Cerrar": function() {
                    $( this ).dialog( "close" );
                  }
                }
              });
              
              var dialog = $( "#dialog-form" ).dialog({
                autoOpen: false,
                height: 200,
                width: 400,
                modal: true,
                buttons: {
                  /*Aceptar: addZona,
                  Cancelar: function() {
                    dialog.dialog( "close" );
                  }*/
                }
              });

              $( "#createZone" ).button().on( "click", function() {
                dialog.dialog( "open" );
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
            //Se reciben la zona y el número de entradas vendidas
            $numZona = $_POST['zona'];
            $numEntradas = $_POST["numeroEntradas$numZona"];
            $dinero = $_POST['dinero'];
            if(isset($numZona)){
              //Si quedan entradas suficientes entra
              if($zonas[$numZona]->comprobarDisponibilidad($numEntradas)){
                //Si no he recibido dinero realizo el pago
                if(!isset($dinero)){
            ?>    
                  <div id='dialog-confirm' title='Detalle Compra'>
                    <?= $numEntradas ?> entradas para la zona <?= $zonas[$numZona]->getNombre() ?> seleccionadas correctamente.
                    <br>TOTAL A PAGAR: <?= $numEntradas * $zonas[$numZona]->getPrecio() ?>€<br>
                    <form action="index.php" method="post">
                        Dinero Recibido: <input type="number" name="dinero">
                        <input type="hidden" name="zona" value="<?= $numZona ?>">
                        <input type="hidden" name="numeroEntradas<?= $numZona ?>" value="<?= $numEntradas ?>">
                        <button>Realizar Compra</button>
                    </form>
                  </div>
            <?php
                //Si he recibido menos dinero del valor de las entradas doy un error de pago
                } else if($dinero < ($numEntradas * $zonas[$numZona]->getPrecio())){
            ?>    
                <div id='dialog-confirm' title='Error de pago'>
                  No se ha podido realizar la compra de entradas para la zona <?= $zonas[$numZona]->getNombre() ?><br> 
                  Faltan <?= ($numEntradas * $zonas[$numZona]->getPrecio()) - $dinero ?>€
                </div>
            <?php
                //Se realiza la venta
                } else {
                  $zonas[$numZona]->venderEntradas($numEntradas);
            ?>
                  <div id='dialog-confirm' title='Compra Completada'>
                    <?= $numEntradas ?> entradas para la zona <?= $zonas[$numZona]->getNombre() ?> vendidas correctamente<br>
                    TOTAL A DEVOLVER: <?= $dinero - ($numEntradas * $zonas[$numZona]->getPrecio()) ?>€
                  </div>
            <?php
                  //Se suma al dinero ganado la venta realizada
                  $_SESSION['dinGanado'] += ($numEntradas * $zonas[$numZona]->getPrecio());
                }
              } else {//Si no quedan entradas suficientes devuelve false y no deja vender.
            ?>  
                <div id='dialog-confirm' title='Fallo en la Compra'>
                  No se ha podido realizar la compra de entradas para la zona <?= $zonas[$numZona]->getNombre() ?><br> 
                  Quedan <?= $zonas[$numZona]->getEntradasLibres() ?> entradas libres.
                </div>
            <?php
              }
            }
            ?>
            <!-- Botón de venta de entradas -->
            <button id="createZone" class="btn bg-primary col-md-12">Crear Nueva Zona</button>
            
            <!-- SE MUESTRAN TODAS LAS ZONAS -->
            <form action="index.php" method="post">
              <?php
              //Se muestran todas las zonas
              $numeroZona = 0;
              foreach ($zonas as $zona) {
                  echo "<div class='panel-body col-md-6'>" . $zona . "<br><br>";
              ?>
                  <input type="number" name="numeroEntradas<?= $numeroZona ?>" step="1" min="0" max="<?= $zona->getEntradasLibres() ?>">
                  <button name="zona" value="<?= $numeroZona ?>">Comprar Entradas</button>
                </div>
              <?php
              $numeroZona++;
              }
              ?>
            </form>
            <!-- Se muestra el total de zonas -->
            <div class='panel-footer col-md-12'>
              <h2 class="col-md-6">Número total de zonas: <?= $_SESSION['numZonas'] ?></h2>
              <h2 class="col-md-6">Dinero Ganado: <?= $_SESSION['dinGanado'] ?>€</h2>
            </div>
          <?php
          
          
          
          //Se guardan las zonas en la sesion
          $_SESSION['zonas'] = serialize($zonas);
          ?>
        </section>
        
        <!-- Formulario para dar de alta una nueva zona -->
        <div id="dialog-form" title="Dar de Alta Nueva Zona">
          <form action="index.php" method="post">
            Nombre: <input type="text" name="nombre"class="text ui-widget-content ui-corner-all"><br>
            Aforo: <input type="text" name="aforo"class="text ui-widget-content ui-corner-all"><br>
            Precio: <input type="number" name="precio" class="text ui-widget-content ui-corner-all"><br><br>
            <button>Aceptar</button>
          </form>
        </div>
        
    </body>
</html>