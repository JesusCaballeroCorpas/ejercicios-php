<!DOCTYPE html>
<!--
Capitulo 5 Arrays

Ejercicio 6
Amplía el programa anterior de tal forma que se pueda ver el detalle de un producto. Para ello, cada
uno de los productos del catálogo deberá tener un botón *Detalle que, al ser accionado, debe llevar
al usuario a la vista de detalle que contendrá una descripción exhaustiva del producto en cuestión.
Se podrán añadir productos al carrito tanto desde la vista de listado como desde la vista de detalle.

@author: Jesús Caballero Corpas
-->
<?php
  session_start(); // Inicio de sesión
  //Creo el array de productos
  $productos = ["sevenw" => ["nombre" => "7 Wonders",
                             "precio" => 40, 
                             "imagen" => "7Wonders.png",
                             "detalle" => "Juego de cartas de 2 a 7 jugadores con una duración media de 45 minutos."],
                "carca" => ["nombre" => "Carcassonne",
                            "precio" => 20, 
                            "imagen" => "carcassonne.png",
                            "detalle" => "Juego de tablero de 2 a 4 jugadores con una duración entre 30 y 45 minutos."],
                "caylus" => ["nombre" => "Caylus",
                             "precio" => 42, 
                             "imagen" => "caylus.png",
                             "detalle" => "Juego de tablero de 2 a 4 jugadores con una duración media de 1 hora y 30 minutos."],
                "villa" => ["nombre" => "La Villa",
                            "precio" => 28,
                            "imagen" => "lavilla.png",
                            "detalle" => "Juego de tablero de 2 a 4 jugadores con una duración media de 1 hora y 20 minutos."],
    ];
  //Creo las variables globales de sesion y las recibidas por post
  $carrito =& $_SESSION['carrito'];
  $codigo =& $_POST['codigo'];
  $action =& $_POST['action'];
  //Si no se ha recibido el carrito se crea con los codigos de los productos y el valor 0
  if(!isset($carrito)) {
    $carrito = ["sevenw" => 0, "carca" => 0, "caylus" => 0, "villa" => 0];
    $total = 0;
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
      .imagen{
        width: 300px;
        height: 300px;
      }
      .imagenCarro{
        width: 100px;
        height: 100px;
      }
      h3, h6{
        text-align: center;
        border-bottom: 2px solid black;
        display: block;
      }
      .borde{
        margin-left: 1px;
        border:1px solid black;
        border-radius: 10px;
        text-align: center;
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
      
      <article class="card-panel black-text text-darken-2 light-green lighten-3">
        <h5>Ejercicio 6</h5>
        <div>
          <span>Amplía el programa anterior de tal forma que se pueda ver el detalle de un producto. Para ello, cada
          uno de los productos del catálogo deberá tener un botón *Detalle que, al ser accionado, debe llevar
          al usuario a la vista de detalle que contendrá una descripción exhaustiva del producto en cuestión.
          Se podrán añadir productos al carrito tanto desde la vista de listado como desde la vista de detalle.</span><br><br>
          <div class="row">
            <div class="col s8">
              <div class="col s12"><h3>PRODUCTOS</h3></div>
          <?php
          foreach ($productos as $cod => $valor) {
          ?>
            <div class="col s6 borde">
              <img class="imagen" src="images/<?=$valor[imagen]?>">
              <div class="col s5"><?=$valor[nombre]?><br>Precio: <?=$valor[precio]?> €</div>
              <div class="col s7">
                <form action="ejer06DetalleProducto.php" method="post">
                  <input type="hidden" name="codigo" value="<?=$cod?>">
                  <button class="btn waves-effect waves-light green" type="submit" name="action" value="detalle">Detalle
                    <i class="material-icons right">info_outline</i>
                  </button><br><br>
                </form>
                <form action="#" method="post">
                  <input type="hidden" name="codigo" value="<?=$cod?>">
                  <button class="btn waves-effect waves-light green" type="submit" name="action" value="comprar">Comprar
                    <i class="material-icons right">add_shopping_cart</i>
                  </button><br><br>
                </form>
              </div>
            </div>
          <?php
          }					
          ?>
            </div>
            <div class="col s4">
              <div class="col s12"><h6>CARRITO</h6></div>
              <?php
              if($action == "comprar") {
                $carrito[$codigo]++;
              }
              if($action == "eliminar"){
                $carrito[$codigo] = 0;
              }
              foreach ($productos as $cod => $valor) {
                if($carrito[$cod] > 0){
                  $total += ($carrito[$cod] * $valor[precio]);
              ?>    
                  <div class="col s4"><img class="imagenCarro" src="images/<?=$valor[imagen]?>"></div>
                  <div class="col s8">
                    <?=$valor[nombre]?><br>Precio: <?=$valor[precio]?> €<br>
                    Cantidad: <?=$carrito[$cod]?><br>
                    <form action="#" method="post">
                      <input type="hidden" name="codigo" value="<?=$cod?>">
                      <button class="btn waves-effect waves-light red" type="submit" name="action" value="eliminar">Eliminar
                        <i class="material-icons right">delete</i>
                      </button><br><br>
                    </form>
                  </div>
              <?php
                }
              }
              ?>
              <div class="col s12"><h6>TOTAL: <?= $total ?>€</h6></div>
            </div>
          </div>
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
