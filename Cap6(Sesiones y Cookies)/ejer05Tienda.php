<!DOCTYPE html>
<!--
Capitulo 5 Arrays

Ejercicio 5
Crea una tienda on-line sencilla con un catálogo de productos y un carrito de la compra. Un
catálogo de cuatro o cinco productos será suficiente. De cada producto se debe conocer al menos
la descripción y el precio. Todos los productos deben tener una imagen que los identifique. Al lado
de cada producto del catálogo deberá aparecer un botón Comprar que permita añadirlo al carrito.
Si el usuario hace clic en el botón Comprar de un producto que ya estaba en el carrito, se deberá
incrementar el número de unidades de dicho producto. Para cada producto que aparece en el carrito,
habrá un botón Eliminar por si el usuario se arrepiente y quiere quitar un producto concreto del
carrito de la compra. A continuación se muestra una captura de pantalla de una posible solución.

@author: Jesús Caballero Corpas
-->
<?php
  session_start(); // Inicio de sesión
  //Creo el array de productos
  $productos = [
    "sevenw" => ["nombre" => "7 Wonders", "precio" => 40, "imagen" => "7Wonders.png"],
    "carca" => ["nombre" => "Carcassonne", "precio" => 20, "imagen" => "carcassonne.png"],
    "caylus" => ["nombre" => "Caylus", "precio" => 42, "imagen" => "caylus.png"],
    "villa" => ["nombre" => "La Villa", "precio" => 28, "imagen" => "lavilla.png"],
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
        <h5>Ejercicio 5</h5>
        <div>
          <span>Crea una tienda on-line sencilla con un catálogo de productos y un carrito de la compra. Un
          catálogo de cuatro o cinco productos será suficiente. De cada producto se debe conocer al menos
          la descripción y el precio. Todos los productos deben tener una imagen que los identifique. Al lado
          de cada producto del catálogo deberá aparecer un botón Comprar que permita añadirlo al carrito.
          Si el usuario hace clic en el botón Comprar de un producto que ya estaba en el carrito, se deberá
          incrementar el número de unidades de dicho producto. Para cada producto que aparece en el carrito,
          habrá un botón Eliminar por si el usuario se arrepiente y quiere quitar un producto concreto del
          carrito de la compra. A continuación se muestra una captura de pantalla de una posible solución.</span><br><br>
          <div class="row">
            <div class="col s8">
              <div class="col s12"><h3>PRODUCTOS</h3></div>
          <?php
          foreach ($productos as $cod => $valor) {
          ?>
            <div class="col s6">
              <img class="imagen" src="images/<?=$valor[imagen]?>"><br><br>
              <?=$valor[nombre]?><br>Precio: <?=$valor[precio]?> €<br><br>
              <form action="#" method="post">
                <input type="hidden" name="codigo" value="<?=$cod?>">
                <button class="btn waves-effect waves-light green" type="submit" name="action" value="comprar">Comprar
                  <i class="material-icons right">add_shopping_cart</i>
                </button><br><br>
              </form>
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
