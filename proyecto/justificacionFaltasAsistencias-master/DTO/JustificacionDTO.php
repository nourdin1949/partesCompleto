<?php
use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="Justificacion")
*/
class Justificacion{
    /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue **/
    private $id;
    /** @ORM\Column(type="date") **/
    private $fecha_inicio;
    /** @ORM\Column(type="date") **/
    private $fecha_final;
    /** @ORM\Column(type="date") **/
    private $fecha_firma;
    /** @ORM\Column(type="integer") **/
    private $horas_lectivas;
    /** @ORM\Column(type="integer") **/
    private $horas_colectivas;
    /** @ORM\Column(type="integer") **/
    private $docente;
    /** @ORM\Column(type="integer") **/
    private $documentos;
    /** @ORM\Column(type="integer") **/
    private $motivo;
    /** @ORM\Column(type="integer") **/
    private $otros_motivos;

    public function __construct($fechaInicio, $fechaFin, $fechaFirma, $horasLectivas, $horasComplementarias, $docente, $documentos, $motivos, $otrosMotivos){
        $this->fecha_inicio = $fechaInicio;
        $this->fecha_final = $fechaFin;
        $this->fecha_firma = $fechaFirma;
        $this->horas_lectivas = $horasLectivas;
        $this->horas_colectivas = $horasComplementarias;
        $this->docente = $docente;
        $this->documentos = $documentos;
        $this->motivos = $motivos;
        $this->otros_motivos = $otrosMotivos;
    }

    public function getID(){
        return $this->id;
    }
    public function setID($id){
        $this->id = $id;
    }

    public function getFechaInicio(){
        return $this->fecha_inicio;
    }
    public function setFechaInicio($fechaInicio){
        $this->fecha_inicio = $fechaInicio;
    }

    public function getFechaFin(){
        return $this->fecha_final;
    }
    public function setFechaFin($fechaFin){
        $this->fecha_final = $fechaFin;
    }

    public function getFechaFirma(){
        return $this->fecha_firma;
    }
    public function setFechaFirma($fechaFirma){
        $this->fecha_firma = $fechaFirma;
    }

    public function getHorasLectivas(){
        return $this->horas_lectivas;
    }
    public function setHorasLectivas($horasLectivas){
        $this->horas_lectivas = $horasLectivas;
    }

    public function getHorasComplementarias(){
        return $this->horas_colectivas;
    }
    public function setHorasComplementarias($horasComplementarias){
        $this->horas_colectivas = $horasComplementarias;
    }

    public function getDocente(){
        return $this->docente;
    }
    public function setDocente($docente){
        $this->docente = $docente;
    }

    public function getDocumentos(){
        return $this->documentos;
    }
    public function setDocumentos($documentos){
        $this->documentos = $documentos;
    }

    public function getMotivos(){
        return $this->motivo;
    }
    public function setMotivos($motivos){
        $this->motivo = $motivos;
    }

    public function getOtrosMotivos(){
        return $this->otros_motivos;
    }
    public function setOtrosMotivos($otrosMotivos){
        $this->otros_motivos = $otrosMotivos;
    }
}

?>