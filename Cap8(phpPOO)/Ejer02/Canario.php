<?php

include_once 'Ave.php';
class Canario extends Ave{
  //Atributos de instancia
  
//Constructor
  public function __construct($nombre, $sexo, $color, $raza, $plumaje) {
    parent::__construct($nombre, $sexo, $color, $raza, $plumaje);
  }
//Getter y setter
  
//Metodos de instancia
  public function canta() {
    return $this->getNombre() . " esta cantando";
  }
  
//Metodo toString
  public function __toString() {
    return parent::__toString();
  }
}

