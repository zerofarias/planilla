<?php
require '../vendor/autoload.php';
require '../reporte/index.php';
//require_once 'consultasbd.php';


$mpdf=new \Mpdf\Mpdf();
$css=file_get_contents("../reporte/style.css");

$plantilla=getPlantilla();
$mpdf->writeHTML($css,\Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->writeHTML($plantilla,\Mpdf\HTMLParserMode::HTML_BODY);

$mpdf->output("CamaraFarmacias","I");


