<?php
class Tutor{
private $id;
private $nombrePadre;
private $direccion;
private $codigo_postal;
private $ciudad;

function __construct($id, $nombrePadre, $direccion,$codigo_postal,$ciudad) {

    $this->id = $id;
    $this->nombrePadre = $nombrePadre;
    $this->direccion = $direccion;
    $this->codigo_postal = $codigo_postal;
    $this->ciudad = $ciudad;
}

public function getId(){
  return  $this->id;
}

public function getNombrePadre(){
    return $this->nombrePadre;
}

public function getDireccion(){
    return $this->direccion;
}

public function getCodigo_postal(){
    return $this->codigo_postal;
}

public function getCiudad(){
    return $this->ciudad;
}

public function setId($id) {
    $this->id = $id;
}

public function setNombrePadre($nombrePadre){
    $this->nombrePadre = $nombrePadre;
}

public function setDireccion($direccion){
    $this->direccion = $direccion;
}

public function setCodigo_postal($codigo_postal){
    $this->codigo_postal = $codigo_postal;
}

public function setCiudad($ciudad){
    $this->ciudad = $ciudad;
}

public function __toString() {
    return "Tutor: " . $this->id . " ". $this->nombrePadre." ". $this->direccion." ". $this->codigo_postal." ".$this->ciudad;
}
}
?>