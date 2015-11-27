<!DOCTYPE html>
<!--
Capitulo 5 Arrays

Ejercicio 1
Crea una aplicación web que permita hacer listado, alta, baja y modificación sobre la tabla cliente
de la base de datos banco .
• Para realizar el listado bastará un SELECT, tal y como se ha visto en los ejemplos.
• El alta se realizará mediante un formulario donde se especificarán todos los campos del nuevo
registro. Luego esos datos se enviarán a una página que ejecutará INSERT .
• Para realizar una baja, se pedirá el DNI del cliente mediante un formulario y a continuación
se ejecutará DELETE para borrar el registro cuyo DNI coincida con el introducido.
• La modificación se realiza mediante UPDATE . Se pedirá previamente en un formulario el DNI
del cliente para el que queremos modificar los datos.

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
        <h5>Ejercicio 1 CRUD Banco con MySQLi</h5>
        <div>  
          <?php
          //Se crea la conexión a la BBDD
            $conexion = new mysqli("localhost", "root", "root");
            $conexion->select_db("banco");
            $conexion->set_charset('utf8');
            if ($conexion->connect_errno > 0) {
              echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
              die ("Error: " . $conexion->connect_error);
            }
            
           //Se reciben los datos de los formularios
           $dni = $_POST['dni'];
           $nombre = $_POST['nombre'];
           $direccion = $_POST['direccion'];
           $telefono = $_POST['telefono'];
           //Se ejecuta el insert si se da de alta
           if($_POST['action'] == "alta"){
             $conexion->query("INSERT INTO cliente VALUES ('$dni','$nombre','$direccion','$telefono')");
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
           $consulta = $conexion->query("SELECT dni, nombre, direccion, telefono FROM cliente");
          ?>
          <table>
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
              while ($registro = $consulta->fetch_object()){
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
                  <form action="#" method="post">
                    <input type="hidden" name="dni" value="<?= $registro->dni ?>">
                    <button class="btn waves-effect waves-light red" type="submit" name="action" value="borrar">
                      <i class="material-icons">delete</i>
                    </button> 
                  </form>
                </td>
              </tr>
              <?php
              }
              ?>
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
