<!DOCTYPE html>
<?php
  session_start();
  include_once 'DadoPoker.php';
  $lanzarDados  = true;
  
  if(!isset($_SESSION['tiradasTotales'])){
    //Se crean los 5 dados
    for($i = 0;$i < 5;$i++){
      $_SESSION['dado' . $i] = serialize(new DadoPoker());
    }
    $_SESSION['tiradasTotales'] = DadoPoker::getTiradasTotales();
    $lanzarDados = false;
  } 
  //Se unserializan los 5 dados
  for($i = 0;$i < 5;$i++){
    $_SESSION['dado' . $i] = unserialize($_SESSION['dado' . $i]);
  }
  
?>
<!--
Ejercicio 1

Crea la clase DadoPoker . Las caras de un dado de poker tienen las siguientes figuras: As, K, Q, J,
7 y 8 . Crea el método tira() que no hace otra cosa que tirar el dado, es decir, genera un valor
aleatorio para el objeto al que se le aplica el método. Crea también el método nombreFigura() , que
diga cuál es la figura que ha salido en la última tirada del dado en cuestión. Crea, por último, el
método getTiradasTotales() que debe mostrar el número total de tiradas entre todos los dados.
Realiza una aplicación que permita tirar un cubilete con cinco dados de poker.

 @author: Jesús Caballero Corpas
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Juego Dados</title>
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body>
        <header>
            <h1>JUEGO DE DADOS</h1>
        </header>
        <section>
          <?php
          //Se crean los 5 dados
          /*for($i = 0;$i < 5;$i++){
            ${'dado' . $i} = new DadoPoker();
          }*/
          
          //Se lanzan los 5 dados
          if($lanzarDados){
            for($i = 0;$i < 5;$i++){
              $_SESSION['dado' . $i]->tira();
            }
          }
          
          //Se pintan los 5 dados
          for($i = 0;$i < 5;$i++){
            if($_SESSION['dado' . $i]->nombreFigura() == "7" || $_SESSION['dado' . $i]->nombreFigura() == "8"){
              echo "<span class='c" . $_SESSION['dado' . $i]->nombreFigura() . "'></span>";
            } else {
              echo "<span class='" . $_SESSION['dado' . $i]->nombreFigura() . "'></span>";
            }
          }
          
          //Se pintan las tiradas totales
          $_SESSION['tiradasTotales'] += DadoPoker::getTiradasTotales();
          echo "<hr>Número de dados lanzados: " . $_SESSION['tiradasTotales'];
          
          //Se serializan los 5 dados
          for($i = 0;$i < 5;$i++){
            $_SESSION['dado' . $i] = serialize($_SESSION['dado' . $i]);
          }
          ?>
        </section>
        <a id="boton1" href="index.php">
          <div id="entra">Tirar Dados</div>
          <div id="estrella"></div>
          <div id="gratis">Ya!</div>
        </a>
    </body>
</html>