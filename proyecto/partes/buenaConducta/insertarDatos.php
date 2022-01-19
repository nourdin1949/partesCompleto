
</head>
<?php
 require_once '../configuracion/llamadaArchivos.php';
 session_start();
  if($_REQUEST['alumno']!="" && $_REQUEST['curso']!="" && $_REQUEST['nombre']!="" && 
  $_REQUEST['direccion']!="" && $_REQUEST['cp']!="" && $_REQUEST['ciudad']!="" &&
  $_REQUEST['fecha_llamada']!="" &&  $_REQUEST['fecha_suceso']!="" &&  $_REQUEST['fecha_rellenar']!=""  &&
  $_REQUEST['horaCita']!="" && $_REQUEST['personaCitada']!="" && $_REQUEST['profesor']!=""  ){echo 'ddddd';
  
          $alumnoDao = new AlumnoDao();
          $tutorDao = new TutorDao();
          $parteDao = new ParteDao();
          function cargarAlumnoDTO(){
              
              $alumnoDTO = new Alumno(0,$_REQUEST['alumno'],$_REQUEST['curso']);
            $_SESSION['alumno']=$_REQUEST['alumno'];
              return $alumnoDTO;
          }
          function cargarTutorDTO(){
             
            $tutorDTO = new Tutor(0,$_REQUEST['nombre'],$_REQUEST['direccion'],$_REQUEST['cp'],$_REQUEST['ciudad']);
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
            $horacita .="00";
          } 

          
          $parteDTO = new Parte(0,$motivos,$fecha_suceso,$fecha_llamada,$fecha_rellenar,$_REQUEST['personaCitada'],$horacita,$_REQUEST['profesor'],$_REQUEST['tipo']);

            return $parteDTO;
          }
              $parteDao->insertarParte(cargarParteDTO());
                $alumnoDao->insertar(cargarAlumnoDTO());
                
                $tutorDao->insertar(cargarTutorDTO());
                  
               
        }else{
          echo  "<script languaje='JavaScript'>alert('Todos los campos son obligatorios!')</script>";
        }
        
        header('location: formularioBuenaConducta.html');
  ?>