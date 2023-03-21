<?php
function getPlantilla($cod){
  require('../logica/con_db.php');

  $consulta1 = "SELECT * FROM `encomiendas` where cod_encomienda = '$cod'";
  $resul1 = mysqli_query($conex ,$consulta1);
  $datos1=mysqli_fetch_assoc($resul1);
  $fecha=date('d-m-Y',strtotime($datos1['fecha']) );
  
  if($datos1['importe'] > 1 ){
      $importe = '<h2 id="total">IMPORTE ABONADO $ '.$datos1['importe'].'</h2>';
  }else {
      $importe = '';
  }

  if (strlen($datos1['observacion']) > 0) {
      $observacion = '<br><spam><b>OBSERVACION :</b><i> '.$datos1['observacion'].'<i></spam>';
  }else {
      $observacion = '';
  }

  if($datos1['tipo_envio'] == 1 ){
      $tabla = "";
}else {
    $tabla = '';
}

  

  $plantilla='
  <body>
  <h3 id="num">N° '.$datos1['cod_encomienda'].'</h3>
 <header class="clearfix">
      <div id="logo">
        <img src="../dist/img/imgCam/logo-circulo.png"  width= "90" height="90">
      </div>
      <div id="company" class="clearfix">
            <h2>CAMARA DE FARMACIAS DEL CENTRO ARGENTINO</h2>
      </div>
      <div id="header">
          <p>Direccion: Alvear 874 Villa Maria, Cordoba</p>
          <p>Tel: (0353)4533465 / 4534916 / 4521777</p>
		      <p>E-Mail: obrassociales@camaravm.com.ar</p>
          <h4>COMISIONISTA: PEPITOO</h4>
      </div>
	  <br>
      <div id="project">
        <div><span>FECHA RECEPCION: <b>'.$fecha.'</b></span></div>
      </div>
	  <p id="separador">---------------------------------------------------------------------------------------------------------------------------------------------------------------</p>
    </header>
    <div id="datos">';



    /////// llamo a tablet
    if ($datos1['tipo_envio'] == 1) {
      $plantilla.='
      <p> Recepcion Periodos</p>
        <table>
          <thead>
                <tr>
                    <th>Cantidad</th>
                    <th>Farmacia</th>
                    <th>Periodo</th>
                    <th>Creado</th>
                </tr>
            </thead>  
    ';
    $consulta = "SELECT * FROM `encomiendas_datos` where cod_encomiendas = '$cod'";
    $resul = mysqli_query($conex ,$consulta);  
    while ($datos=mysqli_fetch_assoc($resul)){
      $num = 1;
      $suma = $suma + $num;
        $fechaCrea=date('d-m-Y H:i',strtotime($datos['fecha_creacion']) );
        $plantilla .= '
                  <tbody>  
                        <tr>
                            <td>'.$suma.'</td>
                            <td>'.$datos['nombre'].'</td>
                            <td>'.$datos['quincena'].'</td>
                            <td>'.$fechaCrea.'</td>
                        </tr>
                    </tbody> '; 
    }
    $plantilla.='
          </table>
          <br>
  ';
  }
  
  if ($datos1['tipo_envio'] == 2) {
    $plantilla.='<h2>Recepcion de : '.$datos1['concepto'].'</h2>
                <h2>Farmacia/Direccion: '.$datos1['farmacia_direccion'].'</h2>
  ';
  }
  if ($datos1['tipo_envio'] == 3) {
    $plantilla.='<h2>Envio de : '.$datos1['concepto'].'</h2>
                <h2>Farmacia/Direccion: '.$datos1['farmacia_direccion'].'</h2>
  ';
  }






  
  $plantilla.= '
          '.$observacion.'
         '. $datos1['tipo_envio'].'
          <br><br>
          '.$importe.'
      <br><br><br><br><br><br>
    </div>

    
    <div>
        <span> ----------------------------------------------------------&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;------------------------------------------------------ </span>
      </div>
      <div id="firma2nte">
        <span> FIRMA COMISIONISTA/REPARTIDOR &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; FIRMA CAMARA DE FARMACIAS </span>
        <br><br>
        <br><br>
        <div id="footer">
            <i>COMPROBANTE NO VALIDO COMO FACTURA - CAMARA DE FARMACIAS DEL CENTRO ARGENTINO®</i>
          </div>
        </div>
    
              
              
          
        </body>
      </html>';

    return $plantilla;

  }

  /*
  <p>FARMACIA RECIBIDA: <b>'.$datos['nombre'].'</b></p>
    <p>QUINCENA: <b>'.$datos['quincena'].'</b></p>
    <p>FECHA CREADOadsdadas: <b>'.$fechaCrea.'</b></p>';




    <div class="puntos">
        <span> ---------------------------------------------------------&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;---------------------------------------------------------- </span>
      </div>
      <div class="puntose">
        <span> FIRMA COMISIONISTA/REPARTIDOR &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; FIRMA CAMARA DE FARMACIAS </span>
      </div>
              
              
          <div class="footer">
            <i>NO VALIDO COMO FACTURA - CAMARA DE FARMACIAS DEL CENTRO ARGENTINO ®</i>
          </div>
      */

    ?>
