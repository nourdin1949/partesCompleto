<?php
    //(Relativo a la raíz del proyecto).
    require_once "vendor/autoload.php";
    require_once './DTO/MotivosDTO.php';

    use Doctrine\ORM\EntityManager;
    

    class MotivoDAO{
        private $entityManager;

        function __construct($dbParams, $config){
        try{
            $this->entityManager = EntityManager::create($dbParams, $config);
        
        }catch (Exception $e) {
            echo $e->getMessage(); 
          }
        }


        function insertarMotivos($motivo){
            $this->entityManager->persist($motivo);
            $this->entityManager->flush();
        }
        
        function idMotivo(){
            $motivos = $this->entityManager->getRepository('Motivo')->findAll();
            $ultimoM = end($motivos);
            $id = $ultimoM->getID();
            return $id;
        }

        function unMotivo($id){
            $motivo = $this->entityManager->find("Motivo", $id);
            return $motivo;
        }
    } 
?>