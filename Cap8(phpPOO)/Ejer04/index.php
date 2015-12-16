<!DOCTYPE html>
<!--
Ejercicio 4
Crea la clase Vehiculo , así como las clases Bicicleta y Coche como subclases de la primera. Para la
clase Vehiculo , crea los métodos de clase getVehiculosCreados() y getKmTotales() ; así como el
método de instancia getKmRecorridos() . Crea también algún método específico para cada una de
las subclases. Prueba las clases creadas mediante una aplicación que realice, al menos, las siguientes
acciones:
• Anda con la bicicleta
• Haz el caballito con la bicicleta
• Anda con el coche
• Quema rueda con el coche
• Ver kilometraje de la bicicleta
• Ver kilometraje del coche
• Ver kilometraje total

@author: Jesús Caballero Corpas
-->
<html>
  <head>
    <title>Capitulo 8 PHP POO - Ejercicio 4</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <div>
      <?php
        include_once 'Coche.php';
        include_once 'Bicicleta.php';
        $coche1 = new Coche("Peugeot","206","10");
        echo "El " . $coche1->getMarca() . " " . $coche1->getModelo() . " " . $coche1->anda(20) ."<hr>";
        echo $coche1->quemaRueda() ."<hr>";
        echo $coche1->kilometros() ."<hr>";
        echo $coche1 . "<hr>";
        $bici1 = new Bicileta("Carreras","5");
        echo "La bicicleta " . $bici1->getModelo() . " " . $bici1->anda(20) . "<hr>";
        echo $bici1->caballito() . "<hr>";
        echo $bici1->kilometros() . "<hr>";
        echo $bici1 . "<hr>";
        echo "Vehiculos totales creados: " . Vehiculo::getVehiculosCreados() . "<hr>";
        echo "Kilometros totales recorridos: " . Vehiculo::getKmTotales() . "<hr>";
      ?>
    </div>
  </body>
</html>
