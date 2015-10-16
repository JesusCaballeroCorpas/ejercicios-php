<!DOCTYPE html>
<!--
Capitulo 5 Arrays

Ejercicio 14
Escribe un programa que, dada una posición en un tablero de ajedrez, nos diga a qué casillas podría
saltar un alfil que se encuentra en esa posición. Indícalo de forma gráfica sobre el tablero con un
color diferente para estas casillas donde puede saltar la figura. El alfil se mueve siempre en diagonal.
El tablero cuenta con 64 casillas. Las columnas se indican con las letras de la “a” a la “h” y las filas
se indican del 1 al 8.

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
    <style>
      table, th, td {
        border: 0px;
        text-align: center;
        padding: 0px 5px;
        width: 50px;
      }
      th{
        background-color: #a8a8a8;
      }
      .negro {
        background-color: black;
        z-index: -1;
      }
      .blanco {
        background-color: white;
        z-index: -1;
      }
    </style>
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
        <h5>Ejercicio 14</h5>
        <div>
        <span>Escribe un programa que, dada una posición en un tablero de ajedrez, nos diga a qué casillas podría
        saltar un alfil que se encuentra en esa posición. Indícalo de forma gráfica sobre el tablero con un
        color diferente para estas casillas donde puede saltar la figura. El alfil se mueve siempre en diagonal.
        El tablero cuenta con 64 casillas. Las columnas se indican con las letras de la “a” a la “h” y las filas
        se indican del 1 al 8.</span><br><h5>Movimiento Alfil:</h5>
            <?php
              // Recoge la posición del alfil
              $posicion = $_GET['coordenada'];
              $alfilColumna = ord(substr($posicion, 0, 1)) - ord('a');
              $alfilFila = 8 - substr($posicion, 1, 1);
              
              //Pinto la tabla
              $color = "blanco";
              echo "<br><table>";
              echo "<tr><th></th><th>a</th><th>b</th><th>c</th><th>d</th><th>e</th><th>f</th><th>g</th><th>h</th><th></th></tr>";
              for($fila = 0;$fila < 8;$fila++){//Recorro las filas
                echo "<tr><th>" , 8 - $fila , "</th>";
                for($columna = 0;$columna < 8;$columna++){//Recorro las columnas
                  echo "<td class=\"$color\">";
                  //Compruebo si es el valor mas pequeño
                  if(($fila == $alfilFila) && ($columna == $alfilColumna)){
                    echo '<img src="./images/alfil.png">';
                    //Compruebo si esta en la diagonal del número más pequeño
                  } else if(abs((abs($fila) - abs($alfilFila))) == abs((abs($columna) - abs($alfilColumna)))){
                    echo '<img src="./images/alfilsemitransparente.png">';
                  } else {
                    echo '<img src="./images/vacio.png">';
                  }
                  echo "</td>";
                  // Alterna el color de la casilla
                  if ($color == "blanco") {
                    $color = "negro";
                  } else {
                    $color = "blanco";
                  }
                }
                if ($color == "blanco") {
                  $color = "negro";
                } else {
                  $color = "blanco";
                }
                echo "<th>" , 8 - $fila , "</th></tr>";
              }
            ?>
            <tr><th></th><th>a</th><th>b</th><th>c</th><th>d</th><th>e</th><th>f</th><th>g</th><th>h</th><th></th></tr>
            </table>
          <form action="#" method="get">
            Introduce la coordenada - Por ejemplo: h3<input type="text" name="coordenada" autofocus>
            <button class="btn waves-effect waves-light green" type="submit" name="action">Enviar
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