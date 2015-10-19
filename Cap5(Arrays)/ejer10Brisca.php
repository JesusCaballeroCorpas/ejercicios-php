<!DOCTYPE html>
<!--
Capitulo 5 Arrays

Ejercicio 10
Realiza un programa que escoja al azar 10 cartas de la baraja española y que diga cuántos puntos
suman según el juego de la brisca. Emplea un array asociativo para obtener los puntos a partir del
nombre de la figura de la carta. Asegúrate de que no se repite ninguna carta, igual que si las hubieras
cogido de una baraja de verdad.

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
        <h5>Ejercicio 10</h5>
        <div>
          <span>Realiza un programa que escoja al azar 10 cartas de la baraja española y que diga cuántos puntos
          suman según el juego de la brisca. Emplea un array asociativo para obtener los puntos a partir del
          nombre de la figura de la carta. Asegúrate de que no se repite ninguna carta, igual que si las hubieras
          cogido de una baraja de verdad.</span><br><br>
          <div class="row">
            <div class="col s12"><h5>Cartas ganadas en la partida:</h5></div>
              <?php
              $puntuacion = array("As" => 11, "2" => 0, "3" => 10, "4" => 0, "5" => 0
                     , "6" => 0, "7" => 0, "Sota" => 2, "Caballo" => 3, "Rey" => 4);
              $palo = array ('Oros', 'Copas', 'Bastos', 'Espadas');
              $figura = array ('As', '2', '3', '4', '5', '6', '7', 'Sota', 'Caballo', 'Rey');
              $contadorCartas = 0;
              $totalPuntos = 0;
              
              while($contadorCartas < 10){
                $cartaFigura = $figura[rand(0, 9)];
                $cartaPalo = $palo[rand(0, 3)];
                $carta = $cartaFigura." de ".$cartaPalo;
                if (!in_array($carta, $cartasGanadas)) {
                  $cartasGanadas[] = $carta;
                  $cartaPuntos = $puntuacion[$cartaFigura];
                  echo "<div class='col s4'>" . $carta . " Puntos: " . $cartaPuntos . "</div>";
                  $contadorCartas++;
                  $totalPuntos += $cartaPuntos;
                }
              }
              
              ?>
            <div class="col s12"><h5>Total de Puntos: <?= $totalPuntos ?></h5></div>
          </div>
          <form action="#" method="post">
            <button class="btn waves-effect waves-light green" type="submit" name="action">Jugar otra Partida
              <i class="material-icons right">replay</i>
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