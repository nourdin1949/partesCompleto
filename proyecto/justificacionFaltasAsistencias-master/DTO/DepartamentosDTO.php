<?php
use Doctrine\ORM\Mapping as ORM;
    /**
    * @ORM\Entity
    * @ORM\Table(name="Departamentos")
    */
    class Departamento{
        /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue **/
        private $id;
        /** @ORM\Column(type="string") **/
        private $nombre;


        function __construct($nombre){
            $this->nombre = $nombre;
        }

        public function getID(){
            return $this->id;
        }
        public function setID($id){
            $this->id = $id;
        }

        public function getNombre(){
            return $this->nombre;
        }
        public function setNombre(){
            $this->nombre;
        }
    }
?>