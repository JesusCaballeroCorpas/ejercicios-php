<?php

include_once 'Mamifero.php';
class Perro extends Mamifero{
  //Atributos de instancia
  
//Constructor
  public function __construct($nombre, $sexo, $color, $raza) {
    parent::__construct($nombre, $sexo, $color, $raza);
  }
//Getter y setter
  
//Metodos de instancia
  public function ladra() {
    return $this->getNombre() . " esta ladrando";
  }
  
//Metodo toString
  public function __toString() {
    return parent::__toString();
  }
}

