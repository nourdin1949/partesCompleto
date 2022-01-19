<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once './DAO/JustificacionDAO.php';
require_once './DAO/DocenteDAO.php';
require_once 'bootstrap.php';

$id = '';
if(isset($_GET['id'])){
    $id = $_GET['id'];
}

$jDAO = new JustificacionDAO($dbParams, $config);
$jDAO->eliminarJustificacion($id);

header('Location: listadoJustificaciones.php');

?>