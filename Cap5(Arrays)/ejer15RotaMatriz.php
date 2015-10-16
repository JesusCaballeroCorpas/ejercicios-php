<!DOCTYPE html>
<!--
Capitulo 5 Arrays

Ejercicio 15
Realiza un programa que sea capaz de rotar todos los elementos de una matriz cuadrada una posición
en el sentido de las agujas del reloj. La matriz debe tener 12 filas por 12 columnas y debe contener
números generados al azar entre 0 y 100. Se debe mostrar tanto la matriz original como la matriz
resultado, ambas con los números convenientemente alineados.

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
      table{
        border:2px solid black;
      }
      td{
        padding: 4px;
      }
      th{
        padding: 4px;
        text-align: center;
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
        <h5>Ejercicio 15</h5>
        <div>
        <span>Realiza un programa que sea capaz de rotar todos los elementos de una matriz cuadrada una posición
        en el sentido de las agujas del reloj. La matriz debe tener 12 filas por 12 columnas y debe contener
        números generados al azar entre 0 y 100. Se debe mostrar tanto la matriz original como la matriz
        resultado, ambas con los números convenientemente alineados.</span>
          <div class="row">
            <div class="col s12">
            <?php
            $indiceMinimo = 0;
            $indiceMaximo = 11;
              //Genero el array Bidimensional.
              for($fila = 0;$fila < 12;$fila++){
                for($columna = 0;$columna < 12;$columna++){
                  //Genero un número aleatorio entre 0 y 100 y lo meto en la matriz y en la matriz copia.
                  $arrayBidimensional[$fila][$columna] = rand(0,100);
                  $arrayBidimensionalCopia[$fila][$columna] = $arrayBidimensional[$fila][$columna];
                }
              }
              //Pinto el array original
              echo "<br><table class='col s4 bordered striped centered responsive-table'>";
              echo "<tr><td colspan='13'><h5>Matriz Original:</h5></td></tr><tr><td></td>";
              for($columna = 0;$columna < 12;$columna++){//Pinto los indices de las columnas
                echo "<th>" . $columna . "</th>";
              }
              echo "</tr>";
              for($fila = 0;$fila < 12;$fila++){//Recorro las filas
                echo "<tr><th>" . $fila . "</th>" ;
                for($columna = 0;$columna < 12;$columna++){//Recorro las columnas
                  echo "<td>" . $arrayBidimensional[$fila][$columna] . "</td>";
                }
                echo "</tr>";
              }
            ?>
            </table>
            <?php
               // Se rota el array
              while($indiceMinimo < $indiceMaximo){
                for($fila = $indiceMinimo;$fila <= $indiceMaximo;$fila++){
                  for($columna = $indiceMinimo;$columna <= $indiceMaximo;$columna++){
                    if($fila == $indiceMinimo || $fila == $indiceMaximo || 
                      $columna == $indiceMinimo || $columna == $indiceMaximo){
                      if($fila == $indiceMinimo && $columna < $indiceMaximo){
                        $arrayBidimensional[$fila][$columna + 1] = $arrayBidimensionalCopia[$fila][$columna];
                      } else if ($fila < $indiceMaximo && $columna == $indiceMaximo) {
                        $arrayBidimensional[$fila + 1][$columna] = $arrayBidimensionalCopia[$fila][$columna];
                      } else if($fila == $indiceMaximo && $columna > $indiceMinimo){
                        $arrayBidimensional[$fila][$columna - 1] = $arrayBidimensionalCopia[$fila][$columna];
                      } else {
                        $arrayBidimensional[$fila - 1][$columna] = $arrayBidimensionalCopia[$fila][$columna];
                      }
                    }
                  }
                }
                $indiceMinimo++;
                $indiceMaximo--;
              }
            
              //Pinto el array rotado
              echo "<table class='col s4 bordered striped centered responsive-table'>";
              echo "<tr><td></td><td colspan='13'><h5>Matriz Rotada:</h5></td></tr>";
              for($columna = 0;$columna < 12;$columna++){//Pinto los indices de las columnas
                echo "<th>" . $columna . "</th>";
              }
              for($fila = 0;$fila < 12;$fila++){//Recorro las filas
                echo "<tr>";
                for($columna = 0;$columna < 12;$columna++){//Recorro las columnas
                  echo "<td>" . $arrayBidimensional[$fila][$columna] . "</td>";
                }
                echo "<th>" . $fila . "</th></tr>";
              }
            ?>
            </table></div></div>
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