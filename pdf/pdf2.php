<?php
    require '../vendor/autoload.php';
    require '../reporte/index.php';
    $cod=16;
    $data = $cod.'.pdf';
                        
                        $mpdf=new \Mpdf\Mpdf();
                        $css=file_get_contents("../reporte/style.css");
                        $plantilla=getPlantilla($cod);
                        $mpdf->writeHTML($css,\Mpdf\HTMLParserMode::HEADER_CSS);
                        $mpdf->writeHTML($plantilla,\Mpdf\HTMLParserMode::HTML_BODY);
                        $mpdf->output($data,"I");




    /*
    switch ($opcion) {
        case 1:
            if (isset($_POST['cod'])) {
                    $url = $_POST['cod'].'.pdf';
                    
                    $mpdf=new \Mpdf\Mpdf();
                    $css=file_get_contents("../reporte/style.css");
                    $plantilla=getPlantilla($_POST['cod']);
                    $mpdf->writeHTML($css,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->writeHTML($plantilla,\Mpdf\HTMLParserMode::HTML_BODY);
                    $mpdf->output($url,"F");
                    json_encode($url, JSON_UNESCAPED_UNICODE);
                }
            break;
        case 2:
            if (isset($_POST['cod'])) {
                    $url = $_POST['cod'].'.pdf';
                    if (unlink($url)) {
                        $url = 1;
                    }
                    json_encode($url, JSON_UNESCAPED_UNICODE);
                }
            break;
        
        default:
            # code...
            break;
    }
    */
