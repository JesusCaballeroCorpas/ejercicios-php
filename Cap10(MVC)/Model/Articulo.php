<?php

require_once 'BlogDB.php';

class Articulo {
  private $id;
  private $titulo;
  private $contenido;
  private $fecha;
  
  function __construct($id, $titulo, $contenido, $fecha) {
    $this->id = $id;
    $this->titulo = $titulo;
    $this->contenido = $contenido;
    $this->fecha = $fecha;
  }
  //Getter
  function getId() {
    return $this->id;
  }

  function getTitulo() {
    return $this->titulo;
  }

  function getContenido() {
    return $this->contenido;
  }

  function getFecha() {
    return $this->fecha;
  }
  //Setter
  function setId($id) {
    $this->id = $id;
  }

  function setTitulo($titulo) {
    $this->titulo = $titulo;
  }

  function setContenido($contenido) {
    $this->contenido = $contenido;
  }

  function setFecha($fecha) {
    $this->fecha = $fecha;
  }

    public function insert() {
    $conexion = BlogDB::connectDB();
    $insercion = "INSERT INTO articulo (titulo, contenido) VALUES (\"".$this->titulo."\", \"".$this->contenido."\")";
    $conexion->exec($insercion);
  }

  public function delete() {
    $conexion = BlogDB::connectDB();
    $borrado = "DELETE FROM articulo WHERE id=\"".$this->id."\"";
    $conexion->exec($borrado);
  }
  
  public function update() {
    $conexion = BlogDB::connectDB();
    $insercion = "UPDATE articulo SET titulo = \"".$this->titulo."\", contenido = \"".$this->contenido."\", fecha = \"".$this->fecha."\" WHERE id = \"".$this->id."\"";
    $conexion->exec($insercion);
  }
  
  public static function getArticulos() {
    $conexion = BlogDB::connectDB();
    $seleccion = "SELECT id, titulo, contenido, fecha FROM articulo";
    $consulta = $conexion->query($seleccion);
    
    $articulos = [];
    
    while ($registro = $consulta->fetchObject()) {
      $articulos[] = new Articulo($registro->id, $registro->titulo, $registro->contenido, $registro->fecha);
    }
   
    return $articulos;    
  }
  
  public static function getArticuloById($id) {
    $conexion = BlogDB::connectDB();
    $seleccion = "SELECT id, titulo, contenido, fecha FROM articulo WHERE id=\"".$id."\"";
    $consulta = $conexion->query($seleccion);
    $registro = $consulta->fetchObject();
    $articulo = new Articulo($registro->id, $registro->titulo, $registro->contenido, $registro->fecha);
       
    return $articulo;    
  }
}
