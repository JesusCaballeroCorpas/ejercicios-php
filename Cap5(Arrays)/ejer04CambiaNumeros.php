<!DOCTYPE html>
<!--
Capitulo 5 Arrays

Ejercicio 4
Escribe un programa que genere 100 números aleatorios del 0 al 20 y que los muestre por pantalla
separados por espacios. El programa pedirá entonces por teclado dos valores y a continuación
cambiará todas las ocurrencias del primer valor por el segundo en la lista generada anteriormente.
Los números que se han cambiado deben aparecer resaltados de un color diferente.

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
        <h5>Ejercicio 4</h5>
        <div>
          <span>Escribe un programa que genere 100 números aleatorios del 0 al 20 y que los muestre por pantalla
          separados por espacios. El programa pedirá entonces por teclado dos valores y a continuación
          cambiará todas las ocurrencias del primer valor por el segundo en la lista generada anteriormente.
          Los números que se han cambiado deben aparecer resaltados de un color diferente.</span><br><br>  
          <?php
            //$cadenaNumeros = $_REQUEST['cadenaNumeros'];
            if(!isset($_GET['action'])){
              //Asigno a cada variable lo que van a recibir. 
              for($i = 0;$i < 100;$i++){
                $arrayNumeros[] = rand(0,20);
                echo $arrayNumeros[$i], " ";
              }
              $cadenaNumeros = implode(" ", $arrayNumeros);
          ?>
            <form action="#" method="get">
              <br>Número a cambiar: <input type="number" name="numeroCambiar" step="1" min="0" max="20" autofocus>
              Número por el que cambiar: <input type="number" name="numeroCambiado" step="1" min="0" max="20">
              <input type="hidden" name="array" value="<?= $cadenaNumeros ?>">
              <button class="btn waves-effect waves-light green" type="submit" name="action">Cambiar
                <i class="material-icons right">send</i>
              </button>
            </form><br>
          <?php 
            } else {
              $numeroCambiar = $_REQUEST['numeroCambiar'];
              $numeroCambiado = $_REQUEST['numeroCambiado'];
              $cadenaNumeros = $_REQUEST['array'];
              $arrayNumeros = explode(" ", $cadenaNumeros);
              foreach ($arrayNumeros as $numero) {
                if($numero == $numeroCambiar){
                  echo "<span class='red-text text-darken-2'>" , $numeroCambiado , "</span> ";
                } else {
                  echo $numero , " ";
                }
              }
              echo "<br><br>";
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
