<?php
require './vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;


//Recoger el contenido del fichero del anexo que contiene el html
ob_start();

error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 0);
ini_set('log_errors', 1);

require 'crearhtmlRelleno.php';



$html2pdf=new Html2Pdf('P','A4','es','true','UTF-8');
$html2pdf->writeHTML($html);
ob_end_clean();
$html2pdf->output();


?>