<!DOCTYPE html>
<!--
Capitulo 5 Arrays

Ejercicio 6
Realiza un programa que pida 8 números enteros y que luego muestre esos números de colores, los
pares de un color y los impares de otro.

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
        <h5>Ejercicio 6</h5>
        <div>
          <span>Realiza un programa que pida 8 números enteros y que luego muestre esos números de colores, los
          pares de un color y los impares de otro.</span><br><br>  
          <?php
            if(!isset($_GET['action'])){
          ?>
            <div class="row">
              <div class="col s12"><h5>Introduce los 8 números:</h5></div>
              <form action="#" method="get">
                <?php
                for($i = 0;$i < 8;$i++){
                  echo "<div class='col s3'>";
                  echo "Número " , $i + 1 , ": <input type='number' name='numeros[", $i ,"]' step='1'></div>";
                }
                ?>
                <button class="btn waves-effect waves-light green" type="submit" name="action">Enviar
                  <i class="material-icons right">send</i>
                </button>
              </form>
            </div>
          <?php 
            } else {
              $numeros = $_GET['numeros'];
              foreach ($numeros as $numero) {
                if($numero % 2 == 0){
                  echo "<span class='blue-text text-darken-2'>" , $numero , "</span> Par <br>";
                } else {
                  echo "<span class='red-text text-darken-2'>" , $numero , "</span> Impar <br>";
                }
              }
              echo "<br>";
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
