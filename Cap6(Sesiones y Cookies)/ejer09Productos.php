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
  $productos =& $_SESSION['productos'];
  $codigo =& $_POST['codigo'];
  $action =& $_POST['action'];
  
  //Borrar producto
  if($action == "borrar"){
      unset($productos[$codigo]);
      setcookie("productos", serialize($productos), time() + 3*24*3600);
  }
  //Añadir producto
  if($action == "anadir"){
      $productos[$codigo]["nombre"] = $_POST['nombre'];
      $productos[$codigo]["precio"] = $_POST['precio'];
      $productos[$codigo]["detalle"] = $_POST['detalle'];
      $productos[$codigo]["imagen"] = $_POST['imagen'];
      setcookie("productos", serialize($productos), time() + 3*24*3600);
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
        text-align: left;
        margin: 2px 0px;
      }
      .divExaminar{
          margin-top: 15px;
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
            <div class="col s12">
              <div class="col s12"><h3>PRODUCTOS</h3></div>
              <div class="col s12 borde">
                  <form action="#" method="post">
                      <?php 
                        //Modificar producto
                        if($action == "modificar"){
                      ?>
                        <div class="col s2">Codigo: <input type="text" name="codigo" value="<?= $codigo ?>"></div>
                        <div class="col s2">Nombre: <input type="text" name="nombre" value="<?= $productos[$codigo][nombre] ?>"></div>
                        <div class="col s2">Precio: <input type="number" name="precio" value="<?= $productos[$codigo][precio] ?>"></div>
                        <div class="col s2">Detalle: <input type="text" name="detalle" value="<?= $productos[$codigo][detalle] ?>"></div>
                        <div class="col s2">Imagen: <input class="divExaminar" type="file" name="imagen" value="<?= $productos[$codigo][imagen] ?>"></div>
                        <div class="col s2">
                          <button class="btn waves-effect waves-light blue" type="submit" name="action" value="anadir">Modificar
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
                          <button class="btn waves-effect waves-light green" type="submit" name="action" value="anadir">Añadir
                            <i class="material-icons right">add</i>
                          </button>
                        </div>
                      <?php
                      }
                      ?>
                  </form>
              </div>
          <?php
          foreach ($productos as $cod => $valor) {
          ?>
            <div class="col s12 borde">
              <div class="col s2"><img class="imagenCarro" src="images/<?=$valor[imagen]?>"></div> 
              <div class="col s2"><?=$valor[nombre]?> </div>
              <div class="col s2"><?=$valor[precio]?> € </div>
              <div class="col s2"><?=$valor[detalle]?> </div>
              <div class="col s2">
                <form action="#" method="post">
                  <input type="hidden" name="codigo" value="<?=$cod?>">
                  <button class="btn waves-effect waves-light blue" type="submit" name="action" value="modificar">Modificar
                    <i class="material-icons right">edit</i>
                  </button>
                </form>
              </div>
              <div class="col s2">
                <form action="#" method="post">
                  <input type="hidden" name="codigo" value="<?=$cod?>">
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
          <form action="ejer09Tienda.php" method="post">
            <button class="btn waves-effect waves-light green" type="submit" name="action">Volver a Tienda
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
