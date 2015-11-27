<section class="card-panel light-blue">
  <h5 class="center-align white-text">CARRITO</h5>
  <article class="card-panel black-text text-darken-2 grey lighten-3">
    <div>
      <table class="highlight">
        <thead>
          <tr> 
            <th>Descripción</th> 
            <th>Cantidad</th>
            <th>Total</th>
            <th>Controles</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if($_POST['action'] == "addCarrito") {
            //Se tiene que comprobar si existen articulos en el almacen.
            $consulta = $conexion->query("SELECT * FROM articulo WHERE codigo = '$codigo'");
            $registro = $consulta->fetchObject();
            if($registro->stock > $carrito[$codigo]){
              $carrito[$codigo]++;
            } else {
              echo "<p class='red-text'>No quedan más unidades en stock de: $registro->descripcion</p>";
            }
          }
          if($_POST['action'] == "del1Carrito") {
            if($carrito[$codigo] != 1){
              $carrito[$codigo]--;
            } else {
              unset($carrito[$codigo]);
            }
          }
          if($_POST['action'] == "delCarrito"){
            unset($carrito[$codigo]);
          }
          foreach ($carrito as $cod => $valor) {
            if($carrito[$cod] > 0){
              $consulta = $conexion->query("SELECT * FROM articulo WHERE codigo = '$cod'");
              $registro = $consulta->fetchObject();
              $total += ($valor * $registro->precio_venta);
          ?>   
            <tr>
              <td><?= $registro->descripcion ?></td>
              <td><?= $valor ?> Unds</td>
              <td><?= number_format($valor * $registro->precio_venta,2) ?> €</td>
              <td style="width:260px">
                <form action="#" method="post">
                  <input type="hidden" name="codigo" value="<?= $cod ?>">
                  <button class="btn waves-effect waves-light red" title="Quitar del carrito" type="submit" name="action" value="delCarrito">
                    <i class="material-icons">delete</i>
                  </button>
                  <button class="btn waves-effect waves-light green" title="Añadir 1 más al carrito" type="submit" name="action" value="addCarrito">
                    <i class="material-icons">add</i>
                  </button>
                  <button class="btn waves-effect waves-light pink" title="Quitar 1 del carrito" type="submit" name="action" value="del1Carrito">
                    <i class="material-icons">remove</i>
                  </button>
                </form>
              </td>
            </tr>  
          <?php
            }
          }
          ?>
          <tr>
            <td></td>
            <td><strong>TOTAL:</strong></td>
            <td><strong><?= number_format($total,2) ?>€</strong></td>
            <td></td>
          </tr>
          <tr>
            <td colspan="3"></td>
            <td>
              <a href="ejer05_1Factura.php" class="btn waves-effect waves-light orange" title="Comprar">
                <i class="material-icons">shopping_cart</i>
              </a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </article>

</section>