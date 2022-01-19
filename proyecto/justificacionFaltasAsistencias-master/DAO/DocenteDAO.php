<?php
    //(Relativo a la raíz del proyecto).
    require_once "vendor/autoload.php";
    require_once './DTO/DocentesDTO.php';

    use Doctrine\ORM\EntityManager;
    

    class DocenteDAO{
        private $entityManager;

        function __construct($dbParams, $config){
        try{
            $this->entityManager = EntityManager::create($dbParams, $config);
        
        }catch (Exception $e) {
            echo $e->getMessage(); 
          }
        }


        function insertarDocente($docente){
            $this->entityManager->persist($docente);
            $this->entityManager->flush();
        }
        
        function idDocente(){
            $docentes = $this->entityManager->getRepository('Docente')->findAll();
            $ultimoD = end($docentes);
            $id = $ultimoD->getId();
            return $id;
        }

        function unDocente($id){
            $docente = $this->entityManager->find("Docente", $id);
            return $docente;
        }
    }
?>