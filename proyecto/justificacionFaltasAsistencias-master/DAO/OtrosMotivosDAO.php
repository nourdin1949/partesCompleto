<?php
    //(Relativo a la raíz del proyecto).
    require_once "vendor/autoload.php";
    require_once './DTO/OtrosMotivosDTO.php';

    use Doctrine\ORM\EntityManager;
    

    class OtrosMotivosDAO{
        private $entityManager;

        function __construct($dbParams, $config){
        try{
            $this->entityManager = EntityManager::create($dbParams, $config);
        
        }catch (Exception $e) {
            echo $e->getMessage(); 
          }
        }


        function insertarOtrosMotivos($otros){
            $this->entityManager->persist($otros);
            $this->entityManager->flush();
        }
        
        function idOtrosMotivos(){
            $otros = $this->entityManager->getRepository('OtroMotivo')->findAll();
            $ultimoO = end($otros);
            $id = $ultimoO->getId();
            return $id;
        }

    }
?>