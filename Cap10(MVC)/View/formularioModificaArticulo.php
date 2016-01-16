<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <form action="../Controller/grabaArticulo.php" method="post">
      <h3>Título</h3>
      <input type="text" size="60" name="titulo" value="<?= $articuloAux->getTitulo() ?>">
      <br><h3>Contenido</h3>
      <textarea name="contenido" cols="60" rows="6"> <?= $articuloAux->getContenido() ?>
      </textarea><hr>
      <input type="hidden" name="id" value="<?= $articuloAux->getId() ?>">
      <input type="submit" value="Aceptar">
    </form>
  </body>
</html>
<!--Me quedao aquí, tengo que enviar a grabar articulo con el id oculto.... -->