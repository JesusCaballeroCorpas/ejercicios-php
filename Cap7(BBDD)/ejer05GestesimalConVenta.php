<!DOCTYPE html>
<!--
Capitulo 7 Acceso a Bases de Datos

Ejercicio 4
Crea el programa GESTISIMAL (GESTIón SIMplifcada de Almacén) para llevar el control de los
artículos de un almacén. De cada artículo se debe saber el código, la descripción, el precio de
compra, el precio de venta y el stock (número de unidades). La entrada y salida de mercancía
supone respectivamente el incremento y decremento de stock de un determinado artículo. Hay que
controlar que no se pueda sacar más mercancía de la que hay en el almacén. El programa debe tener,
al menos, las siguientes funcionalidades: listado, alta, baja, modificación, entrada de mercancía y
salida de mercancía.

@author: Jesús Caballero Corpas
-->
<?php
session_start(); // Inicio de sesión
  //Creo las variables globales de sesion
  $carrito =& $_SESSION['carrito'];
  //Si no se ha recibido el carrito se crea con los codigos de los productos y el valor 0
  if(!isset($carrito)) {
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
        .textoArriba{
          vertical-align: top;
          color: white;
        }
    </style>
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
           $desArt = $_POST['desArt'];
           $preCom = $_POST['preCom'];
           $preVen = $_POST['preVen'];
           $stoArt = $_POST['stoArt'];
           //Se ejecuta el insert si se da de alta
           if($_POST['action'] == "alta"){
             $consulta = $conexion->query("SELECT * FROM articulo WHERE CodArt = '$codArt'");
             if($consulta->rowCount() == 0){
               $conexion->query("INSERT INTO articulo VALUES ('$codArt','$desArt','$preCom','$preVen','$stoArt')");
               echo "<p class='green-text'>El artículo: $desArt se ha añadido correctamente a la base de datos.</p>";
             } else {
               echo "<p class='red-text'>ERROR al introducir el articulo, el Codigo de Artículo: $codArt ya existe en la base de datos.</p>";
             }
           }
           //Se ejecuta el delete si se quiere borrar
           if($_POST['action'] == "borrar"){
              $conexion->query("DELETE FROM articulo WHERE CodArt = '$codArt'");
              //Se comprueba que el artículo no exista en algúna factura
              if($conexion->errorCode() != 0){
                //echo $conexion->errorCode();
                echo "<p class='red-text'>ERROR No se ha eliminado el artículo con codigo: $codArt de la base de datos "
                        . "por que el producto existe en la tabla facturas.</p>";
              } else {
                echo "<p class='green-text'>Se ha eliminado correctamente de la base de datos el artículo con codigo: $codArt.</p>";
              }
           }
           //Se ejecuta el update si se quiere modificar
           if($_POST['action'] == "modificar"){
             $conexion->query("UPDATE articulo SET DesArt = '$desArt', PreCom = '$preCom', PreVen = '$preVen', StoArt = '$stoArt' WHERE CodArt = '$codArt'");
           }
           //Si se produce una entrada en almacen
           if($_POST['action'] == "entradaAlm"){
             $entrada = $_POST['entrada'];
             $entrada += $stoArt;
             $conexion->query("UPDATE articulo SET StoArt = '$entrada' WHERE CodArt = '$codArt'");
             echo "<p class='green-text'>Se han añadido correctamente " . $_POST['entrada'] . " unidades más al artículo con codigo: $codArt.</p>";
           }
           
           //Se Calcula el tamaño de página
           $tamPag = 5;
           $inicioPag = 0;
           $contRegPagActual = 0;
           $pagina = $_GET['pagina'];
           if(isset($pagina)){
             $inicioPag = ($pagina - 1) * $tamPag;
           } else {
             $pagina=1;
           }
           $consulta = $conexion->query("SELECT CodArt, DesArt, PreCom, PreVen, StoArt FROM articulo ORDER BY DesArt LIMIT $inicioPag, $tamPag");
          ?>
          <table class="highlight">
            <thead>
              <tr>
                <th>Código</th>  
                <th>Descripción</th>  
                <th>Precio Compra</th>  
                <th>Precio Venta</th>
                <th>Stock</th>
                <th colspan="4">Controles</th>
              </tr>
            </thead>
            <tbody>
              <form action="#" method="post">
                <tr>
              <?php
              if($_POST['action'] == "cargaMod") {
              ?>
                  <td><input type="text" name="codArt" required readonly value="<?= $codArt ?>"></td>
                  <td><input type="text" name="desArt" required value="<?= $desArt ?>"></td>
                  <td><input type="number" name="preCom" step="0.01" min="0" required value="<?= $preCom ?>"></td>
                  <td><input type="number" name="preVen" step="0.01" min="0" required value="<?= $preVen ?>"></td>
                  <td><input type="number" name="stoArt" min="0" value="<?= $stoArt ?>"></td>
                  <td>
                    <button class="btn waves-effect waves-light blue" title="Modificar Artículo" type="submit" name="action" value="modificar">
                      <i class="material-icons">edit</i>
                    </button>
                  </td>
              <?php
              } else {
              ?>
                  <td><input type="text" name="codArt" required></td>
                  <td><input type="text" name="desArt" required></td>
                  <td><input type="number" name="preCom" step="0.01" min="0" required></td>
                  <td><input type="number" name="preVen" step="0.01" min="0" required></td>
                  <td><input type="number" name="stoArt" min="0"></td>
                  <td>
                    <button class="btn waves-effect waves-light green" title="Añadir Nuevo Artículo" type="submit" name="action" value="alta">
                      <i class="material-icons">add</i>
                    </button>
                  </td>
              <?php 
              }
              ?>
                  <td>
                      <a href="ejer05Ventas.php" class="btn waves-effect waves-light pink" title="Ver Ventas">
                      <i class="material-icons">list</i>
                    </a>
                  </td>
                  <td colspan="2">
                      <a href="ejer05Carrito.php" class="btn waves-effect waves-light orange" title="Ver Carrito">
                      <?= count($carrito) ?><i class="material-icons right">shopping_cart</i>
                    </a>
                  </td>
                </tr>
              </form>
              <?php
              //Muestro todos los registros de la tabla cliente
              while ($registro = $consulta->fetchObject()){
                //Aumento el contador de filas en la página actual.
                $contRegPagActual++;
              ?>
              <tr>
                <td><?= $registro->CodArt ?></td>
                <td><?= $registro->DesArt ?></td>
                <td><?= $registro->PreCom ?> €</td>
                <td><?= $registro->PreVen ?> €</td>
                <td><?= $registro->StoArt ?> Unds</td>
                <td>
                  <form action="#" method="post">
                    <input type="hidden" name="codArt" value="<?= $registro->CodArt ?>">
                    <input type="hidden" name="desArt" value="<?= $registro->DesArt ?>">
                    <input type="hidden" name="preCom" value="<?= $registro->PreCom ?>">
                    <input type="hidden" name="preVen" value="<?= $registro->PreVen ?>">
                    <input type="hidden" name="stoArt" value="<?= $registro->StoArt ?>">
                    <button class="btn waves-effect waves-light blue" title="Modificar el Artículo" type="submit" name="action" value="cargaMod">
                      <i class="material-icons">edit</i>
                    </button>
                  </form>
                </td>
                <td>
                  <form action="ejer05Eliminar.php" method="post">
                    <input type="hidden" name="codArt" value="<?= $registro->CodArt ?>">
                    <button class="btn waves-effect waves-light red" title="Borrar el Artículo" type="submit" name="action" value="borrar">
                      <i class="material-icons">delete</i>
                    </button> 
                  </form>
                </td>
                <td>
                  <form action="ejer05EntradaAlmacen.php" method="post">
                    <input type="hidden" name="codArt" value="<?= $registro->CodArt ?>">
                    <button class="btn waves-effect waves-light green" title="Entrada de Almacén" type="submit" name="action" value="entradaAlm">
                      <i class="material-icons">store</i>
                    </button>
                  </form>
                </td>
                <td>
                  <form action="ejer05Carrito.php" method="post">
                    <input type="hidden" name="codArt" value="<?= $registro->CodArt ?>">
                    <button class="btn waves-effect waves-light orange" title="Añadir al Carrito" type="submit" name="action" value="addCarrito">
                      <i class="material-icons">add_shopping_cart</i>
                    </button>
                  </form>
                </td>
              </tr>
              <?php
              }
              $consulta1 = $conexion->query("SELECT * FROM articulo");
              $totalFilas = $consulta1->rowCount();
              $totalPaginas = floor(($totalFilas -1) / $tamPag) + 1;
              ?>
              <tr>
                <td colspan="2">
                    <strong>Articulos Mostrados: </strong><?=$contRegPagActual?><br>  
                    <strong>Total Articulos: </strong><?=$totalFilas?> </td>
                <td colspan="7"> 
                  <ul class="pagination">
                      <li><i class="material-icons">chevron_left</i></li>
                  <?php
                  if($totalPaginas>=1){
                    for ($i = 1; $i <= $totalPaginas; $i++){
                      if ($pagina == $i){
                        //si muestro el índice de la página actual, deshabilito el boton
                        echo "<li class='disabled waves-effect blue active textoArriba'><a href='#'> ".$pagina." </a></li>"; 
                      } else {
                        //si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa página
                        echo "<li class='waves-effect textoArriba'><a href='ejer05GestesimalConVenta.php?pagina=".$i."'> ".$i." </a></li>";
                      }
                    }
                  }
                  ?>
                    <li><i class="material-icons">chevron_right</i></li>
                  </ul>
                </td>
              </tr>
            </tbody>
          </table>
          <a href="index.html" class="btn waves-effect waves-light blue">Volver
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
