<?php
class Alumno{
    private $id;
    private $nombre;
    private $curso;

    function __construct($id,$nombre,$curso){
      $this->id = $id;
      $this->nombre = $nombre;
      $this->curso = $curso;
    }

    public function getId(){
        return $this->id;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getCurso(){
        return $this->curso;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setCurso($curso){
        $this->curso = $curso;
    }

    public function __toString() {
        return "Alumno: " . $this->id . " ". $this->nombre ." ".$this->curso ;
    }
}
?>