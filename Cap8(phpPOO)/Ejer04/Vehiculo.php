<?php
//getVehiculosCreados() y getKmTotales() ; así como el método de instancia getKmRecorridos()
class Vehiculo {
    //Atributos de clase
    private static $vehiculosCreados = 0;
    private static $kmTotales = 0;
    
    //Atributos de instancia
    private $kmRecorridos;
    
    //Constructor
    public function __construct() {
      self::$kmTotales += $this->kmRecorridos;
      //$this->kmRecorridos = 0;
      self::$vehiculosCreados++;
    }
    
    //Metodos de instancia
    function getKmRecorridos() {
      return $this->kmRecorridos;
    }
    function setKmRecorridos($kmRecorridos) {
      $this->kmRecorridos = $kmRecorridos;
    }

        public function anda($km) {
      $this->kmRecorridos += $km;
      self::$kmTotales += $km;
      return " ha andado $km kilometros.";
    }
    
    //Metodos de clase
    public static function getVehiculosCreados() {
      return self::$vehiculosCreados;
    }
    public static function getKmTotales() {
      return self::$kmTotales;
    }
  }

