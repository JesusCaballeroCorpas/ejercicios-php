<!DOCTYPE html>
<!--
Capitulo 5 Arrays

Ejercicio 8
Realiza un programa que escoja al azar 5 palabras en inglés de un mini-diccionario. El programa
pedirá que el usuario teclee la traducción al español de cada una de las palabras y comprobará si son
correctas. Al final, el programa deberá mostrar cuántas respuestas son válidas y cuántas erróneas.
La aplicación debe tener una opción para introducir los pares de palabras (inglés - español) que se
deben guardar en cookies; de esta forma, si de vez en cuando se dan de alta nuevas palabras, la
aplicación puede llegar a contar con un número considerable de entradas en el mini-diccionario.

@author: Jesús Caballero Corpas
-->
<?php
    session_start(); // Inicio de sesión
    $miniDiccionario =& $_SESSION['diccionario'];
    $contador =& $_SESSION['contador'];
    $palabrasAcertadas =& $_SESSION['palabrasAcertadas'];
    
    //Si no he recibido la sesión diccionario lo creo
    if(!isset($miniDiccionario)){
       $miniDiccionario = array("SOL" => "SUN", "LUNA" => "MOON", "PERRO" => "DOG"
        , "GATO" => "CAT", "CABALLO" => "HORSE", "BURRO" => "DONKEY", "MONO" => "MONKEY"
        , "SERPIENTE" => "SNAKE", "REINA" => "QUEEN", "REY" => "KING"); 
       //Guardo cada palabra del diccionario en las cookies
       foreach ($miniDiccionario as $espanol => $ingles) {
           setcookie($espanol, $ingles, time() + 3*24*3600);
       }
       $contador = 0;
       $palabrasAcertadas = 0;
    }
    //Cargo en miniDiccionario las palabras guardadas en las cookies
    foreach ($_COOKIE as $espanol => $ingles) {
        if($espanol != "PHPSESSID"){
            $miniDiccionario[$espanol] = $ingles;
        }
    }
    //Si recibo una nueva palabra la añado al diccionario y a las cookies
    if(isset($_POST['add'])){
       $espanol = strtoupper($_POST['espanol']);
       $ingles = strtoupper($_POST['ingles']);
       $miniDiccionario[$espanol] = $ingles;
       setcookie($espanol, $ingles, time() + 3*24*3600);
    }
    //Si vuelvo a jugar pongo las variables a 0
    if(isset($_POST['replay'])){
       $contador = 0;
       $palabrasAcertadas = 0;
    }
