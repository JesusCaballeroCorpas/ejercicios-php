<!DOCTYPE html>
<!--
Capitulo 5 Arrays

Ejercicio 2
Realiza un programa que vaya pidiendo números hasta que se introduzca un numero negativo y
nos diga cuantos números se han introducido, la media de los impares y el mayor de los pares. El
número negativo sólo se utiliza para indicar el final de la introducción de datos pero no se incluye
en el cómputo. Utiliza sesiones.

@author: Jesús Caballero Corpas
-->
<?php
  session_start(); // Inicio de sesión
  $sumaImpares =& $_SESSION['sumaImpares'];
  $contadorImpares =& $_SESSION['contadorImpares'];
  $mayorPares =& $_SESSION['mayorPares'];
  $contador =& $_SESSION['contador'];
  $variable = $_POST['variable'];
  $formulario = TRUE;
  
  if(isset($_POST['variable'])) {
    //print_r (get_defined_vars());
    if($variable < 0){
      $mensaje = "Se han introducido: $contador números <br>La media de impares es: " . ($sumaImpares / $contadorImpares) . 
                 "<br>El mayor de los pares es: $mayorPares";
      $formulario = FALSE;
    } else {
      if($variable % 2 == 0){
        if($variable > $mayorPares){
          $mayorPares = $variable;
        }
      } else {
        $sumaImpares += $variable;
        $contadorImpares++;
      }
      $contador++;
    }
  } else {
    $contador = 0;
    $sumaImpares = 0;
    $contadorImpares = 0;
    $mayorPares = -PHP_INT_MAX;
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
  </head>
  
  <body class="container light-green lighten-4">
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <header class="center-align">
      <h2>Ejercicios PHP Capitulo 6. Sesiones y Cookies</h2>
    </header>
    <section class="card-panel light-green lighten-2">
      
      <article class="card-panel black-text text-darken-2 light-green lighten-3">
        <h5>Ejercicio 2</h5>
        <div>
          <span>Realiza un programa que vaya pidiendo números hasta que se introduzca un numero negativo y
          nos diga cuantos números se han introducido, la media de los impares y el mayor de los pares. El
          número negativo sólo se utiliza para indicar el final de la introducción de datos pero no se incluye
          en el cómputo. Utiliza sesiones.</span><br><br>
          <?php
            if($formulario){
          ?>
            <form action="#" method="post">
              Introduzca números positivos para Hacer una estadistica sobre ellos. Para acabar introduzca uno negativo.
              <input type="number" name="variable" autofocus>
              <button class="btn waves-effect waves-light green" type="submit" name="action">Enviar
                <i class="material-icons right">send</i>
              </button>
            </form><br>
          <?php 
            } else {
              echo $mensaje . "<br><br>";
            } ?>
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
