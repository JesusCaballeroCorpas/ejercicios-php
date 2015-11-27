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
  $codigo =& $_POST['codigo'];
  $nombre = $_POST['nombre'];
  $precio = $_POST['precio'];
  $detalle = $_POST['detalle'];
  $imagen = $_FILES["imagen"]["name"];
  $action =& $_POST['action'];
  
  // sube la imagen al servidor
  move_uploaded_file($_FILES["imagen"]["tmp_name"], "images/" . $_FILES["imagen"]["name"]);
  
  //Se crea la conexión a la BBDD
  try{
    $conexion = new PDO("mysql:host=localhost;dbname=tienda;charset=utf8", "root", "root");
  } catch (PDOException $e) {
    echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
    die ("Error: " . $e->getMessage());
  }
  
  //Se ejecuta el insert si se da de alta
  if($_POST['action'] == "alta"){
    $consulta = $conexion->query("SELECT * FROM juegos WHERE codigo = '$codigo'");
    
    if($consulta->rowCount() == 0){
      $conexion->query("INSERT INTO juegos VALUES ('$codigo','$nombre','$precio','$imagen','$detalle')");
    } else {
      echo "<p class='red-text'>ERROR al introducir el juego, el codigo: $codigo ya existe en la base de datos.</p>";
    }

  }
  //Se ejecuta el delete si se quiere borrar
  if($_POST['action'] == "borrar"){
    $conexion->query("DELETE FROM juegos WHERE codigo = '$codigo'");
  }
  //Se ejecuta el update si se quiere modificar
  if($_POST['action'] == "modificar"){
    $conexion->query("UPDATE juegos SET codigo = '$codigo', nombre = '$nombre', precio = '$precio',"
                   . " imagen = '$imagen', detalle = '$detalle' WHERE codigo = '$codigo'");
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
        text-align: left;
        margin: 2px 0px;
      }
      .divExaminar{
          margin-top: 15px;
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
            <div class="col s12">
              <div class="col s12"><h3>PRODUCTOS</h3></div>
              <div class="col s12 borde">
                  <form action="#" enctype="multipart/form-data" method="post">
                      <?php 
                        //Modificar producto
                        if($action == "cargaMod"){
                          $consulta = $conexion->query("SELECT * FROM juegos WHERE codigo = '$codigo'");
                          $registro = $consulta->fetchObject();
                      ?>
                        <div class="col s2">Codigo: <input type="text" name="codigo" value="<?= $codigo ?>" disabled></div>
                        <div class="col s2">Nombre: <input type="text" name="nombre" value="<?= $registro->nombre ?>"></div>
                        <div class="col s2">Precio: <input type="number" name="precio" value="<?= $registro->precio ?>"></div>
                        <div class="col s2">Detalle: <input type="text" name="detalle" value="<?= $registro->detalle ?>"></div>
                        <div class="col s2">Imagen: <input class="divExaminar" type="file" name="imagen" value="<?= $registro->imagen ?>"></div>
                        <div class="col s2">
                          <button class="btn waves-effect waves-light blue" type="submit" name="action" value="modificar">Modificar
                            <i class="material-icons right">edit</i>
                          </button>
                        </div>
                      <?php } else { ?>
                        <div class="col s2">Codigo: <input type="text" name="codigo"></div>
                        <div class="col s2">Nombre: <input type="text" name="nombre"></div>
                        <div class="col s2">Precio: <input type="number" name="precio" min="0"></div>
                        <div class="col s2">Detalle: <input type="text" name="detalle"></div>
                        <div class="col s2">Imagen: <input class="divExaminar" type="file" name="imagen"></div>
                        <div class="col s2">
                          <button class="btn waves-effect waves-light blue" type="submit" name="action" value="alta">Añadir
                            <i class="material-icons right">add</i>
                          </button>
                        </div>
                      <?php
                      }
                      ?>
                  </form>
              </div>
          <?php
          //Se realiza la consulta para mostrar todos los productos
          $consulta = $conexion->query("SELECT codigo, nombre, precio, imagen, detalle FROM juegos ORDER BY nombre");
          while ($registro = $consulta->fetchObject()){
          ?>
            <div class="col s12 borde">
              <div class="col s2"><img class="imagenCarro" src="images/<?= $registro->imagen ?>"></div> 
              <div class="col s2"><?= $registro->nombre ?> </div>
              <div class="col s2"><?= $registro->precio ?> € </div>
              <div class="col s2"><?= $registro->detalle ?> </div>
              <div class="col s2">
                <form action="#" method="post">
                  <input type="hidden" name="codigo" value="<?= $registro->codigo ?>">
                  <button class="btn waves-effect waves-light blue" type="submit" name="action" value="cargaMod">Modificar
                    <i class="material-icons right">edit</i>
                  </button>
                </form>
              </div>
              <div class="col s2">
                <form action="#" method="post">
                  <input type="hidden" name="codigo" value="<?= $registro->codigo ?>">
                  <button class="btn waves-effect waves-light red" type="submit" name="action" value="borrar">Borrar
                    <i class="material-icons right">delete</i>
                  </button>
                </form>
              </div>
            </div>
          <?php
          }					
          ?>
            </div>
          </div>
          <form action="ejer03Tienda.php" method="post">
            <button class="btn waves-effect waves-light blue" type="submit" name="action">Volver a Tienda
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
