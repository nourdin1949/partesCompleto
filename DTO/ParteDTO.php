<?php
class Parte{
    private $id;
    private $comentario;
    private $fecha_suceso;
    private $fecha_llamada;
    private $fecha_rellenar;
    private $personaCitada;
    private $hora;
    private $profesor;
    private $tipo;
   function __construct($id,$comentario,$fecha_suceso,$fecha_llamada,$fecha_rellenar,$personaCitada,$hora,$profesor,$tipo){
    $this->id = $id; 
    $this->comentario = $comentario;       
    $this->fecha_suceso = $fecha_suceso; 
    $this->fecha_llamada = $fecha_llamada; 
    $this->fecha_rellenar = $fecha_rellenar; 
    $this->personaCitada = $personaCitada; 
    $this->hora = $hora; 
    $this->profesor = $profesor; 
    $this->tipo = $tipo;
   }

   public function getId(){
    return  $this->id;
  }

  public function getComentario(){
    return  $this->comentario;
  }

  public function getFecha_suceso(){
    return  $this->fecha_suceso;
  }

  public function getFecha_llamada(){
    return  $this->fecha_llamada;
  }

  public function getFecha_rellenar(){
    return  $this->fecha_rellenar;
  }

  public function getPersonaCitada(){
    return  $this->personaCitada;
  }

  public function getHora(){
    return  $this->hora;
  }

  public function getProfesor(){
    return  $this->profesor;
  }
  public function getTipo(){
    return  $this->tipo;
  }

public function setComentario($comentario) {
    $this->comentario = $comentario;
}

public function setFecha_suceso($fecha_suceso) {
    $this->fecha_suceso = $fecha_suceso;
}

public function setFecha_llamada($fecha_llamada) {
    $this->fecha_llamada = $fecha_llamada;
}

public function setFecha_rellenar($fecha_rellenar) {
    $this->fecha_rellenar = $fecha_rellenar;
}

public function setPersonaCitada($personaCitada) {
    $this->personaCitada = $personaCitada;
}

public function setHora($hora) {
    $this->hora = $hora;
}

public function setProfesor($profesor) {
    $this->profesor = $profesor;
}

public function __toString() {
    return "Parte: " . $this->id . " ". $this->comentario." ". $this->fecha_suceso." ". $this->fecha_llamada." ".$this->fecha_rellenar." ".$this->personaCitada." ".$this->hora." ".$this->profesor;
}
}
?>