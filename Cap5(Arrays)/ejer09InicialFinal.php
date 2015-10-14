<!DOCTYPE html>
<!--
Capitulo 5 Arrays

Ejercicio 9
Realiza un programa que pida 10 números por teclado y que los almacene en un array. A
continuación se mostrará el contenido de ese array junto al índice (0 – 9). Seguidamente el programa
pedirá dos posiciones a las que llamaremos “inicial” y “final”. Se debe comprobar que inicial es
menor que final y que ambos números están entre 0 y 9. El programa deberá colocar el número de
la posición inicial en la posición final, rotando el resto de números para que no se pierda ninguno.
Al final se debe mostrar el array resultante.

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
        <h5>Ejercicio 9</h5>
        <div>
          <span>Realiza un programa que pida 10 números por teclado y que los almacene en un array. A
          continuación se mostrará el contenido de ese array junto al índice (0 – 9). Seguidamente el programa
          pedirá dos posiciones a las que llamaremos “inicial” y “final”. Se debe comprobar que inicial es
          menor que final y que ambos números están entre 0 y 9. El programa deberá colocar el número de
          la posición inicial en la posición final, rotando el resto de números para que no se pierda ninguno.
          Al final se debe mostrar el array resultante.</span><br><br>  
          <?php
            if(!isset($_GET['action']) && !isset($_GET['cambiar'])){
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
            } else if(!isset($_GET['cambiar'])){
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
                  echo "<td>" , $numero , "</td>";
                }
                $numeros = implode(" ", $numeros);
              ?>
                </tr></table><br>
                <!-- Final de pintar el array original -->
              
              <div class="row">
              <div class="col s12"><h5>Indique las posiciones de los números a cambiar:</h5></div>
              <form action="#" method="get">
                <div class='col s6'>
                  Posición Inicial: <input type='number' name='inicial' step='1' min="0" max="9" required autofocus>
                </div>
                <div class='col s6'>
                  Posición Final: <input type='number' name='final' step='1' min="0" max="9" required>
                </div>
                <input type="hidden" name="numeros" value="<?= $numeros ?>">
                <button class="btn waves-effect waves-light green" type="submit" name="cambiar">Cambiar
                  <i class="material-icons right">replay</i>
                </button>
              </form>
            </div>
            <?php
            } else {
            ?>  
              <?php
              $numeros = $_GET['numeros'];
              $numeros = explode(" ", $numeros);
              $copiaNumeros = $numeros;
              $inicial = $_GET['inicial'];
              $final = $_GET['final'];
              if($inicial >= $final){
                echo "El número inicial debe ser inferior al final.";
              } else {
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
                  echo "<td>" , $numero , "</td>";
                }
              ?>
                <!--</tr></table><br>-->
                <tr><td colspan="20"></td></tr>
                <!-- Final de pintar el array original -->
              <?php
                // Copio el valor inicial en la posicion final y corro el resto hasta el final.
                $numeros[$final] = $copiaNumeros[$inicial];
                $longitudArray = count($copiaNumeros);
                for($i = $final;$i < $longitudArray - 1;$i++) {
                  $numeros[$i + 1] = $copiaNumeros[$i];
                }
                // Copio la ultima posición en la primera y muevo el resto hasta la posición inicial.
                $numeros[0] = $copiaNumeros[9];
                for($i = 1;$i <= $inicial;$i++) {
                  $numeros[$i] = $copiaNumeros[$i - 1];
                }
              ?>
                <!-- Pinto el array con el orden cambiado -->
                <!--<table class="bordered striped centered responsive-table">-->
                <tr><th colspan="20">Array Con Orden Cambiado</th></tr><tr>
              <?php
                for($i = 0;$i < 10;$i++){
                  echo "<td>" , $i , "</td>";
                }
                echo "</tr><tr>";
                foreach ($numeros as $numero) {
                  echo "<td>" , $numero , "</td>";
                }
              ?>
                </tr></table><br>
                <!-- Final de pintar el array con el orden cambiado -->
          <?php
              }
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