<?php
  session_start(); // Inicio de sesión
  //Creo las variables globales de sesion y las recibidas por POST
  $carrito =& $_SESSION['carrito'];
  $codigo = $_POST['codigo'];
  
  //Si no se ha recibido el carrito se crea con los codigos de los productos y el valor 0
  if(!isset($carrito)) {
    $total = 0;
  }
  //Se crea la conexión a la BBDD
  try{
    $conexion = new PDO("mysql:host=localhost;dbname=gestisimal;charset=utf8", "root", "root");
  } catch (PDOException $e) {
    echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
    die ("Error: " . $e->getMessage());
  }
?>
<!DOCTYPE html>
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
  </head>
  
  <body class="container light-white lighten-4">
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <header class="center-align">
      <h2>Gestión Simplificada de Almacen</h2>
    </header>
    <section class="card-panel light-blue">
        <h4 class="center-align white-text">GESTISIMAL</h4>
        <h5 class="center-align white-text">FACTURA</h5>
      <article class="card-panel black-text text-darken-2 grey lighten-3">
        <div>
          <table class="highlight">
            <thead>
              <tr>
                <th>Código</th>  
                <th>Descripción</th>  
                <th>Precio</th>  
                <th>Cantidad</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($carrito as $cod => $cantidad) {
                if($carrito[$cod] > 0){
                  $consulta = $conexion->query("SELECT * FROM articulo WHERE codigo = '$cod'");
                  $registro = $consulta->fetchObject();
                  $total += ($cantidad * $registro->precio_venta);
                  //Se decrementa el stock
                  $salida = $registro->stock - $cantidad;
                  $conexion->query("UPDATE articulo SET stock = '$salida' WHERE codigo = '$cod'");
              ?>   
                <tr>
                  <td><?= $registro->codigo ?></td>
                  <td><?= $registro->descripcion ?></td>
                  <td><?= $registro->precio_venta ?> €</td>
                  <td><?= $cantidad ?> Unds</td>
                  <td><?= number_format($cantidad * $registro->precio_venta,2) ?> €</td>
                </tr>  
              <?php
                  //Vacio el carrito
                  $carrito[$cod] = 0;
                }
              }
              ?>
                <tr>
                  <td colspan="3"></td>
                  <td><strong>TOTAL:</strong></td>
                  <td><strong><?= number_format($total,2) ?>€</strong></td>
                </tr>
                <tr>
                  <td colspan="3"></td>
                  <td><strong>IVA:</strong></td>
                  <td><strong><?= number_format($total * 0.21,2) ?>€</strong></td>
                </tr>
                <tr>
                  <td colspan="3"></td>
                  <td><strong>TOTAL con IVA:</strong></td>
                  <td><strong><?= number_format($total * 1.21,2) ?>€</strong></td>
                </tr>
            </tbody>
          </table>
          <a href="ejer05_1GestesimalConVenta.php" class="btn waves-effect waves-light blue">Volver
            <i class="material-icons left">arrow_back</i>
          </a>
        </div>
      </article>
      
    </section>  
  </body>
  
  <footer>
    <p class="center-align"> © Jesús Caballero Corpas ©</p>
  </footer>
  <?php $conexion->close(); ?>
</html>
