<!DOCTYPE html>
<!--
Capitulo 7 Acceso a Bases de Datos

Ejercicio 2
Modifica el programa anterior añadiendo las siguientes mejoras:
• El listado debe aparecer paginado en caso de que haya muchos clientes.
• Al hacer un alta, se debe comprobar que no exista ningún cliente con el DNI introducido en
el formulario.
• La opción de borrado debe pedir confirmación.
• Cuando se realice la modificación de los datos de un cliente, los campos que no se han
cambiado deberán permanecer inalterados en la base de datos.

@author: Jesús Caballero Corpas
-->
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
  
  <body class="container light-blue lighten-4">
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <header class="center-align">
      <h2>Ejercicios PHP Capitulo 7. Acceso a Base de Datos</h2>
    </header>
    <section class="card-panel light-blue lighten-2">
      
      <article class="card-panel black-text text-darken-2 light-blue lighten-3">
        <h5>Ejercicio 2 CRUD Banco con PDO Mejorado</h5>
        <div>  
          <?php
          //Se crea la conexión a la BBDD
            try{
              $conexion = new PDO("mysql:host=localhost;dbname=banco;charset=utf8", "root", "root");
            } catch (PDOException $e) {
              echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
              die ("Error: " . $e->getMessage());
            }
            
           //Se reciben los datos de los formularios
           $dni = $_POST['dni'];
           $nombre = $_POST['nombre'];
           $direccion = $_POST['direccion'];
           $telefono = $_POST['telefono'];
           //Se ejecuta el insert si se da de alta
           if($_POST['action'] == "alta"){
             $consulta = $conexion->query("SELECT * FROM cliente WHERE dni = '$dni'");
             if($consulta->rowCount() == 0){
               $conexion->query("INSERT INTO cliente VALUES ('$dni','$nombre','$direccion','$telefono')");
             } else {
               echo "<p class='red-text'>ERROR al introducir el cliente, el dni: $dni ya existe en la base de datos.</p>";
             }
             
           }
           //Se ejecuta el delete si se quiere borrar
           if($_POST['action'] == "borrar"){
             $conexion->query("DELETE FROM cliente WHERE dni = '$dni'");
           }
           //Se ejecuta el update si se quiere modificar
           if($_POST['action'] == "modificar"){
             $conexion->query("UPDATE cliente SET dni = '$dni', nombre = '$nombre', direccion = '$direccion', telefono = '$telefono' WHERE dni = '$dni'");
           }
           //Se ejecuta la consulta
           $tamPag = 5;
           $inicioPag = 0;
           $contRegPagActual = 0;
           $pagina = $_GET['pagina'];
           if(isset($pagina)){
             $inicioPag = ($pagina - 1) * $tamPag;
           } else {
             $pagina=1;
           }
           $consulta = $conexion->query("SELECT dni, nombre, direccion, telefono FROM cliente ORDER BY nombre LIMIT $inicioPag, $tamPag");
          ?>
          <table class="highlight">
            <thead>
              <tr>
                <th>DNI</th>  
                <th>Nombre</th>  
                <th>Dirección</th>  
                <th>Teléfono</th>
                <th colspan="2">Controles</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if($_POST['action'] == "cargaMod") {
              ?>
                <form action="#" method="post">
                  <tr>
                      <td><input tipe="text" name="dni" value="<?=$dni?>"></td>
                      <td><input tipe="text" name="nombre" value="<?=$nombre?>"></td>
                      <td><input tipe="text" name="direccion" value="<?=$direccion?>"></td>
                      <td><input tipe="text" name="telefono" value="<?=$telefono?>"></td>
                      <td colspan="2">
                        <button class="btn waves-effect waves-light blue" type="submit" name="action" value="modificar">
                          <i class="material-icons">edit</i>
                        </button>
                      </td>
                  </tr>
                </form>
              <?php
              } else {
              ?>
                <form action="#" method="post">
                  <tr>
                      <td><input tipe="text" name="dni"></td>
                      <td><input tipe="text" name="nombre"></td>
                      <td><input tipe="text" name="direccion"></td>
                      <td><input tipe="text" name="telefono"></td>
                      <td colspan="2">
                        <button class="btn waves-effect waves-light green" type="submit" name="action" value="alta">
                          <i class="material-icons">add</i>
                        </button>
                      </td>
                  </tr>
                </form>
              <?php 
              }
              //Muestro todos los registros de la tabla cliente
              while ($registro = $consulta->fetchObject()){
                $contRegPagActual++;
              ?>
              <tr>
                <td><?= $registro->dni ?></td>
                <td><?= $registro->nombre ?></td>
                <td><?= $registro->direccion ?></td>
                <td><?= $registro->telefono ?></td>
                <td>
                  <form action="#" method="post">
                    <input type="hidden" name="dni" value="<?= $registro->dni ?>">
                    <input type="hidden" name="nombre" value="<?= $registro->nombre ?>">
                    <input type="hidden" name="direccion" value="<?= $registro->direccion ?>">
                    <input type="hidden" name="telefono" value="<?= $registro->telefono ?>">
                    <button class="btn waves-effect waves-light blue" type="submit" name="action" value="cargaMod">
                      <i class="material-icons">edit</i>
                    </button> 
                  </form>
                </td>
                <td>
                  <form action="ejer02Eliminar.php" method="post">
                    <input type="hidden" name="dni" value="<?= $registro->dni ?>">
                    <button class="btn waves-effect waves-light red" type="submit" name="action" value="borrar">
                      <i class="material-icons">delete</i>
                    </button> 
                  </form>
                </td>
              </tr>
              <?php
              }
              $consulta1 = $conexion->query("SELECT * FROM cliente");
              $totalFilas = $consulta1->rowCount();
              $totalPaginas = ($totalFilas / $tamPag) + 1;
              ?>
              <tr>
                <td><strong>Clientes Mostrados: </strong><?=$contRegPagActual?></td>  
                <td><strong>Total Registros: </strong><?=$totalFilas?> </td>
                <td colspan="4"> 
                  <ul class="pagination">
                      <li><i class="material-icons">chevron_left</i></li>
                  <?php
                  if($totalPaginas>=1){
                    for ($i = 1; $i <= $totalPaginas; $i++){
                      if ($pagina == $i){
                        //si muestro el índice de la página actual, desabilito el boton
                        echo "<li class='disabled waves-effect blue active textoArriba'><a href='#'> ".$pagina." </a></li>"; 
                      } else {
                        //si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa página
                        echo "<li class='waves-effect textoArriba'><a href='ejer02ClientesPDOMejorado.php?pagina=".$i."'> ".$i." </a></li>"; 
                      }
                    }
                  }
                  ?>
                    <li><i class="material-icons">chevron_right</i></li>
                  </ul>
                    <!--<ul class="pagination">
                      <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                      <li class="active"><a href="#!">1</a></li>
                      <li class="waves-effect"><a href="#!">2</a></li>
                      <li class="waves-effect"><a href="#!">3</a></li>
                      <li class="waves-effect"><a href="#!">4</a></li>
                      <li class="waves-effect"><a href="#!">5</a></li>
                      <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                  </ul>-->
                </td>
              </tr>
            </tbody>
          </table>
            <?php
            
            ?>
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
