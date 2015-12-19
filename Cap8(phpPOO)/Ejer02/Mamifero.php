<?php
include_once 'Animal.php';
class Mamifero extends Animal{
  //Atributos de instancia
  private $numPatas;
  //Constructor
  public function __construct($nombre, $sexo, $color, $raza, $numPatas = 4) {
    parent::__construct($nombre, $sexo, $color, $raza);
    $this->numPatas = $numPatas;
  }
  //Getter y setter
  function getNumPatas() {
    return $this->numPatas;
  }

  function setNumPatas($numPatas) {
    $this->numPatas = $numPatas;
  }
//Metodos de instancia
  public function vuela() {
    return $this->getNombre() . " es un mamífero y no puede volar";
  }
  public function mama() {
    return $this->getNombre() . " esta mamando";
  }
  public function pare() {
    if($this->getSexo() == "Hembra"){
      return " !!!!innnnhhh¡¡¡ " . $this->getNombre() . " oohh ha nacido un lindo " . $this->getRaza();
    } else {
      return $this->getNombre() . " es un macho y no puede parir";
    }
  }
  
//Metodo toString
  public function __toString() {
    return parent::__toString() . "<br>Número de Patas: " . $this->getNumPatas();
  }
}

