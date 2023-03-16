<?php
    require '../vendor/autoload.php';
    require '../reporte/index.php';

    $opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
    $cod = (isset($_POST['cod'])) ? $_POST['cod'] : '';


    $url = 'fake.pdf';
    $_POST['cod'] = '726287e201a0c53944131c6fd314f3871c5368efaba9668702bb2ccf587ab387';
                    
                    $mpdf=new \Mpdf\Mpdf();
                    $css=file_get_contents("../reporte/style.css");
                    $plantilla=getPlantilla($_POST['cod']);
                    $mpdf->writeHTML($css,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->writeHTML($plantilla,\Mpdf\HTMLParserMode::HTML_BODY);
                    $mpdf->output($url,"I");
                    json_encode($url, JSON_UNESCAPED_UNICODE);






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
