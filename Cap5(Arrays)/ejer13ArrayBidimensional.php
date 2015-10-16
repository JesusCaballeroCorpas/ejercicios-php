<!DOCTYPE html>
<!--
Capitulo 5 Arrays

Ejercicio 13
Rellena un array bidimensional de 6 filas por 9 columnas con números enteros positivos 
comprendidos entre 100 y 999 (ambos incluidos). Todos los números deben ser distintos, es decir, no se puede
repetir ninguno. Muestra a continuación por pantalla el contenido del array de tal forma que se
cumplan los siguientes requisitos:
• Los números de las dos diagonales donde está el mínimo deben aparecer en color verde.
• El mínimo debe aparecer en color azul.
• El resto de números debe aparecer en color negro.

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
        <h5>Ejercicio 13</h5>
        <div>
        <span>Rellena un array bidimensional de 6 filas por 9 columnas con números enteros positivos 
        comprendidos entre 100 y 999 (ambos incluidos). Todos los números deben ser distintos, es decir, no se puede
        repetir ninguno. Muestra a continuación por pantalla el contenido del array de tal forma que se
        cumplan los siguientes requisitos:<br>
        • Los números de las dos diagonales donde está el mínimo deben aparecer en color rojo.<br>
        • El mínimo debe aparecer en color azul.<br>
        • El resto de números debe aparecer en color negro.</span><br><br>
          <div class="row">
            <div class="col s12"><h5>Array Bidimensional:</h5></div>
            <?php
              $minimo = PHP_INT_MAX;
              //Genero el array Bidimensional.
              for($fila = 0;$fila < 6;$fila++){
                for($columna = 0;$columna < 9;$columna++){
                  //Genero un número aleatorio entre 100 y 999 y 
                  //compruebo que no lo haya generado antes.
                  do{
                    $numAleatorio = rand(100,999);
                  }while(in_array($numAleatorio, $arrayNumerosAleatorios));
                  $arrayNumerosAleatorios[] = $numAleatorio;
                  //Almaceno cual es el número mas pequeño y sus coordenadas.
                  if($numAleatorio < $minimo){
                    $minimo = $numAleatorio;
                    $coordMinimoFila = $fila;
                    $coordMinimoColumna = $columna;
                  }
                  $arrayBidimensional[$fila][$columna] = $numAleatorio;
                }
              }
              //Pinto la tabla
              echo "<br><table class='bordered striped centered responsive-table'>";
              for($fila = 0;$fila < 6;$fila++){//Recorro las filas
                echo "<tr>";
                for($columna = 0;$columna < 9;$columna++){//Recorro las columnas
                  //Compruebo si es el valor mas pequeño
                  if($arrayBidimensional[$fila][$columna] == $minimo){
                    echo "<td><span class='blue-text text-darken-2'>" 
                    . $arrayBidimensional[$fila][$columna] . "</span></td>";
                    //Compruebo si esta en la diagonal del número más pequeño
                  } else if(abs((abs($fila) - abs($coordMinimoFila))) == 
                            abs((abs($columna) - abs($coordMinimoColumna)))){
                    echo "<td><span class='red-text text-darken-2'>" 
                    . $arrayBidimensional[$fila][$columna] . "</span></td>";
                  }else {
                    echo "<td>" . $arrayBidimensional[$fila][$columna] . "</td>";
                  }
                }
                echo "</tr>";
              }
            ?>
            </table></div>
          <form action="#" method="post">
            <button class="btn waves-effect waves-light green" type="submit" name="action">
              Generar Nuevos Arrays
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