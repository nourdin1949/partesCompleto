<?php
 require_once '../configuracion/llamadaArchivos.php';

if($_REQUEST['alumno']!="" && $_REQUEST['curso']!="" && $_REQUEST['nombre']!="" && 
$_REQUEST['direccion']!="" && $_REQUEST['cp']!="" && $_REQUEST['ciudad']!="" &&
$_REQUEST['fecha_llamada']!="" &&  $_REQUEST['fecha_suceso']!="" &&  $_REQUEST['fecha_rellenar']!=""  &&
$_REQUEST['horaCita']!="" && $_REQUEST['personaCitada']!="" && $_REQUEST['profesor']!=""  ){


        $alumnoDao = new AlumnoDao();
        $tutorDao = new TutorDao();
        $parteDao = new ParteDao();
        function cargarAlumnoDTO(){
            
            $alumnoDTO = new Alumno($_REQUEST['id'],$_REQUEST['alumno'],$_REQUEST['curso']);

            return $alumnoDTO;
        }
        function cargarTutorDTO(){
            
            $tutorDTO = new Tutor($_REQUEST['id'],$_REQUEST['nombre'],$_REQUEST['direccion'],$_REQUEST['cp'],$_REQUEST['ciudad']);
            return $tutorDTO;
        }
        function cargarParteDTO(){
            $motivos="";
            
            foreach($_REQUEST['motivos'] as $llave => $valor){
            $motivos .=$valor." "; 
            }
            if(isset($_REQUEST['fecha_llamada'])){
            $ar = explode("-", $_REQUEST['fecha_llamada']);
            $fecha_llamada=implode("", $ar);
            }
            if(isset($_REQUEST['fecha_rellenar'])){
            $ar = explode("-", $_REQUEST['fecha_rellenar']);
            $fecha_rellenar=implode("", $ar);
            }
        if(isset($_REQUEST['fecha_suceso'])){
            $ar = explode("-", $_REQUEST['fecha_suceso']);
            $fecha_suceso=implode("", $ar);
        } 
        if(isset($_REQUEST['horaCita'])){
            $ar = explode(":", $_REQUEST['horaCita']);
            
            $horacita=implode("", $ar);
        } 
       
        
        $parteDTO = new Parte($_REQUEST['id'],$motivos,$fecha_suceso,$fecha_llamada,$fecha_rellenar,$_REQUEST['personaCitada'],$horacita,$_REQUEST['profesor'],$_REQUEST['profesor']);

            return $parteDTO;
        }
                $parteDao->modificar(cargarParteDTO());
                
                $alumnoDao->modificar(cargarAlumnoDTO());
                
                $tutorDao->modificar(cargarTutorDTO());
                
                
            }else{
                echo  "<script languaje='JavaScript'>alert('Todos los campos son obligatorios!')</script>";
              }
        
header('location: listarDatos.php');
  ?>