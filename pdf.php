

<?php
 require '../vendor/autoload.php';
 require '../reporte/index.php';

if (isset($_POST['cod'])) {

$url = $_POST['cod'].'.pdf'

$mpdf=new \Mpdf\Mpdf();
$css=file_get_contents("../reporte/style.css");

$plantilla=getPlantilla();
$mpdf->writeHTML($css,\Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->writeHTML($plantilla,\Mpdf\HTMLParserMode::HTML_BODY);

$mpdf->output($url,"I");
json_encode($url, JSON_UNESCAPED_UNICODE);

}
