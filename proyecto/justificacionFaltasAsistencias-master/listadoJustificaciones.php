<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once './DAO/JustificacionDAO.php';
require_once './DAO/DocenteDAO.php';
require_once 'bootstrap.php';

$html = '<meta charset="utf-8">
<!-- Compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script type = "text/javascript" src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>          

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<body>
 <div class="container">
 <!-- TÍTULO -->
      <div class="row">
        <h3 class="header left teal-text">Listado de Justificaciones</h3>
      </div>
      <a class="waves-effect waves-light btn green1 lighten-2" href="index.html">Nueva Justificación</a>';

$jDAO = new JustificacionDAO($dbParams, $config);
$justificaciones = $jDAO->listarJustificaciones();
$dDAO = new DocenteDAO($dbParams, $config);


$html .= '<div class = "row">
<table>
  <thead>
    <tr>
        <th>Id</th>
        <th>Fecha inicio</th>
        <th>Fecha fin</th>
        <th>Docente</th>
        <th></th>
        <th></th>
    </tr>
  </thead>

  <tbody>';

foreach($justificaciones as $justificacion){
    
    
    if(isset($justificacion)){
      $docente = $dDAO->unDocente($justificacion->getID());

      $html .= '<tr>
      <td>'.$justificacion->getID().'</td>
      <td>'.$justificacion->getFechaInicio()->format('Y-m-d').'</td>
      <td>'.$justificacion->getFechaFin()->format('Y-m-d').'</td>
      <td>'.$docente->getNombre().'</td>
      <td>  <a class="waves-effect waves-light btn" href="editarHTML.php?id='.$justificacion->getID().'">Editar</a></td>
      <td>  <a class="waves-effect waves-light btn red lighten-2" href="eliminar.php?id='.$justificacion->getID().'">Eliminar</a></td>
      <td>  <a class="waves-effect waves-light btn blue lighten-2" href="pdf2.php?id='.$justificacion->getID().'">Descargar PDF</a></td>
      <td>  <a class="waves-effect waves-light btn blue lighten-2" href="enviarEmail.php?id='.$justificacion->getID().'">Enviar por email</a></td>
      </tr>';
    }
    
}

 $html .= '</tbody>
 </table></br>
 <a class="waves-effect waves-light btn orange lighten-2" href="crearhtml.php">Descargar PDF en Blanco</a>
 <a href="../index.html" class="waves-effect waves-light  btn">HOME<i class="material-icons">home</i></a></div></body>';

 echo $html;

?>