<!DOCTYPE html>
<!--
Capitulo 2 Formularios

Ejercicio 1
Realiza un programa que pida dos números y luego muestre el resultado de su multiplicación.
Ejercicio 2
Realiza un conversor de euros a pesetas. Ahora la cantidad en euros que se quiere convertir se
deberá introducir por teclado.
Ejercicio 3
Realiza un conversor de pesetas a euros. La cantidad en pesetas que se quiere convertir se deberá
introducir por teclado.
Ejercicio 4
Escribe un programa que sume, reste, multiplique y divida dos números introducidos por teclado.
Ejercicio 5
Escribe un programa que calcule el área de un rectángulo.
Ejercicio 6
Escribe un programa que calcule el área de un triángulo.
Ejercicio 7
Escribe un programa que calcule el total de una factura a partir de la base imponible.
Ejercicio 8
Escribe un programa que calcule el salario semanal de un trabajador en base a las horas trabajadas.
Se pagarán 12 euros por hora.
Ejercicio 9
Escribe un programa que calcule el volumen de un cono mediante la fórmula V = 1/3 πr 2 h.
Ejercicio 10
Realiza un conversor de Mb a Kb.
Ejercicio 11
Realiza un conversor de Kb a Mb.

@author: Jesús Caballero Corpas
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicios Capitulo 2</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <div id="contenedor">
      <h1>Ejercicios PHP Capitulo 2</h1>
      <div align="center">
        <h2>Ejercicio 1</h2>
        <h3>Introduce dos números para que se multipliquen</h3>
        <form action="ejer01Multiplica.php" method="get">
          <input type="number" name="factor1">
          <input type="number" name="factor2">
          <input type="submit" value="Multiplicar">
        </form>
      </div>

      <div align="center">
        <h2>Ejercicio 2</h2>
        <h3>Conversor de €uros a Pesetas</h3>
        <form action="ejer02EuroPeseta.php" method="get">
          <input type="number" min="0" step="0.01" name="euro">
          <input type="submit" value="Convertir a Pesetas">
        </form>
      </div>

      <div align="center">
        <h2>Ejercicio 3</h2>
        <h3>Conversor de Pesetas a €uros</h3>
        <form action="ejer03PesetaEuro.php" method="get">
          <input type="number" name="peseta">
          <input type="submit" value="Convertir a €uros">
        </form>
      </div>

      <div align="center">
        <h2>Ejercicio 4</h2>
        <h3>Introduce dos numeros para que se Sumen, Resten, Multipliquen y Dividan</h3>
        <form action="ejer04Operaciones.php" method="get">
          <input type="number" name="factor1">
          <input type="number" name="factor2">
          <input type="submit" value="Realizar Operaciones">
        </form>
      </div>

      <div align="center">
        <h2>Ejercicio 5</h2>
        <h3>Calcular área de un Rectángulo</h3>
        <form action="ejer05BaseRectangulo.php" method="get">
          Base: <input type="number" name="base">
          Altura: <input type="number" name="altura">
          <input type="submit" value="Calcular Área">
        </form>
      </div>

      <div align="center">
        <h2>Ejercicio 6</h2>
        <h3>Calcular área de un Triangulo</h3>
        <form action="ejer06BaseTriangulo.php" method="get">
          Base: <input type="number" name="base">
          Altura: <input type="number" name="altura">
          <input type="submit" value="Calcular Área">
        </form>
      </div>

      <div align="center">
        <h2>Ejercicio 7</h2>
        <h3>Calcular Total de una Factura</h3>
        <form action="ejer07BaseImponible.php" method="get">
          Base Imponible: <input type="number" name="base">
          <input type="submit" value="Calcular Total Factura">
        </form>
      </div>

      <div align="center">
        <h2>Ejercicio 8</h2>
        <h3>Calcular Salario Semanal</h3>
        <form action="ejer08SalarioSemanal.php" method="get">
          Horas Trabajadas: <input type="number" name="horas">
          <input type="submit" value="Calcular Salario Semanal">
        </form>
      </div>

      <div align="center">
        <h2>Ejercicio 9</h2>
        <h3>Calcular Volumen de un Cono</h3>
        <form action="ejer09VolumenCono.php" method="get">
          Radio: <input type="number" min="0" name="radio">
          Altura: <input type="number" name="altura">
          <input type="submit" value="Calcular Volumen">
        </form>
      </div>

      <div align="center">
        <h2>Ejercicio 10</h2>
        <h3>Conversor de Mb a Kb</h3>
        <form action="ejer10MbKb.php" method="get">
          <input type="number" name="mb">
          <input type="submit" value="Convertir a Kb">
        </form>
      </div>

      <div align="center">
        <h2>Ejercicio 11</h2>
        <h3>Conversor de Kb a Mb</h3>
        <form action="ejer11KbMb.php" method="get">
          <input type="number" name="kb">
          <input type="submit" value="Convertir a Mb">
        </form>
      </div>
      <p></p>
    </div>
    <?php
      
    ?>
  </body>
</html>
