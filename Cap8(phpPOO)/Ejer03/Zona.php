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
  
  //Atributos de instancia
  private $nombre;
  private $aforo;
  private $entradasLibres;
  
  
  //Constructor
  public function __construct($nombre, $aforo) {
    $this->nombre = $nombre;
    $this->aforo = $aforo;
    $this->entradasLibres = $aforo;
    self::$numZonas++;
  }
  
  //Getter y Setter de la clase
  static function getNumZonas() {
    return self::$numZonas;
  }

  static function setNumZonas($numZonas) {
    self::$numZonas = $numZonas;
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

  function setNombre($nombre) {
    $this->nombre = $nombre;
  }

  function setAforo($aforo) {
    $this->aforo = $aforo;
  }

  function setEntradasLibres($entradasLibres) {
    $this->entradasLibres = $entradasLibres;
  }

  //Metodos de instancia
  public function venderEntradas($numEntradas) {
    if($this->entradasLibres >= $numEntradas && $this->entradasLibres > 0 && $numEntradas > 0){
      $this->entradasLibres -= $numEntradas;
      return true;
    } else {
      return false;
    }
  }
  
  //Metodo toString
  public function __toString() {
    return "<h3> " . $this->getNombre() . "</h3>" . 
           "Aforo: " . $this->getAforo() .
           "<br>Entradas Libres: " . $this->getEntradasLibres();
  }
}

