<!DOCTYPE html>
<!--
Capitulo 3 If y Switch

Ejercicio 2
Realiza un programa que pida una hora por teclado y que muestre luego buenos días, buenas
tardes o buenas noches según la hora. Se utilizarán los tramos de 6 a 12, de 13 a 20 y de 21 a 5.
respectivamente. Sólo se tienen en cuenta las horas, los minutos no se deben introducir por teclado.

@author: Jesús Caballero Corpas
-->
<html>
  <head>
    <title>Ejercicio 2 Horas</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <h1>Ejercicios PHP Capitulo 3. If y Switch</h1>
      <div align="center">
        <h2>Ejercicio 2</h2>
        <?php
          $hora = $_GET['hora'];
          $mensaje = ($hora >= 6 && $hora <=12) ? 'Buenos Días' : 
                  (($hora >= 13 && $hora <=20) ? 'Buenas Tardes' : 'Buenas Noches');
          echo $mensaje;
        ?>
        <br><br>
        <form action="index.html" method="get">
          <input type="submit" value="Volver">
        </form>
      </div>
  </body>
</html>
