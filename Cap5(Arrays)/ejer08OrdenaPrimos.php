<!DOCTYPE html>
<!--
Capitulo 5 Arrays

Ejercicio 8
Realiza un programa que pida 10 números por teclado y que los almacene en un array. A
continuación se mostrará el contenido de ese array junto al índice (0 – 9) utilizando para ello una
tabla. Seguidamente el programa pasará los primos a las primeras posiciones, desplazando el resto
de números (los que no son primos) de tal forma que no se pierda ninguno. Al final se debe mostrar
el array resultante.

@author: Jesús Caballero Corpas
-->
<html>
  
  <head>
    <title>Ejercicios PHP Capitulo 5. Arrays</title>
    <meta charset="UTF-8">
    <meta name="author" content="Jesús Caballero Corpas">
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>
  
  <body class="container light-green lighten-4">
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <header class="center-align">
      <h2>Ejercicios PHP Capitulo 5. Arrays</h2>
    </header>
    <section class="card-panel light-green lighten-2">
      
      <article class="card-panel black-text text-darken-2 light-green lighten-3">
        <h5>Ejercicio 8</h5>
        <div>
          <span>Realiza un programa que pida 10 números por teclado y que los almacene en un array. A
          continuación se mostrará el contenido de ese array junto al índice (0 – 9) utilizando para ello una
          tabla. Seguidamente el programa pasará los primos a las primeras posiciones, desplazando el resto
          de números (los que no son primos) de tal forma que no se pierda ninguno. Al final se debe mostrar
          el array resultante.</span><br><br>  
          <?php
            if(!isset($_GET['action'])){
          ?>
            <div class="row">
              <div class="col s12"><h5>Introduce 10 números:</h5></div>
              <form action="#" method="get">
                <?php
                for($i = 0;$i < 10;$i++){
                  echo "<div class='col s6'>";
                  echo "Número " , $i + 1 , ": <input type='number' name='numeros[", $i ,"]' step='1'></div>";
                }
                ?>
                <button class="btn waves-effect waves-light green" type="submit" name="action">Enviar
                  <i class="material-icons right">send</i>
                </button>
              </form>
            </div>
          <?php 
            } else {
              $numeros = $_GET['numeros'];
          ?>
              <!-- Pinto el array original -->
              <table class="bordered striped centered responsive-table">
                <tr><th colspan="20">Array Original</th></tr><tr>
              <?php
                for($i = 0;$i < 10;$i++){
                  echo "<td>" , $i , "</td>";
                }
                echo "</tr><tr>";
                foreach ($numeros as $numero) {
                  if(esPrimo($numero)) {
                    echo "<td><span class='blue-text text-darken-2'>" , $numero , "</span></td>";
                  } else {
                    echo "<td><span class='red-text text-darken-2'>" , $numero , "</span></td>";
                  }
                }
              ?>
                </tr></table><br>
              <!-- Final de pintar el array original -->
              <?php
              $longitudArray = count($numeros) - 1;
              $contDatosManipulados = 0;
              //Recorro el array al reves para que los números se mantengan ordenados y voy 
              //comprobando hasta que haya comprobado los 10 números.
              while($contDatosManipulados < 10){
                //Compruebo si una posición del array contiene un número primo
                if(esPrimo($numeros[$longitudArray])){
                  //Guardo el número en una variable
                  $numeroPrimo = $numeros[$longitudArray];
                  //Extraigo del array ese número y los indices se actualizan.
                  unset($numeros[$longitudArray]);
                  //Añado al principio del array ese número y los indices se actualizan.
                  array_unshift($numeros, $numeroPrimo);
                } else { //Si el número no es primo paso a la anterior posición del array, si lo es 
                //me mantengo por si el siguiente tambien lo era y ahora se ha colocado en este 
                //nuevo indice.
                  $longitudArray--;
                }
                //Aumento la variable de datos manipulados.
                $contDatosManipulados++;
              }
              ?>
              <!-- Pinto el array ordenado -->
              <table class="bordered striped centered responsive-table">
                <tr><th colspan="20">Array Ordenado</th></tr><tr>
              <?php
                for($i = 0;$i < 10;$i++){
                  echo "<td>" , $i , "</td>";
                }
                echo "</tr><tr>";
                foreach ($numeros as $numero) {
                  if(esPrimo($numero)) {
                    echo "<td><span class='blue-text text-darken-2'>" , $numero , "</span></td>";
                  } else {
                    echo "<td><span class='red-text text-darken-2'>" , $numero , "</span></td>";
                  }
                }
              ?>
                </tr></table><br>
              <!-- Final de pintar el array ordenado -->
          <?php
            }
          ?>
          <form action="index.html" method="post">
            <button class="btn waves-effect waves-light green" type="submit" name="exit">Volver
              <i class="material-icons left">arrow_back</i>
            </button>
          </form>
        </div>
      </article>
      
    </section>  
  </body>
  
  <footer>
    <p class="center-align">Jesús Caballero Corpas ©</p>
    <div class="footer-copyright">
      <div class="container">
        © 2014 Copyright Text
      </div>
    </div>
  </footer>
  
</html>

<?php
function esPrimo($num)
{
    $primo = 0;
    for($i = 1;$i <= $num;$i++) {
      if(($num % $i) == 0) {
        $primo++;
      } 
    }
    if($primo <= 2) {
      return true;
    } else {
      return false;
    }
}

