<?php

/* 
 * Crea la clase DadoPoker . Las caras de un dado de poker tienen las siguientes figuras: As, K, Q, J,
7 y 8 . Crea el método tira() que no hace otra cosa que tirar el dado, es decir, genera un valor
aleatorio para el objeto al que se le aplica el método. Crea también el método nombreFigura() , que
diga cuál es la figura que ha salido en la última tirada del dado en cuestión. Crea, por último, el
método getTiradasTotales() que debe mostrar el número total de tiradas entre todos los dados.
 */
class DadoPoker{
  //Atributos de clase
  private static $numTiradasTotales = 0;
  
  //Atributos de instancia
  private $caras = ["As","K","Q","J","7","8"];
  private $figura;
  
  //Constructor
  public function __construct() {
    //$this->figura = $this->caras[rand(0, 5)];
  }
  
  //Getter y Setter
  function getFigura() {
    return $this->figura;
  }
  function setFigura($figura) {
    $this->figura = $figura;
  }
  
  //Metodos de clase
  public static function getTiradasTotales() {
    return self::$numTiradasTotales;
  }
  
  //Metodos de instancia
  public function tira() {
    self::$numTiradasTotales++;
    $this->figura = $this->caras[rand(0, 5)];
  }
  public function nombreFigura() {
    return $this->figura;
  }
  
  //Metodo toString
  public function __toString() {
    return $this->figura;
  }
}
