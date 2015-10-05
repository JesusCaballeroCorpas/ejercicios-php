<!DOCTYPE html>
<!--
Capitulo 4 Bucles

Ejercicio 28
Escribe un programa que calcule el factorial de un número entero leído por teclado.

@author: Jesús Caballero Corpas
-->
<html>
  <head>
    <title>Ejercicio 28 Factorial de un Número</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <h1>Ejercicios PHP Capitulo 4 Bucles</h1>
      <div align="center">
        <h2>Ejercicio 28 Factorial de un Número</h2>
        <!--
        System.out.println("FACTORIAL DE UN NÚMERO ENTERO\n");
        System.out.print("Por favor introduzca un número entero positivo para calcular su factorial: ");
        int iNumero = Integer.parseInt(System.console().readLine());
        int iFactorial = 1;
        while(iNumero < 0){
          System.out.println("\nEl número introducido es negativo.");
          System.out.print("Por favor introduzca un número entero positivo para calcular su factorial: ");
          iNumero = Integer.parseInt(System.console().readLine());
        }
        for(int i = 1;i <= iNumero;i++){
          iFactorial *= i;
        }
        System.out.println("El factorial de " + iNumero +" es: " + iFactorial);
        -->
        <?php
          $factorial = 1;
          $numeroIntroducido = $_REQUEST['numero'];
          for($i = 1;$i <= $numeroIntroducido;$i++) {
            $factorial *= $i;
          }
          echo "El factorial de " , $numeroIntroducido , " es: " , $factorial;
        ?>
        
        <br><br>
        <form action="index.html" method="post">
          <input type="submit" value="Volver">
        </form>
      </div>
  </body>
</html>
