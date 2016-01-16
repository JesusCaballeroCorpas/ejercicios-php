<?php
  require_once '../Model/Articulo.php';
    //echo date("Y-m-d H:i:s");
  $articuloAux = new Articulo("", $_POST['titulo'], $_POST['contenido'], "");
  if(isset($_POST['id'])){
    // modifica el articulo en la base de datos.
    //$articuloAux = new Articulo($_POST['id'], $_POST['titulo'], $_POST['contenido'], date("Y-m-d H:i:s"));
    $articuloAux->setId($_POST['id']);
    $articuloAux->setTitulo($_POST['titulo']);
    $articuloAux->setContenido($_POST['contenido']);
    $articuloAux->setFecha(date("Y-m-d H:i:s"));
    $articuloAux->update();
  } else {
    // inserta el articulo en la base de datos
    //$articuloAux = new Articulo("", $_POST['titulo'], $_POST['contenido'], "");
    $articuloAux->insert();
  }
  header("Location: index.php");