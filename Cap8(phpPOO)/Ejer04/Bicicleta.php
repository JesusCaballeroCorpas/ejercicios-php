<?php

/* 
• Anda con la bicicleta
• Haz el caballito con la bicicleta
• Ver kilometraje de la bicicleta
 */
include_once 'Vehiculo.php';

class Bicileta extends Vehiculo {
  //Atributos de instancia
  private $modelo;
  
  //Constructor de la clase
  public function __construct($mod, $kil) {
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
    return "La bicicleta $this->modelo ha andado $km kilometros.";
  }*/
  public function caballito() {
    return "La bicicleta $this->modelo ha hecho un caballito.";
  }
  public function kilometros() {
    return "La bicicleta $this->modelo tiene " . $this->getKmRecorridos() . " kilometros recorridos.";
  }
  public function getModelo() {
    return $this->modelo;
  }
  //Metodo toString
  public function __toString() {
    $cadena = "Modelo: " . $this->modelo . "<br>" .
              "Kilometros Recorridos: " . $this->getKmRecorridos() . " Km";
    return $cadena;
  }
}
