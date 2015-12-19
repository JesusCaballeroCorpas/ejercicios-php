<?php

include_once 'Animal.php';
class Lagarto extends Animal{
//Atributos de instancia
  private $tipoEscamas;
//Constructor
  public function __construct($nombre, $sexo, $color, $raza, $tipoEscamas) {
    parent::__construct($nombre, $sexo, $color, $raza);
    $this->tipoEscamas = $tipoEscamas;
  }
//Getter y setter
  function getTipoEscamas() {
    return $this->tipoEscamas;
  }

  function setTipoEscamas($tipoEscamas) {
    $this->tipoEscamas = $tipoEscamas;
  }

//Metodos de instancia
  public function sacaLengua() {
    return $this->getNombre() . " esta sacando la lengua";
  }
  public function come() {
    return $this->getNombre() . " esta comiendose un rico mosquito";
  }
  public function vuela() {
    return $this->getNombre() . " es un lagarto y no puede volar";
  }
//Metodo toString
  public function __toString() {
    return parent::__toString() . "<br>Tipo de escamas: " . $this->getTipoEscamas();
  }
}

