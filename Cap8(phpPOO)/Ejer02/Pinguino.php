<?php

include_once 'Ave.php';
class Pinguino extends Ave{
//Atributos de instancia
  
//Constructor
  public function __construct($nombre, $sexo, $color, $raza, $plumaje) {
    parent::__construct($nombre, $sexo, $color, $raza, $plumaje);
  }
//Getter y setter
  
//Metodos de instancia
  public function pia() {
    return $this->getNombre() . " es un pinguino y no pia solo grazna";
  }
  public function grazna() {
    return $this->getNombre() . " esta graznando";
  }
  public function desliza() {
    return $this->getNombre() . " se esta deslizando";
  }
  
//Metodo toString
  public function __toString() {
    return parent::__toString();
  }
}

