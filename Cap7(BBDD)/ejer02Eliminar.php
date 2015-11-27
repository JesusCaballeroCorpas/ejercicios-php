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
           //Se ejecuta la consulta
           $consulta = $conexion->query("SELECT dni, nombre, direccion, telefono FROM cliente WHERE dni = '$dni'");
          ?>
          
          </form>
          <table>
            <thead>
              <tr>
                <th>DNI</th>  
                <th>Nombre</th>  
                <th>Dirección</th>  
                <th>Teléfono</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              //Muestro el registro de la tabla cliente que quiero eliminar
              $registro = $consulta->fetchObject();
              ?>
              <tr>
                <td><?= $registro->dni ?></td>
                <td><?= $registro->nombre ?></td>
                <td><?= $registro->direccion ?></td>
                <td><?= $registro->telefono ?></td>
              </tr>
            </tbody>
          </table>
          <h5>¿Esta seguro que desea borrar a este cliente?</h5>
          <form action="ejer02ClientesPDOMejorado.php" method="post">
            <input type="hidden" name="dni" value="<?= $dni ?>">
            <button class="btn waves-effect waves-light green" type="submit" name="action" value="borrar">SI
              <i class="material-icons right">delete</i>
            </button>
            <a href="ejer02ClientesPDOMejorado.php" class="btn waves-effect waves-light red">NO
              <i class="material-icons right">cancel</i>
            </a>
          </form>
          <br>
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
