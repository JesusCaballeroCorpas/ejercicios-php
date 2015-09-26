<!DOCTYPE html>
<!--
Capitulo 3 If y Switch

Ejercicio 10
Escribe un programa que nos diga el horóscopo a partir del día y el mes de nacimiento.

@author: Jesús Caballero Corpas
-->
<html>
  <head>
    <title>Ejercicio 10 Horoscopo</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <h1>Ejercicios PHP Capitulo 3. If y Switch</h1>
      <div align="center">
        <h2>Ejercicio 10 Horoscopo</h2>
        <?php
          $dia = $_GET['dia'];
          $mes = $_GET['mes'];
          
          switch ($mes) {
            case "enero":
              if ($dia <= 20) {
                echo "Su signo del zodiaco es Capricornio <br><br>";
                echo "<img src='images/capricornio.png' />";
              } else {
                  echo "Su signo del zodiaco es Acuario <br><br>";
                  echo "<img src='images/acuario.png' />";
                }
              break;
            case "febrero":
              if ($dia <= 18) {
                echo "Su signo del zodiaco es Acuario <br><br>";
                echo "<img src='images/acuario.png' />";
              } else if ($dia <= 29){
                  echo "Su signo del zodiaco es Piscis <br><br>";
                  echo "<img src='images/piscis.png' />";
                } else {
                    echo "Febrero solo tiene 29 dias";
                  }
              break;
            case "marzo":
              if ($dia <= 20) {
                echo "Su signo del zodiaco es Piscis <br><br>";
                echo "<img src='images/piscis.png' />";
              } else {
                  echo "Su signo del zodiaco es Aries <br><br>";
                  echo "<img src='images/aries.png' />";
                }
              break;
            case "abril":
              if ($dia <= 20) {
                echo "Su signo del zodiaco es Aries <br><br>";
                echo "<img src='images/aries.png' />";
              } else if (dia <= 30){
                  echo "Su signo del zodiaco es Tauro <br><br>";
                  echo "<img src='images/tauro.png' />";
                } else {
                    echo "Abril solo tiene 30 dias";
                  }
              break;
            case "mayo":
              if ($dia <= 20) {
                echo "Su signo del zodiaco es Tauro <br><br>";
                echo "<img src='images/tauro.png' />";
              } else {
                  echo "Su signo del zodiaco es Geminis <br><br>";
                  echo "<img src='images/geminis.png' />";
                }
              break;
            case "junio":
              if ($dia <= 20) {
                echo "Su signo del zodiaco es Geminis <br><br>";
                echo "<img src='images/geminis.png' />";
              } else if ($dia <=30) {
                  echo "Su signo del zodiaco es Cancer <br><br>";
                  echo "<img src='images/cancer.png' />";
                } else {
                    echo "Junio solo tiene 30 dias";
                  }
              break;
            case "julio":
              if ($dia <= 20) {
                echo "Su signo del zodiaco es Cancer <br><br>";
                echo "<img src='images/cancer.png' />";
              } else {
                  echo "Su signo del zodiaco es Leo <br><br>";
                  echo "<img src='images/leo.png' />";
                }
              break;
            case "agosto":
              if ($dia <= 21) {
                echo "Su signo del zodiaco es Leo <br><br>";
                echo "<img src='images/leo.png' />";
              } else {
                  echo "Su signo del zodiaco es Virgo <br><br>";
                  echo "<img src='images/virgo.png' />";
                }
              break;
            case "septiembre":
              if ($dia <= 22) {
                echo "Su signo del zodiaco es Virgo <br><br>";
                echo "<img src='images/virgo.png' />";
              } else if ($dia <=30) {
                  echo "Su signo del zodiaco es Libra <br><br>";
                  echo "<img src='images/libra.png' />";
                } else {
                    echo "Septiembre solo tiene 30 dias";
                  }
              break;
            case "octubre":
              if ($dia <= 22) {
                echo "Su signo del zodiaco es Libra <br><br>";
                echo "<img src='images/libra.png' />";
              } else {
                  echo "Su signo del zodiaco es Escorpio <br><br>";
                  echo "<img src='images/escorpio.png' />";
                }
              break;
            case "noviembre":
              if ($dia <= 22) {
                echo "Su signo del zodiaco es Escorpio <br><br>";
                echo "<img src='images/escorpio.png' />";
              } else if ($dia <=30) {
                  echo "Su signo del zodiaco es Sagitario <br><br>";
                  echo "<img src='images/sagitario.png' />";
                } else {
                    echo "Noviembre solo tiene 30 dias";
                  }
              break;
            case "diciembre":
              if ($dia <= 20) {
                echo "Su signo del zodiaco es Sagitario <br><br>";
                echo "<img src='images/sagitario.png' />";
              } else {
                  echo "Su signo del zodiaco es Capricornio <br><br>";
                  echo "<img src='images/capricornio.png' />";
                }
              break;
            default:
              echo "Lo siento no ha elegido una fecha correcta.";
          }
        
        ?>
        <br><br>
        <form action="index.html" method="get">
          <input type="submit" value="Volver">
        </form>
      </div>
  </body>
</html>
