<?php
    require('../logica/conex.php');
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();
    require '../vendor/autoload.php';
    require '../reporte/index.php';
    require('../logica/con_db.php');


    $opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
    $cod = (isset($_POST['cod'])) ? $_POST['cod'] : '';
    $comisionista = (isset($_POST['comisionista'])) ? $_POST['comisionista'] : '';
    $importe = (isset($_POST['importe'])) ? $_POST['importe'] : '';
    $comentario = (isset($_POST['comentario'])) ? $_POST['comentario'] : '';

    switch ($opcion){
        case 1:
                $sqlEstadoCaja = "SELECT COUNT(cod_encomienda_datos) AS cantidad FROM `encomiendas_datos` WHERE cod_encomiendas IS NULL";
                $queryEstadoCaja = mysqli_query($conex , $sqlEstadoCaja);
                $cantidad = mysqli_fetch_assoc($queryEstadoCaja);
                $cantidad = $cantidad['cantidad'];
                if ($cantidad >= 1) {
                    $CrearPDF = "INSERT INTO `encomiendas`( `comisionista`, `cant_planilla`, `importe`, `observacion`) VALUES ('$comisionista', '$cantidad', '$importe', '$comentario')";
                    $queryCrearPDF = mysqli_query($conex , $CrearPDF);
                    $cod = mysqli_insert_id($conex);

                    $updateEncomienda = "UPDATE `encomiendas_datos` SET `cod_encomiendas`= '$cod' WHERE  `cod_encomiendas` IS NULL";
                    $queryUpdateEncomienda = mysqli_query($conex , $updateEncomienda);

                    if ($cod > 1) {
                        $data = $cod.'.pdf';
                        
                        $mpdf=new \Mpdf\Mpdf();
                        $css=file_get_contents("../reporte/style.css");
                        $plantilla=getPlantilla($cod);
                        $mpdf->writeHTML($css,\Mpdf\HTMLParserMode::HEADER_CSS);
                        $mpdf->writeHTML($plantilla,\Mpdf\HTMLParserMode::HTML_BODY);
                        $mpdf->output($data,"F");
                        //json_encode($url, JSON_UNESCAPED_UNICODE);
                    }
                }

            
            break;
        case 2:
            if (isset($cod)) {
                    $url = '../pdf/'.$cod;
                    if (unlink($url)) {
                        $data = 1;
                    }
                }
            break;
        case 4:
            $consulta = "SELECT * FROM `encomiendas_datos` WHERE cod_encomiendas IS NULL";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();        
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            break;
        case 5:
                $buscarHash = "SELECT hashCabezal,nombre,quincena,fecha_creacion,f.idFarmacia FROM cabezal AS c
                                    INNER JOIN farmacia AS f  ON f.idFarmacia = c.idFarmacia
                                    WHERE hashCabezal = '$cod' ";
                $buscarHash = mysqli_query($conex , $buscarHash);
                $busqueda = mysqli_fetch_assoc($buscarHash);

                
                $hashCabezal = $busqueda['hashCabezal'];
                $nombre = $busqueda['nombre'];
                $quincena = $busqueda['quincena'];
                $fecha_creacion = $busqueda['fecha_creacion'];
                $farm = $busqueda['idFarmacia'];

                if (strlen($nombre) > 1) {
                        $sqlEstadoCaja = "SELECT COUNT(cod_encomienda_datos) AS cantidad FROM `encomiendas_datos` WHERE cod_encomiendas IS NULL AND hashCabezal = '$cod' ";
                        $queryEstadoCaja = mysqli_query($conex , $sqlEstadoCaja);
                        $duplicado = mysqli_fetch_assoc($queryEstadoCaja);
                
                        if ($duplicado['cantidad'] == 0) {
                                $sqlInsert = "INSERT INTO `encomiendas_datos`( `hashCabezal`, `nombre`, `quincena`, `fecha_creacion`, `farm`) VALUES ('$hashCabezal', '$nombre', '$quincena', '$fecha_creacion', '$farm') ";
                                $queryInsert = mysqli_query($conex , $sqlInsert);
                                $data = 1;
                        }else{
                            $data = 2;
                        }
                }else{
                    $data = 3;    
                }
                
            break;
        case 6:
                $sqlEstadoCaja = "SELECT COUNT(cod_encomienda_datos) AS cantidad FROM `encomiendas_datos` WHERE cod_encomiendas IS NULL";
                $queryEstadoCaja = mysqli_query($conex , $sqlEstadoCaja);
                $data = mysqli_fetch_assoc($queryEstadoCaja);
                $data['cantidad'];

            break;
        case 7:
            $sqlEstadoCaja = "DELETE FROM `encomiendas_datos` WHERE `hashCabezal` = '$cod' AND cod_encomiendas IS NULL";
            $queryEstadoCaja = mysqli_query($conex , $sqlEstadoCaja);
            $data = mysqli_fetch_assoc($queryEstadoCaja);
            $data['cantidad'];

        break;
        }
        print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
        $conexion=null;

