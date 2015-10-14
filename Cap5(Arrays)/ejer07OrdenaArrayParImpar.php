<!DOCTYPE html>
<!--
Capitulo 5 Arrays

Ejercicio 7
Escribe un programa que genere 20 números enteros aleatorios entre 0 y 100 y que los almacene en
un array. El programa debe ser capaz de pasar todos los números pares a las primeras posiciones del
array (del 0 en adelante) y todos los números impares a las celdas restantes. Utiliza arrays auxiliares
si es necesario.

foreach($diccionario as $clave=> $valor){
  $palabrasEspanolas[]=$clave;
}

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
        <h5>Ejercicio 7</h5>
        <div>
          <span>Escribe un programa que genere 20 números enteros aleatorios entre 0 y 100 y que los almacene en
          un array. El programa debe ser capaz de pasar todos los números pares a las primeras posiciones del
          array (del 0 en adelante) y todos los números impares a las celdas restantes. Utiliza arrays auxiliares
          si es necesario.</span><br><br>  
          <?php
            if(isset($_GET['action'])){
              //Genero el array de 20 numeros
              for($i = 0;$i < 20;$i++){
                $array[] = rand(0,100);
              }
          ?>
          <!-- Pinto el array original -->
          <table class="bordered striped centered responsive-table">
            <tr><th colspan="20">Array Original</th></tr><tr>
          <?php
            for($i = 0;$i < 20;$i++){
              echo "<td>" , $i , "</td>";
            }
            echo "</tr><tr>";
            foreach ($array as $numero) {
              if($numero % 2 == 0){
                echo "<td><span class='blue-text text-darken-2'>" , $numero , "</span></td>";
              } else {
                echo "<td><span class='red-text text-darken-2'>" , $numero , "</span></td>";
              }
            }
          ?>
            </tr></table><br>
          <!-- Final de pintar el array original -->
          <?php
            //Guardo en un array los números pares y en otro los impares.
            foreach ($array as $numero) {
              if($numero % 2 == 0){
                $arrayPares[] = $numero;
              } else {
                $arrayImpares[] = $numero;
              }
            }
            //El array original lo sustituyo por el de números pares.
            $array = $arrayPares;
            //Recorro el array de números impares incluyendolos a continuación en el array original.
            foreach ($arrayImpares as $numero) {
              $array[] = $numero;
            }
          ?>
          <!-- Se pinta el array ordenado -->
          <table class="bordered striped centered responsive-table">
            <tr><th colspan="20">Array Ordenado</th></tr><tr>
          <?php
            for($i = 0;$i < 20;$i++){
              echo "<td>" , $i , "</td>";
            }
            echo "</tr><tr>";
            foreach ($array as $numero) {
              if($numero % 2 == 0){
                echo "<td><span class='blue-text text-darken-2'>" , $numero , "</span></td>";
              } else {
                echo "<td><span class='red-text text-darken-2'>" , $numero , "</span></td>";
              }
            }
          ?>
            </tr></table><br>
          <!-- Final de pintar el array ordenado -->
          <?php
            } else {
          ?>
            <form action="#" method="get">
              <button class="btn waves-effect waves-light green" type="submit" name="action">Generar Array
                <i class="material-icons right">send</i>
              </button>
            </form>
          <?php
            }
          ?>
          <br>
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
