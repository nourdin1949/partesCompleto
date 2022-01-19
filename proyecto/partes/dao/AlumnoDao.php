<?php 
/*Al inlcuirlo en el index.php
foreach (glob("/opt/lampp/htdocs/grupo/dao/*.php") as $filename) {
	include_once $filename;
}
*/
ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);
include_once '../DTO/AlumnoDTO.php';

include_once '../conexion/conexion.php';
class AlumnoDao {

    public function __construct() {
     
    }
    
 
    public function insertar($objetoAlumnoDTO){
       
      $conexion = conectar();
    
  
       $nombre = $objetoAlumnoDTO->getNombre();
       $curso = $objetoAlumnoDTO->getCurso();
       // Ejecutamos la sentencia sql mediante prepareStatement
       $lastinsertid = $conexion->query("SELECT MAX(id) as last_id from Parte");
       echo "insertar alumno";
       foreach($lastinsertid as $ids){
         $id = $ids;
       }
       print_r($id) ;
      $stmt = $conexion->prepare("INSERT INTO Alumno VALUES (?,?,?)");
     $stmt->bindParam(1,$id[0]);
      $stmt->bindParam(2,$nombre);
      $stmt->bindParam(3,$curso);
     
      
     
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
     $stmt = $conexion->prepare("DELETE FROM Alumno WHERE id=?");
     $stmt->bindParam(1,$id);
      if (!$stmt->execute()){
        print "Error al eliminar";
      }else{
         echo "<script languaje='JavaScript'>alert('Eliminado!')</script>";
      }
         
      $conexion =null;
   }//fin del eliminar


    //Creamos la funcion modificar
    public function modificar($objetoAlumnoDTO){
      $conexion = conectar();
      $id = $objetoAlumnoDTO->getId();
      $nombre = $objetoAlumnoDTO->getNombre();
      $curso = $objetoAlumnoDTO->getCurso();
      // Ejecutamos la sentencia sql mediante prepareStatement
     $stmt = $conexion->prepare("UPDATE Alumno SET nombre=?,curso = ? WHERE id=?");
     $stmt->bindParam(1,$nombre);
     $stmt->bindParam(2,$curso);
     $stmt->bindParam(3,$id);
     
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
      $stmt = $conexion->prepare("SELECT * FROM Alumno");
      $stmt->execute();

      $conexion =null;
      return $stmt;
   }//fin de listar

   public function listarAlumnoPorID($id){
      $conexion = conectar();
    
      // Ejecutamos la sentencia sql mediante prepareStatement
      $stmt = $conexion->prepare("SELECT * FROM Alumno WHERE id=?");
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