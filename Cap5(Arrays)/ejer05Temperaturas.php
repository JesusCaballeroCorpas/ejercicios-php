<!DOCTYPE html>
<!--
Capitulo 5 Arrays

Ejercicio 5
Realiza un programa que pida la temperatura media que ha hecho en cada mes de un determinado
año y que muestre a continuación un diagrama de barras horizontales con esos datos. Las barras
del diagrama se pueden dibujar a base de la concatenación de una imagen.

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
        <h5>Ejercicio 5</h5>
        <div>
          <span>Realiza un programa que pida la temperatura media que ha hecho en cada mes de un determinado
          año y que muestre a continuación un diagrama de barras horizontales con esos datos. Las barras
          del diagrama se pueden dibujar a base de la concatenación de una imagen.</span><br><br>  
          <?php
            if(!isset($_GET['action'])){
              $mes = array(
              "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",
              "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
          ?>
            <div class="row">
              <div class="col s12"><h5>Introduce las temperaturas medias del año que desee:</h5></div>
              <form action="#" method="get">
                <?php
                for($i = 0;$i < 12;$i++){
                  echo "<div class='col s4'>";
                  echo $mes[$i] , ": <input type='number' name='temperatura[", $mes[$i] ,"]' step='1' min='-25' max='60' required></div>";
                }
                ?>
                <button class="btn waves-effect waves-light green" type="submit" name="action">Calcular Gráfica
                  <i class="material-icons right">send</i>
                </button>
              </form><br>
            </div>
          <?php 
            } else {
              $temperaturas = $_GET['temperatura'];
              echo "<table class='bordered highlight responsive-table'>";
              foreach ($temperaturas as $mes => $temp) {
                echo "<tr><td>", $mes , "</td><td>"; 
                for($i = 0;$i < $temp;$i++){
                  echo "<img src = 'images/temp.png' />";
                }
                echo " " , $temp , "ºC <br>";
              }
              echo "</table><br><br>";
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
