<?php
session_start(); // Inicio de sesión
  //Creo las variables globales de sesion
  $carrito =& $_SESSION['carrito'];
  //Si no se ha recibido el carrito se crea con los codigos de los productos y el valor 0
  if(!isset($carrito)) {
    $total = 0;
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
      <article class="card-panel black-text text-darken-2 grey lighten-3">
        <div>    
          <?php
          //Se crea la conexión a la BBDD
            try{
              $conexion = new PDO("mysql:host=localhost;dbname=gestesimal;charset=utf8", "root", "root");
            } catch (PDOException $e) {
              echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
              die ("Error: " . $e->getMessage());
            }
            
           //Se reciben los datos de los formularios
           $codArt = $_POST['codArt'];
           //Se ejecuta la consulta
           $consulta = $conexion->query("SELECT * FROM articulo WHERE CodArt = '$codArt'");
          ?>
          
          </form>
          <table>
            <thead>
              <tr>
                <th>Codigo</th>  
                <th>Descripción</th>  
                <th>Precio Compra</th>  
                <th>Precio Venta</th>
                <th>Stock</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              //Muestro el registro de la tabla articulo que quiero eliminar
              $registro = $consulta->fetchObject();
              ?>
              <tr>
                <td><?= $registro->CodArt ?></td>
                <td><?= $registro->DesArt ?></td>
                <td><?= $registro->PreCom ?></td>
                <td><?= $registro->PreVen ?></td>
                <td><?= $registro->StoArt ?></td>
              </tr>
            </tbody>
          </table>
          <h5>¿Esta seguro que desea borrar este artículo?</h5>
          <form action="ejer05GestesimalConVenta.php" method="post">
            <input type="hidden" name="codArt" value="<?= $codArt ?>">
            <button class="btn waves-effect waves-light green" type="submit" name="action" value="borrar">SI
              <i class="material-icons right">delete</i>
            </button>
            <a href="ejer05GestesimalConVenta.php" class="btn waves-effect waves-light red">NO
              <i class="material-icons right">cancel</i>
            </a>
          </form>
          <br>
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
