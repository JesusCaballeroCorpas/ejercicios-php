<?php
/*
Ejercicio 3

Queremos gestionar la venta de entradas (no numeradas) de Expocoches Campanillas que tiene
3 zonas, la sala principal con 1000 entradas disponibles, la zona de compra-venta con 200 entradas
disponibles y la zona vip con 25 entradas disponibles. Hay que controlar que existen entradas
antes de venderlas. Define las clase Zona con sus atributos y métodos correspondientes y crea
un programa que permita vender las entradas. En la pantalla principal debe aparecer información
sobre las entradas disponibles y un formulario para vender entradas. Debemos indicar para qué
zona queremos las entradas y la cantidad de ellas. Lógicamente, el programa debe controlar que no
se puedan vender más entradas de la cuenta.

 @author: Jesús Caballero Corpas
*/
class Zona{
  //Atributos de clase
  private static $numZonas = 0;
  private static $dineroGanado = 0;
  
  //Atributos de instancia
  private $nombre;
  private $aforo;
  private $entradasLibres;
  private $precio;
  
  //Constructor
  public function __construct($nombre, $aforo , $precio) {
    $this->nombre = $nombre;
    $this->aforo = $aforo;
    $this->entradasLibres = $aforo;
    $this->precio = $precio;
    self::$numZonas++;
  }
  
  //Getter y Setter de la clase
  static function getNumZonas() {
    return self::$numZonas;
  }
  
  static function getDineroGanado() {
    return self::$dineroGanado;
  }

  static function setNumZonas($numZonas) {
    self::$numZonas = $numZonas;
  }
  
  static function setDineroGanado($dineroGanado) {
    self::$dineroGanado = $dineroGanado;
  }
  
  //Getter y Setter de instancia
  function getNombre() {
    return $this->nombre;
  }

  function getAforo() {
    return $this->aforo;
  }

  function getEntradasLibres() {
    return $this->entradasLibres;
  }
  
  function getPrecio() {
    return $this->precio;
  }

  function setNombre($nombre) {
    $this->nombre = $nombre;
  }

  function setAforo($aforo) {
    $this->aforo = $aforo;
  }

  function setEntradasLibres($entradasLibres) {
    $this->entradasLibres = $entradasLibres;
  }
  
  function setPrecio($precio) {
    $this->precio = $precio;
  }

  //Metodos de instancia
  /**
   * Metodo para vender entradas
   * @param type $numEntradas
   */
  public function venderEntradas($numEntradas) {
   // if($this->entradasLibres >= $numEntradas && $this->entradasLibres > 0 && $numEntradas > 0){
      $this->entradasLibres -= $numEntradas;
     /* return true;
    } else {
      return false;
    }*/
  }
  
  /**
   * Metodo para comprobar la disponibilidad de las entradas.
   * @param type $numEntradas
   * @return boolean
   */
  public function comprobarDisponibilidad($numEntradas){
    if(($this->entradasLibres - $numEntradas) >= 0 && $numEntradas > 0){
      return true;
    } else {
      return false;
    }
  }
  
  //Metodo toString
  public function __toString() {
    return "<h3> " . $this->getNombre() . "</h3>" . 
           "Aforo: " . $this->getAforo() .
           "<br>Entradas Libres: " . $this->getEntradasLibres() .
           "<br>Precio: " . $this->getPrecio() . "€";
  }
}

