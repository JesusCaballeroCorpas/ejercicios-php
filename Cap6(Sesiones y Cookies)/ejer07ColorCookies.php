<!DOCTYPE html>
<!--
Capitulo 5 Arrays

Ejercicio 7
Escribe un programa que guarde en una cookie el color de fondo (propiedad background-color ) de
una página. Esta página debe tener únicamente algo de texto y un formulario para cambiar el color.

@author: Jesús Caballero Corpas
-->
<?php
  if(isset($_POST['color'])){
    $color = $_POST['color'];
    setcookie("color", $color, time() + 3*24*3600);
  } else if (isset($_COOKIE['color'])) {
    $color = $_COOKIE['color'];
  }
  
  // Borrado de cookies
  if (isset($_POST["borraCookies"])) {
    setcookie("color", NULL, -1);
    unset($color);
  } 
?>
<html>
  
  <head>
    <title>Ejercicios PHP Capitulo 6. Sesiones y Cookies</title>
    <meta charset="UTF-8">
    <meta name="author" content="Jesús Caballero Corpas">
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style>
      .fondo{
        background-color: <?= $color ?>;
      }
    </style>
  </head>
  
  <body class="container light-green lighten-4">
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <header class="center-align">
      <h2>Ejercicios PHP Capitulo 6. Sesiones y Cookies</h2>
    </header>
    <section class="card-panel light-green lighten-2">
      
      <article class="card-panel black-text fondo">
        <h5>Ejercicio 7</h5>
        <div>
          <span>Escribe un programa que guarde en una cookie el color de fondo (propiedad background-color ) de
          una página. Esta página debe tener únicamente algo de texto y un formulario para cambiar el color.</span><br><br>
          <?php
           
          ?>
          <h1>Página de prueba de cookies</h1>
          <form action="#" method="post">
            Selecciona un color para el fondo de la página: <input type="color" name="color"><br><br>
            <button class="btn waves-effect waves-light green" type="submit" name="action">Cambiar color
              <i class="material-icons right">send</i>
            </button>
            <button class="btn waves-effect waves-light red" type="submit" name="borraCookies">Borrar Cookies
              <i class="material-icons right">delete</i>
            </button>
          </form> <br>
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
    <p class="center-align"> © Jesús Caballero Corpas ©</p>
  </footer>
  
</html>
