<?php

function conectar(){
// Carga la configuración

$config = parse_ini_file('../configuracion/config.ini');


    //Conexión con los datos del 'config.ini'

    //Método PDO

    try {


    $conexion = new PDO("mysql:host=".$config['host'].";dbname=".$config['dbname'], $config['username'], $config['password']);


    // Establecemos el modo de error de PDO para que salten excepciones

    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    } catch(PDOException $e) {

    echo "<br>" . $e->getMessage();

    }
    return $conexion;
}

?>