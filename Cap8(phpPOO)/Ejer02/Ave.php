<?php
include_once 'Animal.php';
class Ave extends Animal{
  
//Atributos de instancia
  private $plumaje;
//Constructor
  public function __construct($nombre, $sexo, $color, $raza, $plumaje) {
    parent::__construct($nombre, $sexo, $color, $raza);
    $this->plumaje = $plumaje;
  }
  
//Getter y setter
  function getPlumaje() {
    return $this->plumaje;
  }

  function setPlumaje($plumaje) {
    $this->plumaje = $plumaje;
  }

//Metodos de instancia  
  public function corre() {
    return $this->getNombre() . " es un ave y no puede correr";
  }
  public function pia() {
    return $this->getNombre() . " esta piando";
  }
  public function ovoposita() {
    if($this->getSexo() == "Hembra"){
      return " !!!!innnnhhh¡¡¡ " . $this->getNombre() . " ha puesto un huevo";
    } else {
      return $this->getNombre() . " es un macho y no puede ovar";
    }
  }
  
  
//Metodo toString
  public function __toString() {
    return parent::__toString() . "<br>Plumaje: " . $this->getPlumaje();
  }
}

