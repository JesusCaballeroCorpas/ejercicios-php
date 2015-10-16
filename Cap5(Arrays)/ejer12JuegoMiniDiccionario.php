<!DOCTYPE html>
<!--
Capitulo 5 Arrays

Ejercicio 12
Realiza un programa que escoja al azar 5 palabras en español del mini-diccionario del ejercicio
anterior. El programa pedirá que el usuario teclee la traducción al inglés de cada una de las palabras
y comprobará si son correctas. Al final, el programa deberá mostrar cuántas respuestas son válidas
y cuántas erróneas.

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
        <h5>Ejercicio 12</h5>
        <div>
        <span>Realiza un programa que escoja al azar 5 palabras en español del mini-diccionario del ejercicio
        anterior. El programa pedirá que el usuario teclee la traducción al inglés de cada una de las palabras
        y comprobará si son correctas. Al final, el programa deberá mostrar cuántas respuestas son válidas
        y cuántas erróneas.</span><br><br>
          <div class="row">
            <div class="col s12"><h5>Traduzca al ingles la siguiente palabra:</h5></div>
              <?php
              //Creo el minidiccionario y las variables globales
              $miniDiccionario = array("SOL" => "SUN", "LUNA" => "MOON", "PERRO" => "DOG"
              , "GATO" => "CAT", "CABALLO" => "HORSE", "BURRO" => "DONKEY", "MONO" => "MONKEY"
              , "SERPIENTE" => "SNAKE", "REINA" => "QUEEN", "REY" => "KING");
              //Guardo en un array las palabras españolas
              foreach($miniDiccionario as $clave=> $valor){
                $palabrasEspanolas[]=$clave;
              }
              $contador = 0;
              $palabrasAcertadas = 0;
              //Si he recibido una palabra recojo todas las variables y compruebo si es correcta.
              if(isset($_GET['respuesta'])){
                $respuesta = $_GET['respuesta'];
                $respuesta = strtoupper($respuesta);
                $pregunta = $_GET['pregunta'];
                $contador = $_GET['contador'];
                $palabrasAcertadas = $_GET['palabrasAcertadas'];
                $palabrasEspanolas = $_GET['palabrasEspanolas'];
                $palabrasEspanolas = explode(" ", $palabrasEspanolas);
                foreach($miniDiccionario as $clave=> $valor){
                  if($pregunta == $clave && $respuesta == $valor){
                    $palabrasAcertadas++;
                  }
                }
                
              }
              ?>
          </div>
          <?php
          //Si he escrito menos de 5 palabras entro aquí
          if($contador < 5){
            //Genero una palabra aleatoria para preguntar.
            $posAleatoria = rand(0,(count($palabrasEspanolas) - 1));
            $pregunta = $palabrasEspanolas[$posAleatoria];
            echo "<div class='col s12'><h5>" . $pregunta . "</h5></div>";
            
            //Extraigo del array esa palabra y así no se repite más.
            unset($palabrasEspanolas[$posAleatoria]);
            $palabrasEspanolas = implode(" ", $palabrasEspanolas);
          ?>
          <form action="#" method="GET">
            <input type="text" name="respuesta" autofocus>
            <input type="hidden" name="pregunta" value="<?= $pregunta ?>">
            <input type="hidden" name="palabrasEspanolas" value="<?= $palabrasEspanolas ?>">
            <input type="hidden" name="contador" value="<?= ++$contador ?>">
            <input type="hidden" name="palabrasAcertadas" value="<?= $palabrasAcertadas ?>">
            <button class="btn waves-effect waves-light green" type="submit" name="action">Siguiente Palabra
              <i class="material-icons right">send</i>
            </button>
          </form><br>
          <?php
          } else {
            echo "<div class='col s12'><h5>Palabras Acertadas: " . $palabrasAcertadas . "</h5></div>";
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