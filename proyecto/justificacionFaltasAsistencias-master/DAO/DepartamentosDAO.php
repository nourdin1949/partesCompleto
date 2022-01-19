<?php
    //(Relativo a la raíz del proyecto).
    require_once "vendor/autoload.php";
    require_once './DTO/DepartamentosDTO.php';

    use Doctrine\ORM\EntityManager;
    

    class DepartamentoDAO{
        private $entityManager;

        function __construct($dbParams, $config){
        try{
            $this->entityManager = EntityManager::create($dbParams, $config);
        
        }catch (Exception $e) {
            echo $e->getMessage(); 
            }
        }

        function insertarDepartamento($departamento){
            $this->entityManager->persist($departamento);
            $this->entityManager->flush();
        }
        
        function idDepartamento(){
            $departamentos = $this->entityManager->getRepository('Departamento')->findAll();
            $ultimoD = end($departamentos);
            $id = $ultimoD->getID();
            return $id;
        }

        function unDepartamento($id){
            $departamento = $this->entityManager->find("Departamento", $id);
            return $departamento;
        }
    }
?>