<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once './DAO/JustificacionDAO.php';
require_once 'bootstrap.php';

$id = '';

if(isset($_GET['id'])){
  $id = $_GET['id'];
}

$fechaInicio = null;
$fechaFin = null;
$horasLectivas = "";
$horasColectivas = "";




$jDAO = new JustificacionDAO($dbParams, $config);
$justificacion = $jDAO->unaJustificacion($id);

if(isset($_POST['fecha_inicio'])){
    $a = explode("-", $_POST['fecha_inicio']);
    $fechaInicio = new DateTime();
    $fechaInicio->setDate($a[0], $a[1], $a[2]);
    
    
}
if(isset($_POST['fecha_fin'])){
    $a = explode("-", $_POST['fecha_fin']);
    $fechaFin = new DateTime();
    $fechaFin->setDate($a[0], $a[1], $a[2]);
}  
if(isset($_POST['horas_lectivas'])){
    $horasLectivas = $_POST['horas_lectivas'];
    
}
if(isset($_POST['horas_colectivas'])){
    $horasColectivas = $_POST['horas_colectivas'];
    
}

$justificacion->setFechaInicio($fechaInicio);
$justificacion->setFechaFin($fechaFin);
$justificacion->setHorasLectivas($horasLectivas);
$justificacion->setHorasComplementarias($horasColectivas);


$jDAO->modificarJustificacion($justificacion);


?>