<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once './DAO/JustificacionDAO.php';
require_once './DAO/DocenteDAO.php';
require_once './DAO/DepartamentosDAO.php';
require_once './DAO/MotivosDAO.php';
require_once 'bootstrap.php';


$id = '';

if(isset($_GET['id'])){
  $id = $_GET['id'];
}

$jDAO = new JustificacionDAO($dbParams, $config);
$justificacion = $jDAO->unaJustificacion($id);

$dDAO = new DocenteDAO($dbParams, $config);
$docente = $dDAO->unDocente($justificacion->getDocente());

$depDAO = new DepartamentoDAO($dbParams, $config);
$depart = $depDAO->unDepartamento($docente->getDepartamento());

$mDAO = new MotivoDAO($dbParams, $config);
$idM =$justificacion->getMotivos();
echo $idM;
//$motivo = $mDAO->unMotivo($idM);


$html = '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Justificacion</title>
</head>
<body>
    <table>
        <tr>

            <td><img class="logoJE" SRC="logo.jpeg" WIDTH=195 HEIGHT=55 BORDER=0 /></td>

            <td style="width:200px"></td>

            <td border="1" class="justificacion"> <span>JUSTIFICACIÒN DE FALTA DE ASISTENCIA</span> </td>
        </tr>
    </table>

    <table style="margin-left: auto; margin-right: auto;">
        <tr id="contenedor">
            <td>
                <table>
                    <tr>
                        <td>
                            <font face="GillSans Light, Segoe UI Semilight, sans-serif">
                                <font style="font-size: 10pt;text-align: left;">
                                    <p>D./Dña '.$docente->getNombre().'</p>
                                    <p>con DNI '.$docente->getDni().' y NRP '.$docente->getNrp().'</p>
                                    <p>Profesor/a de:'.$depart->getNombre().' en el IES Augustobriga de Navalmoral de la Mata.</p>

                                </font>
                            </font>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <font face="GillSans Light, Segoe UI Semilight, sans-serif">
                                <font style="font-size: 10pt;text-align: left;">
                                    <h2>DECLARA QUE:</h2>
                                    <p>Faltó a clase en la/s fecha/s '.$justificacion->getFechaInicio()->format("d/m/Y").'   -   '.$justificacion->getFechaFin()->format("d/m/Y").'</p>
                                    <p>Horas lectivos:'.$justificacion->getHorasLectivas().'</p>
                                    <p>Horas complementarias:'.$justificacion->getHorasComplementarias().'</p>
                                </font>
                            </font>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <font face="GillSans Light, Segoe UI Semilight, sans-serif">
                                <font style="font-size: 10pt;text-align: left;">
                                    <p>Por los motivos que se detallan a continuación: $motivo->getNombre()</p>
                                    <p>Otros: ___________________________________________________</p>
                                    <p>__________________________________________________________</p>
                                </font>
                            </font>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <font face="GillSans Light, Segoe UI Semilight, sans-serif">
                                <font style="font-size: 10pt;text-align: left;">
                                    <p>Y para que conste y surte a los efectos oportunos, firma la presente en</p>
                                    <p>Navalmoral de la Mata a '.$justificacion->getFechaFirma()->format("d/m/Y").'</p>
                                </font>
                            </font>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <font face="GillSans Light, Segoe UI Semilight, sans-serif">
                                <font style="font-size: 10pt;text-align: left;">
                                    <p style="text-align:center;">Firma del Profesor/a</p>
                                    <p>Fdo.: ___________________________________________________________________________________________</p>
                                    <p style="text-align:right;">Visto bueno de la directoria</p>
                                </font>
                            </font>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <font face="GillSans Light, Segoe UI Semilight, sans-serif">
                                <font style="font-size: 10pt;text-align: left;">
                                    <p style="text-align:right;">Fdo.:Sra.Marta Victor Vega</p>
                                    <p>Se adjuntan como constancia justificativa los siguientes documentos:__________________________</p>
                                    <p>_______________________________________________________________________________________________</p>
                                    <p>_______________________________________________________________________________________________</p>
                                </font>
                            </font>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>';

echo $html;
?>


