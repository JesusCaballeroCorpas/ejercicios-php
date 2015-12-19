<?php
abstract class Animal{
  //Atributos de clase
  private static $numAnimales = 0;
  
  //Atributos de instancia
  private $nombre;
  private $sexo;
  private $color;
  private $raza;
  
  
  //Constructor
  public function __construct($nombre, $sexo, $color, $raza) {
    $this->nombre = $nombre;
    $this->sexo = $sexo;
    $this->color = $color;
    $this->raza = $raza;
    self::$numAnimales++;
  }
  
  //Getter y Setter
  static function getNumAnimales() {
    return self::$numAnimales;
  }

  function getSexo() {
    return $this->sexo;
  }

  function getColor() {
    return $this->color;
  }
  
  function getNombre() {
    return $this->nombre;
  }
  
  function getRaza() {
    return $this->raza;
  }
  
  static function setNumAnimales($numAnimales) {
    self::$numAnimales = $numAnimales;
  }

  function setSexo($sexo) {
    $this->sexo = $sexo;
  }

  function setColor($color) {
    $this->color = $color;
  }
  
  function setNombre($nombre) {
    $this->nombre = $nombre;
  }
  
  function setRaza($raza) {
    $this->raza = $raza;
  }
  //Metodos de instancia
  public function corre() {
    return $this->getNombre() . " está corriendo";
  }
  public function vuela() {
    return $this->getNombre() . " está volando";
  }
  public function lava() {
    return $this->getNombre() . " se esta lavando";
  }
  public function come() {
    return $this->getNombre() . " está comiendo";
  }
  
  //Metodo toString
  public function __toString() {
    return "Nombre: " . $this->getNombre() . 
           "<br>Sexo: " . $this->getSexo() .
           "<br>Color: " . $this->getColor() .
           "<br>Raza: " . $this->getRaza();
  }
}
