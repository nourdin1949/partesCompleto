<?php 
/*Al inlcuirlo en el index.php
foreach (glob("/opt/lampp/htdocs/grupo/dao/*.php") as $filename) {
	include_once $filename;
}
*/ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);


require_once '../conexion/conexion.php';
class ParteDao {

    public function __construct() {
     
    }
    
    public function insertarParte($objetoParteDTO){
      
      $conexion = conectar();
     
       $personaCitada = $objetoParteDTO->getPersonaCitada();
       $comentario = $objetoParteDTO->getComentario();
       $fecha_suceso=$objetoParteDTO->getFecha_suceso();
       $fecha_llamada =$objetoParteDTO->getFecha_llamada();
       $fecha_rellenar =$objetoParteDTO->getFecha_rellenar();
       $hora= $objetoParteDTO->getHora();
       $profesor = $objetoParteDTO->getProfesor();
       $tipo = $objetoParteDTO->getTipo();
       // Ejecutamos la sentencia sql mediante prepareStatement
        $stmt = $conexion->prepare("INSERT INTO Parte VALUES (NULL,?,?,?,?,?,?,?,?)");
    
         $stmt->bindParam(1,$comentario);
         $stmt->bindParam(2, $fecha_suceso);
         $stmt->bindParam(3,$fecha_llamada);
         $stmt->bindParam(4,$fecha_rellenar);
         $stmt->bindParam(5,$personaCitada);
         $stmt->bindParam(6,$hora); 
         $stmt->bindParam(7,$profesor);
         $stmt->bindParam(8,$tipo);
        if (!$stmt->execute()){
            print "Error al insertar";
        }else{
            echo "<script languaje='JavaScript'>alert('Insertado!')</script>";
        }
          
       $conexion =null;
    }//fin del insertar
   
    //Creamos la funcion eliminar
    public function eliminar($id){
      $conexion = conectar();
      
     
      // Ejecutamos la sentencia sql mediante prepareStatement
     $stmt = $conexion->prepare("DELETE FROM Parte WHERE id=?");
     $stmt->bindParam(1,$id);
      if (!$stmt->execute()){
        print "Error al eliminar";
      }else{
         echo "<script languaje='JavaScript'>alert('Eliminado!')</script>";
      }
         
      $conexion =null;
   }//fin del eliminar


    //Creamos la funcion modificar
    public function modificar($objetoParteDTO){
    $conexion = conectar();
    $id= $objetoParteDTO->getId();
    $personaCitada = $objetoParteDTO->getPersonaCitada();
    $comentario = $objetoParteDTO->getComentario();
    $fecha_suceso = $objetoParteDTO->getFecha_suceso();
    $fecha_llamada =$objetoParteDTO->getFecha_llamada();
    $fecha_rellenar =$objetoParteDTO->getFecha_rellenar();
    $hora= $objetoParteDTO->getHora();
    $profesor = $objetoParteDTO->getProfesor();
      // Ejecutamos la sentencia sql mediante prepareStatement
    $stmt = $conexion->prepare("UPDATE Parte SET comentario=?,fecha_suceso = ?,fecha_llamada=?, 
    fecha_rellenar=?,personaCitada=?, hora=?, profesor=? WHERE id=?");
   $stmt->bindParam(1,$comentario);
   $stmt->bindParam(2,$fecha_suceso);
   $stmt->bindParam(3,$fecha_llamada);
   $stmt->bindParam(4,$fecha_rellenar);
   $stmt->bindParam(5,$personaCitada);
   $stmt->bindParam(6,$hora); 
   $stmt->bindParam(7,$profesor);
   $stmt->bindParam(8,$id);
      if (!$stmt->execute()){
        print "Error al modificar";
      }else{
         echo "<script languaje='JavaScript'>alert('Modificado!')</script>";
      }
         
      $conexion =null;
   }//fin del modificar
 
   //Creamos la funciona listar, la mas dificil, debemos mostrarla en una tabla
   public function listar(){
      $conexion = conectar();
    
      // Ejecutamos la sentencia sql mediante prepareStatement
      $stmt = $conexion->prepare("SELECT * FROM Parte");
      $stmt->execute();

     
      $conexion =null;
      return $stmt;
   }//fin de listar

   public function listarPartePorID($id){
      $conexion = conectar();
    
      // Ejecutamos la sentencia sql mediante prepareStatement
      $stmt = $conexion->prepare("SELECT * FROM Parte WHERE id=?");
      $stmt->bindParam(1,$id);
      $stmt->execute();
$array=array();
      $conexion =null;
      foreach ($stmt as $row){
         $array[]=$row;
      }
      return $array;
   }//fin de listar por id

}



?>