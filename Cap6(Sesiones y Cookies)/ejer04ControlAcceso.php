<!DOCTYPE html>
<!--
Capitulo 5 Arrays

Ejercicio 4
Establece un control de acceso mediante nombre de usuario y contraseña para cualquiera de los
programas de la relación anterior. La aplicación no nos dejará continuar hasta que iniciemos sesión
con un nombre de usuario y contraseña correctos.

@author: Jesús Caballero Corpas
-->
<?php
  session_start(); // Inicio de sesión
  $usuario =& $_POST['usuario'];
  $pass =& $_POST['pass'];
  $login =& $_SESSION['login'] ;
  
  if(isset($_POST['usuario'])) {
    //print_r (get_defined_vars());
    if($usuario == "admin" && $pass = "admin"){
      $login = TRUE;
      $_SESSION['usuario'] = $usuario;
    } else {
      $mensaje = "Usuario o contraseña incorrecta. Vuelva a intentarlo.";
      $fallo = TRUE;
      $login = FALSE;
    }
  } else {
    $login = FALSE;
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
        <h5>Ejercicio 4</h5>
        <div>
          <span>Establece un control de acceso mediante nombre de usuario y contraseña para cualquiera de los
          programas de la relación anterior. La aplicación no nos dejará continuar hasta que iniciemos sesión
          con un nombre de usuario y contraseña correctos.</span><br><br>
          <?php
            if(!$login){
              if($fallo){echo "$mensaje <br>";}
          ?>
            <form action="#" method="post">
              Introduzca nombre de usuario:
              <input type="text" name="usuario" autofocus>
              Introduzca Contraseña:
              <input type="password" name="pass">
              <button class="btn waves-effect waves-light green" type="submit" name="action">Enviar
                <i class="material-icons right">send</i>
              </button>
            </form><br>
          <?php 
            } else {
              header('Location: ./ejer03Suma10000.php');
            }
          ?>
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
