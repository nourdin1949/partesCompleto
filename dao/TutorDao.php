<?php 
/*Al inlcuirlo en el index.php
foreach (glob("/opt/lampp/htdocs/grupo/dao/*.php") as $filename) {
	include_once $filename;
}
*/ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);
include_once '../DTO/TutorDTO.php';

include_once '../conexion/conexion.php';
class TutorDao {

    public function __construct() {
     
    }
    
 
    public function insertar($objetoTutorDTO){
      
      $conexion = conectar();
    
       
       $nombrePadre = $objetoTutorDTO->getNombrePadre();
       $direccion = $objetoTutorDTO->getDireccion();
       $cp = $objetoTutorDTO->getCodigo_postal();
       $ciudad =$objetoTutorDTO->getCiudad();
       
       $lastinsertid = $conexion->query("SELECT MAX(id) as last_id from Parte");
       echo "insertar alumno";
       foreach($lastinsertid as $ids){
         $id = $ids;
       }
       print_r($id) ;
       // Ejecutamos la sentencia sql mediante prepareStatement
      $stmt = $conexion->prepare("INSERT INTO Tutor VALUES (?,?,?,?,?)");
      $stmt->bindParam(1,$id[0]);
      $stmt->bindParam(2,$nombrePadre);
      $stmt->bindParam(3,$direccion);
      $stmt->bindParam(4,$cp);
      $stmt->bindParam(5,$ciudad);
      
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
     $stmt = $conexion->prepare("DELETE FROM Tutor WHERE id=?");
     $stmt->bindParam(1,$id);
      if (!$stmt->execute()){
        print "Error al eliminar";
      }else{
         echo "<script languaje='JavaScript'>alert('Eliminado!')</script>";
      }
         
      $conexion =null;
   }//fin del eliminar


    //Creamos la funcion modificar
    public function modificar($objetoTutorDTO){
    $conexion = conectar();
    $id= $objetoTutorDTO->getId();
    $nombrePadre = $objetoTutorDTO->getNombrePadre();
    $direccion = $objetoTutorDTO->getDireccion();
    $cp = $objetoTutorDTO->getCodigo_postal();
    $ciudad =$objetoTutorDTO->getCiudad();
      // Ejecutamos la sentencia sql mediante prepareStatement
    $stmt = $conexion->prepare("UPDATE Tutor SET nombrePadre=?,direccion = ?, codigo_postal=?, ciudad=? WHERE id=?");
    $stmt->bindParam(1,$nombrePadre);
    $stmt->bindParam(2,$direccion);
    $stmt->bindParam(3,$cp);
    $stmt->bindParam(4,$ciudad);
    $stmt->bindParam(5,$id);
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

      //Si tuvieramos claves externas la hariamos asi 
      //$stmt = $conexion->prepare("SELECT * FROM Tutor inner join Alumno on Alumno.id=Tutor.id");
      $stmt = $conexion->prepare("SELECT * FROM Tutor ");
      $stmt->execute();

     
      $conexion =null;
      return $stmt;
   }//fin de listar
   public function listarTutorPorID($id){
      $conexion = conectar();
    
      // Ejecutamos la sentencia sql mediante prepareStatement
      $stmt = $conexion->prepare("SELECT * FROM Tutor WHERE id=?");
      $stmt->bindParam(1,$id);
      $stmt->execute();
      $array=array();
      $conexion =null;
      foreach($stmt as $row){
         $array[]=$row;
      }
      return $array;
   }//fin de listar por id


}



?>