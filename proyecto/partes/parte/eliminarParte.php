<?php
 require_once '../configuracion/llamadaArchivos.php';
// llamamos a los metodos eliminar
if(isset($_REQUEST['id'])){
$id = $_REQUEST['id'];
$alumnoDao= new AlumnoDao();
$alumnoDao->eliminar($id);
$tutorDao= new TutorDao();
$tutorDao->eliminar($id);
$parteDao = new ParteDao();
$parteDao->eliminar($id);
}
header('location: listarDatos.php');


?>