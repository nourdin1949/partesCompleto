<?php

//(Relativo a la raíz del proyecto).
require_once "vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = array(".");
$isDevMode = true;

// configuración de la base de datos
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => 'admin1234',
    'dbname'   => 'JustificacionFaltas',
    'host' => 'localhost',
);

try{

    $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, null, null, false);
    //$entityManager = EntityManager::create($dbParams, $config);

}catch (Exception $e) {
    echo $e->getMessage(); 
  }
?>