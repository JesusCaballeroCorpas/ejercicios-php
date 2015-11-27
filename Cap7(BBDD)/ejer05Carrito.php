<?php
  session_start(); // Inicio de sesión
  //Creo las variables globales de sesion y las recibidas por POST
  $carrito =& $_SESSION['carrito'];
  $codArt = $_POST['codArt'];
  
  //Si no se ha recibido el carrito se crea con los codigos de los productos y el valor 0
  if(!isset($carrito)) {
    $total = 0;
  }
  //Se crea la conexión a la BBDD
  try{
    $conexion = new PDO("mysql:host=localhost;dbname=gestesimal;charset=utf8", "root", "root");
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
        <h5 class="center-align white-text">CARRITO</h5>
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
                <th>Controles</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if($_POST['action'] == "addCarrito") {
                //Se tiene que comprobar si existen articulos en el almacen.
                $consulta = $conexion->query("SELECT * FROM articulo WHERE CodArt = '$codArt'");
                $registro = $consulta->fetchObject();
                if($registro->StoArt > $carrito[$codArt]){
                  $carrito[$codArt]++;
                  //$salida = $stoArt - $salida;
                  //$conexion->query("UPDATE articulo SET StoArt = '$salida' WHERE CodArt = '$codArt'");
                } else {
                  echo "<p class='red-text'>No quedan más unidades en stock del producto con codigo: $codArt</p>";
                }
              }
              if($_POST['action'] == "del1Carrito") {
                if($carrito[$codArt] != 1){
                  $carrito[$codArt]--;
                } else {
                  unset($carrito[$codArt]);
                }
              }
              if($_POST['action'] == "delCarrito"){
                unset($carrito[$codArt]);
              }
              foreach ($carrito as $cod => $valor) {
                if($carrito[$cod] > 0){
                  $consulta = $conexion->query("SELECT * FROM articulo WHERE CodArt = '$cod'");
                  $registro = $consulta->fetchObject();
                  $total += ($valor * $registro->PreVen);
              ?>   
                <tr>
                  <td><?= $registro->CodArt ?></td>
                  <td><?= $registro->DesArt ?></td>
                  <td><?= $registro->PreVen ?> €</td>
                  <td><?= $valor ?> Unds</td>
                  <td><?= number_format($valor * $registro->PreVen,2) ?> €</td>
                  <td style="width:260px">
                    <form action="#" method="post">
                      <input type="hidden" name="codArt" value="<?= $cod ?>">
                      <button class="btn waves-effect waves-light red" title="Quitar del carrito" type="submit" name="action" value="delCarrito">
                        <i class="material-icons">delete</i>
                      </button>
                      <button class="btn waves-effect waves-light green" title="Añadir 1 más al carrito" type="submit" name="action" value="addCarrito">
                        <i class="material-icons">add</i>
                      </button>
                      <button class="btn waves-effect waves-light pink" title="Quitar 1 del carrito" type="submit" name="action" value="del1Carrito">
                        <i class="material-icons">remove</i>
                      </button>
                    </form>
                  </td>
                </tr>  
              <?php
                }
              }
              ?>
                <tr>
                  <td colspan="3"></td>
                  <td><strong>TOTAL:</strong></td>
                  <td><strong><?= number_format($total,2) ?>€</strong></td>
                  <td></td>
                </tr>
                <tr>
                  <td colspan="3"></td>
                  <td><strong>IVA:</strong></td>
                  <td><strong><?= number_format($total * 0.21,2) ?>€</strong></td>
                  <td></td>
                </tr>
                <tr>
                  <td colspan="3"></td>
                  <td><strong>TOTAL con IVA:</strong></td>
                  <td><strong><?= number_format($total * 1.21,2) ?>€</strong></td>
                  <td>
                    <form action="ejer05Ventas.php" method="post">
                      <button class="btn waves-effect waves-light green" title="Crear Factura" type="submit" name="action" value="venta">
                        <i class="material-icons">credit_card</i>
                      </button>
                    </form>
                  </td>
                </tr>
            </tbody>
          </table>
          <a href="ejer05GestesimalConVenta.php" class="btn waves-effect waves-light blue">Volver
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
