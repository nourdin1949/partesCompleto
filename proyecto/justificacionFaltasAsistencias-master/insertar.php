<?php

use Doctrine\Common\Collections\Expr\Value;

require_once './DAO/JustificacionDAO.php';
require_once './DAO/DepartamentosDAO.php';
require_once './DAO/DocenteDAO.php';
require_once './DAO/DocumentosDAO.php';
require_once './DAO/MotivosDAO.php';
require_once './DAO/OtrosMotivosDAO.php';

require_once 'bootstrap.php';

//Recoger por POST los parámetros
$nombreDocente = "";
$dni = "";
$nrp = "";
$nomDepartamento = "";
$fechaInicio = null;
$fechaFin = null;
$horasLectivas = "";
$horasColectivas = ""; 
$nomMotivos = "";
$nomOtrosMotivos = "";
$fechaFirma = null;
$nomDocumentos = "";

if(isset($_POST['nombre'])){
    $nombreDocente = $_POST['nombre'];
}
if(isset($_POST['dni'])){
    $dni = $_POST['dni'];
}
if(isset($_POST['nrp'])){
    $nrp = $_POST['nrp'];
}
if(isset($_POST['departamento'])){
    $nomDepartamento = $_POST['departamento'];
}
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
if(isset($_POST['motivos'])){
    $nomMotivos = $_POST['motivos']; 
}
if(isset($_POST['otros_motivos'])){
    $nomOtrosMotivos = $_POST['otros_motivos'];
}
if(isset($_POST['fecha_firma'])){
    $a = explode("-", $_POST['fecha_firma']);
    $fechaFirma = new DateTime();
    $fechaFirma->setDate($a[0], $a[1], $a[2]);
}
if(isset($_POST['documentos'])){
    $nomDocumentos = $_POST['documentos'];
}

/**Insertamos departamento */
$departamento = new Departamento($nomDepartamento);
$departDAO = new DepartamentoDAO($dbParams, $config);
$departDAO->insertarDepartamento($departamento);
$idDepar = $departDAO->idDepartamento();

/**Insertamos docente */
$docente = new Docente($nombreDocente, $dni, $nrp, $idDepar);
$docenDAO = new DocenteDAO($dbParams, $config);
$docenDAO->insertarDocente($docente);
$idDocen = $docenDAO->idDocente();

/**Insertamos Documento */
$dirpath = realpath(dirname(getcwd()));
$directorio = $dirpath."/documentos";
$ruta_fichero = $directorio . basename($_FILES["documentos"]["name"]);

$documentos = new Documento($nomDocumentos, $ruta_fichero);
$docuDao = new DocumentoDAO($dbParams, $config);
$docuDao->insertarDocumento($documentos);
$idDocu = $docuDao->idDocumento();

/**Insertamos motivo */
$motivos = new Motivo($nomMotivos);
$motivDao = new MotivoDAO($dbParams, $config);
$motivDao->insertarMotivos($motivos);
$idMotiv = $motivDao->idMotivo();

/**Insertar otros motivos */
$otrosMotivos = new OtroMotivo($nomOtrosMotivos);
$otroDao = new OtrosMotivosDAO($dbParams, $config);
$otroDao->insertarOtrosMotivos($otrosMotivos);
$idOtros = $otroDao->idOtrosMotivos();
echo $idOtros;

/**Insertamos la justificación */
$justificacion = new Justificacion($fechaInicio, $fechaFin, $fechaFirma, $horasLectivas, $horasColectivas, $idDocen, $idDocu, $idMotiv, $idOtros);
$jDao = new JustificacionDAO($dbParams, $config);
$jDao->insertarJustificacion($justificacion);


header('Location: listadoJustificaciones.php');
?>

<?php

if(isset($_POST["documentos"]))

     $fichero = $_POST["documentos"];

//opción A

echo $ruta_fichero;
$uploadOk = 1;
$mensajeFichero="";
?>