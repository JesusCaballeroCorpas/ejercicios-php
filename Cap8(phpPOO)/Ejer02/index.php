<!DOCTYPE html>
<!--
Ejercicio 2

Crea las clases Animal , Mamifero , Ave , Gato , Perro , Canario , Pinguino y Lagarto . Crea, al menos,
tres métodos específicos de cada clase y redefine el/los método/s cuando sea necesario. Prueba las
clases en un programa en el que se instancien objetos y se les apliquen métodos. Puedes aprovechar
las capacidades que proporciona HTML y CSS para incluir imágenes, sonidos, animaciones, etc.
para representar acciones de objetos; por ejemplo, si el canario canta, el perro ladra, o el ave vuela.

 @author: Jesús Caballero Corpas
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Animales</title>
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body>
        <header>
            <h1>Animales</h1>
        </header>
        <section>
          <?php
          //Includes
          include_once 'Perro.php';
          include_once 'Canario.php';
          include_once 'Pinguino.php';
          include_once 'Lagarto.php';
          
          //Creación de animales
          $pluto = new Perro("Pluto", "Macho", "Naranja", "Pichon Maltes");
          $lasie = new Perro("Lasie", "Hembra", "Marrón", "Pastor Alemán");
          $piolin = new Canario("Piolín", "Macho", "Amarillo", "Pecho Blanco", "Espeso");
          $piolina = new Canario("Piolína", "Hembra", "Blanco", "Pecho Naranja", "Ligero");
          $happyFeat = new Pinguino("Happy Feat", "Macho", "Negro", "Emperador", "Ligero");
          $guancho = new Lagarto("Guancho", "Macho", "Verde", "Feo", "Grande");
          
          //Impresión de animales
          echo "<hr>$pluto<br>";
          echo "<br>" . $pluto->ladra();
          echo "<br>" . $pluto->corre();
          echo "<br>" . $pluto->lava();
          echo "<br>" . $pluto->vuela();
          echo "<br>" . $pluto->pare();
          echo "<br>" . $pluto->mama();
          
          echo "<hr>$lasie<br>";
          echo "<br>" . $lasie->pare();
          
          echo "<hr>$piolin<br>";
          echo "<br>" . $piolin->come();
          echo "<br>" . $piolin->corre();
          echo "<br>" . $piolin->lava();
          echo "<br>" . $piolin->vuela();
          echo "<br>" . $piolin->canta();
          echo "<br>" . $piolin->pia();
          echo "<br>" . $piolin->ovoposita();
          
          echo "<hr>$piolina<br>";
          echo "<br>" . $piolina->ovoposita();
          
          echo "<hr>$happyFeat<br>";
          echo "<br>" . $happyFeat->pia();
          echo "<br>" . $happyFeat->grazna();
          echo "<br>" . $happyFeat->desliza();
          
          echo "<hr>$guancho<br>";
          echo "<br>" . $guancho->come();
          echo "<br>" . $guancho->sacaLengua();
          echo "<br>" . $guancho->vuela();
          
          echo "<hr><br><h2>Número total de animales: " . Animal::getNumAnimales() . "</h2>"
          ?>
        </section>
    </body>
</html>