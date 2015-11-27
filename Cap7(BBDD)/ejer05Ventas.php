<?php
  session_start(); // Inicio de sesión
  //Creo las variables globales de sesion y las recibidas por POST
  $carrito =& $_SESSION['carrito'];
  //Se crea la conexión a la BBDD
  try{
    $conexion = new PDO("mysql:host=localhost;dbname=gestesimal;charset=utf8", "root", "root");
  } catch (PDOException $e) {
    echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
    die ("Error: " . $e->getMessage());
  }
  //Si se ha producido una venta entro aquí
  if($_POST['action'] == "venta"){
    //Calculo la fecha y hora actual
    //$fecVen = date("Y-m-d H:i:s");
    
    //Se calcula el codigo de venta.
    $consulta = $conexion->query("SELECT * FROM venta");
    $totalVentas = $consulta->rowCount();
    if($totalVentas < 10){ $codVen = "CODVEN00" . ($totalVentas + 1); } 
    elseif ($totalVentas < 100) { $codVen = "CODVEN0" . ($totalVentas + 1); }
    else { $codVen = "CODVEN" . ($totalVentas + 1); }
    $conexion->query("INSERT INTO venta (CodVen) VALUES ('$codVen')");
    
    //Se inserta la factura en la BBDD y se reduce el stock de los articulos vendidos
    foreach ($carrito as $codArt => $canArt) {
      $consulta = $conexion->query("SELECT * FROM articulo WHERE CodArt = '$codArt'");
      $registro = $consulta->fetchObject();
      $preArt = $registro->PreVen;
      $stoArt = $registro->StoArt - $canArt;
      $conexion->query("INSERT INTO factura (CodVen,CodArt,CanArt,PreArt) VALUES ('$codVen','$codArt','$canArt','$preArt')");
      $conexion->query("UPDATE articulo SET StoArt = '$stoArt' WHERE CodArt = '$codArt'");
    }
    
    //Se vacia el carrito
    foreach ($carrito as $codArt => $canArt) {
      unset($carrito[$codArt]);
    }
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
  $consulta = $conexion->query("SELECT CodVen, FecVen FROM venta ORDER BY FecVen desc LIMIT $inicioPag, $tamPag");
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
        <h5 class="center-align white-text">VENTAS</h5>
      <article class="card-panel black-text text-darken-2 grey lighten-3">
        <div>
          <table class="highlight">
            <thead>
              <tr>
                <th>Código</th>  
                <th>Fecha de Venta</th>
                <th>Controles</th>
              </tr>
            </thead>
            <tbody>
              <?php
                //Muestro los registros de la tabla ventas
                while ($registro = $consulta->fetchObject()){
                //Aumento el contador de filas en la página actual.
                $contRegPagActual++;
              ?>   
                <tr>
                  <td><?= $registro->CodVen ?></td>
                  <td><?= $registro->FecVen ?></td>
                  <td>
                    <form action="ejer05Factura.php" method="post">
                      <input type="hidden" name="codVen" value="<?= $registro->CodVen ?>">
                      <button class="btn waves-effect waves-light blue" title="Ver Factura" type="submit" name="action" value="factura">
                        <i class="material-icons">list</i>
                      </button>
                    </form>
                  </td>
                </tr>  
              <?php
                }
              ?>
              <!-- Principio Fila Páginado -->
              </tr>
              <?php
              $consulta1 = $conexion->query("SELECT * FROM venta");
              $totalFilas = $consulta1->rowCount();
              $totalPaginas = floor(($totalFilas -1) / $tamPag) + 1;
              
              ?>
              <tr>
                <td colspan="1">
                    <strong>Ventas Mostradas: </strong><?=$contRegPagActual?><br>  
                    <strong>Total Ventas: </strong><?=$totalFilas?> </td>
                <td colspan="2"> 
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
                        echo "<li class='waves-effect textoArriba'><a href='ejer05Ventas.php?pagina=".$i."'> ".$i." </a></li>";
                      }
                    }
                  }
                  ?>
                    <li><i class="material-icons">chevron_right</i></li>
                  </ul>
                </td>
              </tr>
              <!-- Final Fila Páginado -->
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
