<!DOCTYPE html>
<!--
Capitulo 5 Arrays

Ejercicio 2
Escribe un programa que pida 10 números por teclado y que luego muestre los números introducidos
junto con las palabras “máximo” y “mínimo” al lado del máximo y del mínimo respectivamente.

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
        <h5>Ejercicio 2</h5>
        <div>
          <span>Escribe un programa que pida 10 números por teclado y que luego muestre los números introducidos
          junto con las palabras “máximo” y “mínimo” al lado del máximo y del mínimo respectivamente.</span><br><br>  
          <?php
            //Asigno a cada variable lo que van a recibir.
             
            $contador = $_REQUEST['contador'];
            $cadenaNumeros = $_REQUEST['cadenaNumeros'];
            $numeroIntroducido = $_REQUEST['numeroIntroducido'];
            //$mayor = $_REQUEST['mayor'];
            //$menor = $_REQUEST['menor'];
            //Si no han recibido valores las inicializo.
            if(!isset($contador)){ 
              $contador = 0;
              $cadenaNumeros = "";
              $numeroIntroducido = "";
            }
            
            //Compruebo si es la primera vez que se introduce un número en la cadena o si se lo añado.
            if($cadenaNumeros == ""){
              $cadenaNumeros = $numeroIntroducido;
            } else {
              $cadenaNumeros = $cadenaNumeros . " " . $numeroIntroducido;
            }
            //Si no he introducido todos los números muestro el formulario.
            if($contador < 10){
              $contador++;
              echo "Introduce el número ", $contador;
          ?>  
            <form action="#" method="get">
              <input type="number" name="numeroIntroducido" autofocus>
              <input type="hidden" name="contador" value="<?= $contador ?>">
              <input type="hidden" name="cadenaNumeros" value="<?= $cadenaNumeros ?>">
              <button class="btn waves-effect waves-light green" type="submit" name="action">Aceptar
                <i class="material-icons right">send</i>
              </button>
            </form><br>
             
          <?php  
            //Si ya se han introducido todos los números los paso a un array y los muestro.
            } else {
              //Convierto la cadena en array y calculo el máximo y el mínimo.
              $cadenaNumeros = explode(" ", $cadenaNumeros);
              $mayor = max($cadenaNumeros);
              $menor = min($cadenaNumeros);
              // Muestra los números introducidos
              echo "Los números introducidos son: <br>";
              foreach ($cadenaNumeros as $numero) {
                //var_dump($numero);
                if($numero == $mayor){
                  echo $numero , " Mayor<br>"; 
                }else if($numero == $menor){
                  echo $numero , " Menor<br>"; 
                }else {
                  echo $numero , " <br>";
                }
              }
              echo "<br>";
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
    <p class="center-align">Jesús Caballero Corpas ©</p>
    <div class="footer-copyright">
      <div class="container">
        © 2014 Copyright Text
      </div>
    </div>
  </footer>
  
</html>
