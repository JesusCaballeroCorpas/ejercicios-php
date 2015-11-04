<!DOCTYPE html>
<!--
Capitulo 5 Arrays

Ejercicio 3
Escribe un programa que permita ir introduciendo una serie indeterminada de números mientras
su suma no supere el valor 10000. Cuando esto último ocurra, se debe mostrar el total acumulado,
el contador de los números introducidos y la media. Utiliza sesiones.

@author: Jesús Caballero Corpas
-->
<?php
  session_start(); // Inicio de sesión
  $suma =& $_SESSION['suma'];
  $contador =& $_SESSION['contador'];
  $variable = $_POST['variable'];
  $formulario = TRUE;
  
  //Si venimos del ejercicio 4 usamos estas variables
  $usuario =& $_SESSION['usuario'];
  
  if(isset($_POST['variable'])) {
    //print_r (get_defined_vars());
    if($suma <= 10000){
      $suma += $variable;
      $contador++;
    } 
    if($suma > 10000){
      $mensaje = "Se han introducido: $contador números <br>La suma es: $suma <br>"
               . "La media es: " . ($suma / $contador);
      $formulario = FALSE;
    }
  } else {
    $contador = 0;
    $suma = 0;
    $usuario = $_SESSION['usuario'];
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
        <h5>Ejercicio 3</h5>
        <div>
          <span>Escribe un programa que permita ir introduciendo una serie indeterminada de números mientras
          su suma no supere el valor 10000. Cuando esto último ocurra, se debe mostrar el total acumulado,
          el contador de los números introducidos y la media. Utiliza sesiones.</span><br><br>
          <?php
            if($formulario){
              echo "Esta conectado como: $usuario";
          ?>
            <form action="#" method="post">
              Introduzca números positivos para sumarlos hasta llegar a 10000. Para acabar introduzca uno negativo.
              <br>La suma hasta ahora es: <?php echo $suma; ?>
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
