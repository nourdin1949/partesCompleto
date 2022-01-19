<?php
include_once 'DepartamentosDTO.php';
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="Docente")
*/
class Docente{
    /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue **/
    private $id;
    /** @ORM\Column(type="string") **/
    private $nombre;
    /** @ORM\Column(type="string") **/
    private $dni;
    /** @ORM\Column(type="string") **/
    private $nrp;
    /**
    * @ORM\Column(type="integer")
    **/
    private $idDepartamento;

    function __construct($nombre, $dni, $nrp, $departamento){
        $this->nombre = $nombre;
        $this->dni = $dni;
        $this->nrp = $nrp;
        $this->idDepartamento = $departamento;
    }

    public function getId(){
        return $this->id;
    }

    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getDni(){
        return $this->dni;
    }
    public function setDni($dni){
        $this->dni = $dni;
    }

    public function getNrp(){
        return $this->nrp;
    }
    public function setNrp($nrp){
        $this->nrp = $nrp;
    }

    public function getDepartamento(){
        return $this->idDepartamento;
    }
    public function setDepartamento($departamento){
        $this->idDepartamento = $departamento;
    }
}

?>