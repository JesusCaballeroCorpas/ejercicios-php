<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Blog de Jesús</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css" />
    <script src="js/bootstrap.min.js"></script>
  </head>
  <body class="panel text-center">
  <h1>Blog de Jesús</h1>
  <hr>
  <a href="../Controller/nuevoArticulo.php">Nueva entrada</a>
  <?php
    foreach($data['articulos'] as $articulo)  {
    ?>
    <div class="panel-body">
        <h3><?=$articulo->getTitulo()?></h3>
        <span><?=date_format(date_create($articulo->getFecha()), 'd-m-Y H:i:s')?></span>
        <p><?=$articulo->getContenido()?><p><br>
        <a href="../Controller/modificaArticulo.php?id=<?=$articulo->getId()?>">Modificar</a>
        <a href="../Controller/borraArticulo.php?id=<?=$articulo->getId()?>">Borrar</a>
    </div>
    <?php
    }
  ?>
  </body>
</html>
