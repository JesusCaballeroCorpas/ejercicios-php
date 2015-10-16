<!DOCTYPE html>
<!--
Capitulo 5 Arrays

Ejercicio 11
Crea un mini-diccionario español-inglés que contenga, al menos, 20 palabras (con su traducción).
Utiliza un array asociativo para almacenar las parejas de palabras. El programa pedirá una palabra
en español y dará la correspondiente traducción en inglés.

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
        <h5>Ejercicio 11</h5>
        <div>
          <span>Crea un mini-diccionario español-inglés que contenga, al menos, 20 palabras (con su traducción).
          Utiliza un array asociativo para almacenar las parejas de palabras. El programa pedirá una palabra
          en español y dará la correspondiente traducción en inglés.</span><br><br>
          <div class="row">
            <div class="col s12"><h5>Introduzca una palabra en Español para traducir:</h5></div>
              <?php
              //Creo el minidiccionario
              $miniDiccionario = array("SOL" => "SUN", "LUNA" => "MOON", "PERRO" => "DOG"
              , "GATO" => "CAT", "CABALLO" => "HORSE", "BURRO" => "DONKEY", "MONO" => "MONKEY"
              , "SERPIENTE" => "SNAKE", "REINA" => "QUEEN", "REY" => "KING");
              //Si he recibido una palabra la traduzco.
              if(isset($_GET['palabra'])){
                $palabra = $_GET['palabra'];
                $palabra = strtoupper($palabra);
                $algoEncontrado = false;
                foreach($miniDiccionario as $clave=> $valor){
                  if($palabra == $clave){
                    echo "<div class='col s12'><h5>" . $palabra . " en ingles es " . $valor . "<br></h5></div>";
                    $algoEncontrado = true;
                  }
                }
                if(!$algoEncontrado){
                  echo "<div class='col s12'><h5>No se ha encontrado la palabra " . $palabra . " en el diccionario, prueba con algún animal.<br></h5></div>";
                }
              }
              ?>
          </div>
          <form action="#" method="GET">
            <input type="text" name="palabra" autofocus>
            <button class="btn waves-effect waves-light green" type="submit" name="action">Traducir
              <i class="material-icons right">send</i>
            </button>
          </form><br>
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