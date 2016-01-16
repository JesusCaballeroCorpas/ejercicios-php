<?php
  require_once '../Model/Articulo.php';
  
  // Obtiene todos las Articulos
  $data['articulos'] = Articulo::getArticulos();
  
  // Carga la vista de listado
  include '../View/publicaciones.php';
