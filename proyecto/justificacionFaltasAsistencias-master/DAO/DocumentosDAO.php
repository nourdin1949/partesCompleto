<?php
    //(Relativo a la raíz del proyecto).
    require_once "vendor/autoload.php";
    require_once './DTO/DocumentosDTO.php';

    use Doctrine\ORM\EntityManager;
    

    class DocumentoDAO{
        private $entityManager;

        function __construct($dbParams, $config){
        try{
            $this->entityManager = EntityManager::create($dbParams, $config);
        
        }catch (Exception $e) {
            echo $e->getMessage(); 
          }
        }


        function insertarDocumento($documento){
            $this->entityManager->persist($documento);
            $this->entityManager->flush();
        }
        
        function idDocumento(){
            $documentos = $this->entityManager->getRepository('Documento')->findAll();
            $ultimoD = end($documentos);
            $id = $ultimoD->getID();
            return $id;
        }

    }
?>