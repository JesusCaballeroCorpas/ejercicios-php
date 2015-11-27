<!DOCTYPE html>
<!--
Capitulo 7 Acceso a Bases de Datos

Ejercicio 3
Modifica la tienda virtual realizada anteriormente de tal forma que todos los datos de los artículos
se guarden en una base de datos.

@author: Jesús Caballero Corpas
-->
<?php
  session_start(); // Inicio de sesión
  //Creo las variables globales de sesion y las recibidas por post
  $carrito =& $_SESSION['carrito'];
  $codigo =& $_POST['codigo'];
  $action =& $_POST['action'];
  
  //Se crea la conexión a la BBDD
  try{
    $conexion = new PDO("mysql:host=localhost;dbname=tienda;charset=utf8", "root", "root");
  } catch (PDOException $e) {
    echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
    die ("Error: " . $e->getMessage());
  }
  
  //Si no se ha recibido el carrito se crea con los codigos de los productos y el valor 0
  if(!isset($carrito)) {
    //$carrito = ["sevenw" => 0, "carca" => 0, "caylus" => 0, "villa" => 0];
    $total = 0;
  }
?>
<html>
  
  <head>
    <title>Ejercicios PHP Capitulo 7. Acceso a Base de Datos</title>
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
  
  <body class="container light-blue lighten-4">
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <header class="center-align">
      <h2>Ejercicios PHP Capitulo 7. Acceso a Base de Datos</h2>
    </header>
    <section class="card-panel light-blue lighten-2">
      
      <article class="card-panel black-text text-darken-2 light-blue lighten-3">
        <h5>Tienda Virtual</h5>
        <div>
          <div class="row">
            <div class="col s8">
              <div class="col s12"><h3>PRODUCTOS</h3></div>
          <?php
          
          $consulta = $conexion->query("SELECT codigo, nombre, precio, imagen, detalle FROM juegos ORDER BY nombre");
          
          //Muestro todos los registros de la tabla juegos
          while ($registro = $consulta->fetchObject()){
          ?>
            <div class="col s6 borde">
              <img class="imagen" src="images/<?= $registro->imagen ?>">
              <div class="col s5"><?= $registro->nombre ?><br>Precio: <?= $registro->precio ?> €</div>
              <div class="col s7">
                  <form action="ejer03Detalle.php" method="post">
                  <input type="hidden" name="codigo" value="<?= $registro->codigo ?>">
                  <button class="btn waves-effect waves-light blue" type="submit" name="action" value="detalle">Detalle
                    <i class="material-icons right">info_outline</i>
                  </button><br><br>
                </form>
                <form action="#" method="post">
                  <input type="hidden" name="codigo" value="<?= $registro->codigo ?>">
                  <button class="btn waves-effect waves-light blue" type="submit" name="action" value="comprar">Comprar
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
              <div class="col s12">
                <form action="ejer03Productos.php" method="post">
                    <button class="btn waves-effect waves-light blue" type="submit" name="action">Administrar productos
                      <i class="material-icons right">send</i>
                    </button>
                </form>
                <h6>CARRITO</h6>
              </div>
              <?php
              if($action == "comprar") {
                $carrito[$codigo]++;
              }
              if($action == "eliminar"){
                $carrito[$codigo] = 0;
              }
              foreach ($carrito as $cod => $valor) {
                if($carrito[$cod] > 0){
                  $consulta = $conexion->query("SELECT * FROM juegos WHERE codigo = '$cod'");
                  $registro = $consulta->fetchObject();
                  $total += ($valor * $registro->precio);
              ?>    
                  <div class="col s4"><img class="imagenCarro" src="images/<?= $registro->imagen ?>"></div>
                  <div class="col s8">
                    <?= $registro->nombre ?><br>Precio: <?= $registro->precio ?> €<br>
                    Cantidad: <?= $valor ?><br>
                    <form action="#" method="post">
                      <input type="hidden" name="codigo" value="<?= $cod ?>">
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
            <button class="btn waves-effect waves-light blue" type="submit" name="action">Volver
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
  <?php $conexion->close(); ?>
</html>
