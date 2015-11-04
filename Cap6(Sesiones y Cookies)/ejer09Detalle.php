<!DOCTYPE html>
<!--
Capitulo 5 Arrays

Ejercicio 9
Amplía el ejercicio 6 de tal forma que los productos que se pueden elegir para comprar se almacenen
en cookies. La aplicación debe ofrecer, por tanto, las opciones de alta, baja y modificación de
productos.

@author: Jesús Caballero Corpas
-->
<?php
  session_start(); // Inicio de sesión
  ////Creo las variables globales de sesion y las recibidas por post
  $carrito =& $_SESSION['carrito'];
  $productos =& $_SESSION['productos'];
  $codigo =& $_POST['codigo'];
  $action =& $_POST['action'];
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
        <h5>Ejercicio 9</h5>
        <div>
          <span>Amplía el ejercicio 6 de tal forma que los productos que se pueden elegir para comprar se almacenen
          en cookies. La aplicación debe ofrecer, por tanto, las opciones de alta, baja y modificación de
          productos.</span><br><br>
          <div class="row">
            <div class="col s8">
              <div class="col s12"><h3>PRODUCTO</h3></div>
              <div class="col s6 borde">
                <img class="imagen" src="images/<?=$productos[$codigo]['imagen']?>">
                <div class="col s12"><?=$productos[$codigo]['detalle']?><br><br></div>
                <div class="col s5"><?=$productos[$codigo]['nombre']?><br>Precio: <?=$productos[$codigo]['precio']?> €</div>
                <div class="col s7">
                  <form action="ejer09Tienda.php" method="post">
                    <input type="hidden" name="codigo" value="<?=$codigo?>">
                    <button class="btn waves-effect waves-light green" type="submit" name="action" value="comprar">Comprar
                      <i class="material-icons right">add_shopping_cart</i>
                    </button><br><br>
                  </form>
                </div>
              </div>
          
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
          <form action="ejer09Tienda.php" method="post">
            <button class="btn waves-effect waves-light green" type="submit" name="action">Volver a la Tienda
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
