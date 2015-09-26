<!DOCTYPE html>
<!--
Capitulo 3 If y Switch

Ejercicio 12
Realiza un minicuestionario con 10 preguntas tipo test sobre las asignaturas que se imparten en
el curso. Cada pregunta acertada sumará un punto. El programa mostrará al final la calificación
obtenida. Pásale el minicuestionario a tus compañeros y pídeles que lo hagan para ver qué tal andan
de conocimientos en las diferentes asignaturas del curso.

@author: Jesús Caballero Corpas
-->
<html>
  <head>
    <title>Ejercicio 12 Cuestionario</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <h1>Ejercicios PHP Capitulo 3. If y Switch</h1>
      <div align="center">
        <h2>Ejercicio 12 Cuestionario</h2>
        <?php
          $respuesta1 = $_GET['uno'];
          $respuesta2 = $_GET['dos'];
          $respuesta3 = $_GET['tres'];
          $respuesta4 = $_GET['cuatro'];
          $respuesta5 = $_GET['cinco'];
          $respuesta6 = $_GET['seis'];
          $respuesta7 = $_GET['siete'];
          $respuesta8 = $_GET['ocho'];
          $respuesta9 = $_GET['nueve'];
          $respuesta10 = $_GET['diez'];
          $aciertos = 0;
        ?>
        <div>
          <table>
            <tr>
              <th>
                1. ¿Que lenguaje de programación estamos usando ahora mismo en la asignatura de 
                Programación?
              </th>
            </tr>
            <tr>
              <td><img src="images/bien.png" width=16 />PHP</td>
                <?php if($respuesta1 == "a"){$aciertos++;} ?>
              </td>
            </tr>
            <tr>
              <td><?php if($respuesta1 == "b"){
                 echo "<img src=images/mal.png width=16px />";
                }
              ?>ASP</td>
            </tr>
            <tr>
              <td><?php if($respuesta1 == "c"){
                 echo "<img src=images/mal.png width=16px />";
                }
              ?>JSP</td>
            </tr>
          </table>
        </div>
        
        <div>
          <table>
            <tr>
              <th>
                2. ¿Cual de los siguientes es un lenguaje de marcas?
              </th>
            </tr>
            <tr>
              <td><?php if($respuesta2 == "a"){$aciertos++;}?>
                <img src="images/bien.png" width=16 />XML</td>
            </tr>
            <tr>
              <td><?php if($respuesta2 == "b"){
                 echo "<img src=images/mal.png width=16px></img>";
                }
              ?>C++</td>
            </tr>
            <tr>
              <td><?php if($respuesta2 == "c"){
                 echo "<img src=images/mal.png width=16px></img>";
                }
              ?>Java</td>
            </tr>
          </table>
        </div>
        
        <div>
          <table>
            <tr>
              <th>
                3. ¿Que nos indica @Override en un metodo en Java?
              </th>
            </tr>
            <tr>
              <td><?php if($respuesta3 == "a"){
               echo "<img src=images/mal.png width=16px></img>";
              }
            ?>Que estamos creando un nuevo metodo</td>
            </tr>
            <tr>
              <td><?php if($respuesta3 == "b"){$aciertos++;}?>
              <img src="images/bien.png" width=16 />Que estamos sobreescribiendo un metodo que existia previamente</td>
            </tr>
            <tr>
              <td><?php if($respuesta3 == "c"){
               echo "<img src=images/mal.png width=16px></img>";
              }
            ?>Ninguna de las anteriores es correcta</td>
            </tr>
          </table>
        </div>
       
        <div>
          <table>
            <tr>
              <th>
                4. ¿Que sistema gestor de base de datos es de Microsoft?
              </th>
            </tr>
            <tr>
              <td><?php if($respuesta4 == "a"){
               echo "<img src=images/mal.png width=16px></img>";
              }
            ?>Oracle</td>
            </tr>
            <tr>
              <td><?php if($respuesta4 == "b"){
               echo "<img src=images/mal.png width=16px></img>";
              }
            ?>MySQL</td>
            </tr>
            <tr>
              <td><?php if($respuesta4 == "c"){$aciertos++;}?>
              <img src="images/bien.png" width=16 />SQL Server</td>
            </tr>
          </table>
        </div>
       
        <div>
          <table>
            <tr>
              <th>
                5. ¿Con que sentencia de SQL se puede realizar una consulta?
              </th>
            </tr>
            <tr>
              <td><?php if($respuesta5 == "a"){$aciertos++;}?>
              <img src="images/bien.png" width=16 />SELECT</td>
            </tr>
            <tr>
              <td><?php if($respuesta5 == "b"){
               echo "<img src=images/mal.png width=16px></img>";
              }
            ?>CREATE</td>
            </tr>
            <tr>
              <td><?php if($respuesta5 == "c"){
               echo "<img src=images/mal.png width=16px></img>";
              }
            ?>UPDATE</td>
            </tr>
          </table>
        </div>
       
        <div>
          <table>
            <tr>
              <th>
                6. ¿Cual sería una síntesis correcta a la hora de crear un ArrayList en Java?
              </th>
            </tr>
            <tr>
              <td><?php if($respuesta6 == "a"){
               echo "<img src=images/mal.png width=16px></img>";
              }
            ?>ArrayList&lt;Integer&gt; array = new ArrayList&lt;&gt;();</td>
            </tr>
            <tr>
              <td><?php if($respuesta6 == "b"){
               echo "<img src=images/mal.png width=16px></img>";
              }
            ?>ArrayList&lt;Integer&gt; array = new ArrayList&lt;Integer&gt;();</td>
            </tr>
            <tr>
              <td><?php if($respuesta6 == "c"){$aciertos++;}?>
              <img src="images/bien.png" width=16 />Ambas opciones son correctas</td>
            </tr>
          </table>
        </div>
     
        <div>
          <table>
            <tr>
              <th>
                7. ¿En HTML que tipo de dato manda un campo oculto en un formulario?
              </th>
            </tr>
            <tr>
              <td><?php if($respuesta7 == "a"){
               echo "<img src=images/mal.png width=16px></img>";
              }
            ?>radio</td>
            </tr>
            <tr>
              <td><?php if($respuesta7 == "b"){$aciertos++;}?>
              <img src="images/bien.png" width=16 />hidden</td>
            </tr>
            <tr>
              <td><?php if($respuesta7 == "c"){
               echo "<img src=images/mal.png width=16px></img>";
              }
            ?>submit</td>
            </tr>
          </table>
        </div>
     
        <div>
          <table>
            <tr>
              <th>
                8. ¿En que diagrama de base de datos utilizamos rombos?
              </th>
            </tr>
            <tr>
              <td><?php if($respuesta8 == "a"){
               echo "<img src=images/mal.png width=16px></img>";
              }
            ?>D.E.D.</td>
            </tr>
            <tr>
              <td><?php if($respuesta8 == "b"){$aciertos++;}?>
              <img src="images/bien.png" width=16 />E.R.</td>
            </tr>
            <tr>
              <td><?php if($respuesta8 == "c"){
               echo "<img src=images/mal.png width=16px></img>";
              }
            ?>Diagrama de Clases</td>
            </tr>
          </table>
        </div>
     
        <div>
          <table>
            <tr>
              <th>
                9. ¿Cual de las siguientes sentencias no es un bucle?
              </th>
            </tr>
            <tr>
              <td><?php if($respuesta9 == "a"){
               echo "<img src=images/mal.png width=16px></img>";
              }
            ?>while</td>
            </tr>
            <tr>
              <td><?php if($respuesta9 == "b"){
               echo "<img src=images/mal.png width=16px></img>";
              }
            ?>for</td>
            </tr>
            <tr>
              <td><?php if($respuesta9 == "c"){$aciertos++;}?>
              <img src="images/bien.png" width=16 />if</td>
            </tr>
          </table>
        </div>
       
        <div>
          <table>
            <tr>
              <th>
                10. ¿Que lenguaje se utiliza para establecer una estructura de código en un XML?
              </th>
            </tr>
            <tr>
              <td><?php if($respuesta10 == "a"){
               echo "<img src=images/mal.png width=16px></img>";
              }
            ?>PHP</td>
            </tr>
            <tr>
              <td><?php if($respuesta10 == "b"){$aciertos++;}?>
              <img src="images/bien.png" width=16 />DTD</td>
            </tr>
            <tr>
              <td><?php if($respuesta10 == "c"){
               echo "<img src=images/mal.png width=16px></img>";
              }
            ?>Java</td>
            </tr>
          </table>
        </div>
      
        <h2>
          TOTAL ACIERTOS: <?php echo $aciertos; ?>
        </h2>
        <br><br>
        <form action="index.html" method="get">
          <input type="submit" value="Volver">
        </form>
      </div>
  </body>
</html>
