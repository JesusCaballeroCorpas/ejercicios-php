<?php
/*
• Anda con el coche
• Quema rueda con el coche
• Ver kilometraje del coche
*/
include_once 'Vehiculo.php';

class Coche extends Vehiculo {
  //Atributos de instancia
  private $marca;
  private $modelo;
  
  //Constructor de la clase
  public function __construct($mar, $mod, $kil) {
    $this->marca = $mar;
    $this->modelo = $mod;
    if(isset($kil)){
      $this->setKmRecorridos($kil);
    } else {
      $this->setKmRecorridos(0);
    }
    parent::__construct();
  }
  
  //Metodos de instancia
  /*public function anda($km) {
    $this->kmRecorridos += $km;
    return "El $this->marca $this->modelo ha andado $km kilometros.";
  }*/
  public function quemaRueda() {
    return "El $this->marca $this->modelo esta quemando rueda.";
  }
  public function kilometros() {
    return "El $this->marca $this->modelo tiene " . $this->getKmRecorridos() . " kilometros recorridos.";
  }
  //Getter
  public function getMarca() {
    return $this->marca;
  }
  public function getModelo() {
    return $this->modelo;
  }
  //Metodo toString
  public function __toString() {
    $cadena = "Marca: " . $this->marca . "<br>" .
              "Modelo: " . $this->modelo . "<br>" .
              "Kilometros Recorridos: " . $this->getKmRecorridos() . " Km";
    return $cadena;
  }
}
