<?php
    //(Relativo a la raíz del proyecto).
    require_once "vendor/autoload.php";
    require_once './DTO/JustificacionDTO.php';

    use Doctrine\ORM\EntityManager;
    

    class JustificacionDAO{

        private $entityManager;

        function __construct($dbParams, $config){
            try{

                $this->entityManager = EntityManager::create($dbParams, $config);
            
            }catch (Exception $e) {
                echo $e->getMessage(); 
            }
        }

        function insertarJustificacion($justificacion){
            $this->entityManager->persist($justificacion);
            $this->entityManager->flush();
        }
    
        function listarJustificaciones(){
            $justificaciones = $this->entityManager->getRepository('Justificacion')->findAll();
            return $justificaciones;
        }

        function eliminarJustificacion($id){
            $justificacion = $this->entityManager->find("Justificacion", $id);

            if(!$justificacion){
                echo "Error con el borrado";
            }else{

                $this->entityManager->remove($justificacion);
                $this->entityManager->flush();

            }
        }

        function unaJustificacion($id){
            $justificacion = $this->entityManager->find("Justificacion", $id);
            echo $justificacion->getHorasLectivas();
                return $justificacion;
                
            
            
        }

        function modificarJustificacion($justificacion){
            $justificacion = $this->entityManager->flush();
        }
    } 
    
?>