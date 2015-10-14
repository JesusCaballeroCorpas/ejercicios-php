<!DOCTYPE html>
<!--
Capitulo 5 Arrays

Ejercicio 1
Define tres arrays de 20 números enteros cada una, con nombres “numero”, “cuadrado” y “cubo”.
Carga el array “numero” con valores aleatorios entre 0 y 100. En el array “cuadrado” se deben
almacenar los cuadrados de los valores que hay en el array “numero”. En el array “cubo” se deben
almacenar los cubos de los valores que hay en “numero”. A continuación, muestra el contenido de
los tres arrays dispuesto en tres columnas.

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
        <h5>Ejercicio 1</h5>
        <div>
          <span>Define tres arrays de 20 números enteros cada una, con nombres “numero”, “cuadrado” y “cubo”.
          Carga el array “numero” con valores aleatorios entre 0 y 100. En el array “cuadrado” se deben
          almacenar los cuadrados de los valores que hay en el array “numero”. En el array “cubo” se deben
          almacenar los cubos de los valores que hay en “numero”. A continuación, muestra el contenido de
          los tres arrays dispuesto en tres columnas.</span><br><br>
          <table class="bordered striped centered responsive-table">
          <?php
            $numero = new SplFixedArray(20);
            $cuadrado = new SplFixedArray(20);
            $cubo = new SplFixedArray(20);
            for($i = 0;$i < 20;$i++){
              $aleatorio = rand(0,100);
              $numero[$i] = $aleatorio;
              $cuadrado[$i] = pow($aleatorio,2);
              $cubo[$i] = pow($aleatorio,3);
            }
            
            echo "<tr><th colspan=20>Array numero</th></tr><tr>";
            foreach ($numero as $elemento) {
              echo "<td>" , $elemento , "</td>";
            }
            
            echo "</tr><tr><th colspan=20>Array cuadrado</th></tr><tr>";
            foreach ($cuadrado as $elemento) {
              echo "<td>" , $elemento , "</td>";
            }
            
            echo "</tr><tr><th colspan=20>Array cubo</th></tr>";
            foreach ($cubo as $elemento) {
              echo "<td>" , $elemento , "</td>";
            }
          ?>
          </tr></table>
          <br><br>
          <form action="#" method="post">
            <button class="btn waves-effect waves-light green" type="submit" name="action">Generar Nuevos Arrays
              <i class="material-icons right">replay</i>
            </button>
          </form><br>
          <form action="index.html" method="post">
            <button class="btn waves-effect waves-light green" type="submit" name="action">Volver
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