?>
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
          <span>Realiza un programa que escoja al azar 5 palabras en inglés de un mini-diccionario. El programa
          pedirá que el usuario teclee la traducción al español de cada una de las palabras y comprobará si son
          correctas. Al final, el programa deberá mostrar cuántas respuestas son válidas y cuántas erróneas.
          La aplicación debe tener una opción para introducir los pares de palabras (inglés - español) que se
          deben guardar en cookies; de esta forma, si de vez en cuando se dan de alta nuevas palabras, la
          aplicación puede llegar a contar con un número considerable de entradas en el mini-diccionario.</span><br><br>
          <div class="row">
            <div class="col s6"><h5>Traduzca al ingles la siguiente palabra:</h5>
              <?php
              //Guardo en un array las palabras españolas
              foreach($miniDiccionario as $clave=> $valor){
                $palabrasEspanolas[]=$clave;
              }
              
              //Si he recibido una palabra recojo todas las variables y compruebo si es correcta.
              if(isset($_POST['respuesta'])){
                $respuesta = $_POST['respuesta'];
                $respuesta = strtoupper($respuesta);
                $pregunta = $_POST['pregunta'];
                $palabrasEspanolas = $_POST['palabrasEspanolas'];
                $palabrasEspanolas = explode(" ", $palabrasEspanolas);
                foreach($miniDiccionario as $clave=> $valor){
                  if($pregunta == $clave && $respuesta == $valor){
                    $palabrasAcertadas++;
                  }
                }
                
              }
              ?>
          
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
            $contador++;
          ?>
          <form action="#" method="post">
            <input type="text" name="respuesta" autofocus>
            <input type="hidden" name="pregunta" value="<?= $pregunta ?>">
            <input type="hidden" name="palabrasEspanolas" value="<?= $palabrasEspanolas ?>">
            <button class="btn waves-effect waves-light green" type="submit" name="next" value="next">Siguiente Palabra
              <i class="material-icons right">send</i>
            </button>
          </form><br>
          <?php
          } else {
          ?>
            <div class='col s12'><h5>Resultado:</h5></div>
            <div class='col s12'><h5>Palabras Acertadas: <?= $palabrasAcertadas ?></h5></div>
            <div class='col s12'><h5>Palabras Erroneas: <?= (5 - $palabrasAcertadas) ?></h5></div>
            <div class="col s12">
                <form action="#" method="post">
                <button class="btn waves-effect waves-light green" type="submit" name="replay" value="replay">Volver a jugar
                  <i class="material-icons right">replay</i>
                </button>
              </form><br>
            </div>
          <?php
          }
          ?>
            </div>
            <div class='col s6'>
              <div class='col s12'><h5>Añadir Nueva Palabra:</h5></div>
              <form action="#" method="post">
                Español: <input type="text" name="espanol">
                Ingles: <input type="text" name="ingles">
                <button class="btn waves-effect waves-light green" type="submit" name="add" value="add">Añadir palabras al diccionario
                  <i class="material-icons right">send</i>
                </button>
              </form><br>
              <form action="ejer08VerPalabras.php" method="post">
                <button class="btn waves-effect waves-light green" type="submit" name="ver">Ver palabras del diccionario
                  <i class="material-icons right">send</i>
                </button>
              </form>
            </div>
          </div>
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
  </footer>
  
</html>
<?php
function gen_slug($str){
    # special accents
    $a = array('À','Á','Â','Ã','Ä','Å','Æ','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ð','Ñ','Ò','Ó','Ô','Õ','Ö','Ø','Ù','Ú','Û','Ü','Ý','ß','à','á','â','ã','ä','å','æ','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ø','ù','ú','û','ü','ý','ÿ','A','a','A','a','A','a','C','c','C','c','C','c','C','c','D','d','Ð','d','E','e','E','e','E','e','E','e','E','e','G','g','G','g','G','g','G','g','H','h','H','h','I','i','I','i','I','i','I','i','I','i','?','?','J','j','K','k','L','l','L','l','L','l','?','?','L','l','N','n','N','n','N','n','?','O','o','O','o','O','o','Œ','œ','R','r','R','r','R','r','S','s','S','s','S','s','Š','š','T','t','T','t','T','t','U','u','U','u','U','u','U','u','U','u','U','u','W','w','Y','y','Ÿ','Z','z','Z','z','Ž','ž','?','ƒ','O','o','U','u','A','a','I','i','O','o','U','u','U','u','U','u','U','u','U','u','?','?','?','?','?','?');
    $b = array('A','A','A','A','A','A','AE','C','E','E','E','E','I','I','I','I','D','N','O','O','O','O','O','O','U','U','U','U','Y','s','a','a','a','a','a','a','ae','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','o','u','u','u','u','y','y','A','a','A','a','A','a','C','c','C','c','C','c','C','c','D','d','D','d','E','e','E','e','E','e','E','e','E','e','G','g','G','g','G','g','G','g','H','h','H','h','I','i','I','i','I','i','I','i','I','i','IJ','ij','J','j','K','k','L','l','L','l','L','l','L','l','l','l','N','n','N','n','N','n','n','O','o','O','o','O','o','OE','oe','R','r','R','r','R','r','S','s','S','s','S','s','S','s','T','t','T','t','T','t','U','u','U','u','U','u','U','u','U','u','U','u','W','w','Y','y','Y','Z','z','Z','z','Z','z','s','f','O','o','U','u','A','a','I','i','O','o','U','u','U','u','U','u','U','u','U','u','A','a','AE','ae','O','o');
    return strtolower(preg_replace(array('/[^a-zA-Z0-9 -]/','/[ -]+/','/^-|-$/'),array('','-',''),str_replace($a,$b,$str)));
}