<?php
function getPlantilla($cod){
  require('../logica/con_db.php');
  
  $consulta = "SELECT * FROM cabezal AS c
                INNER JOIN farmacia AS f  ON f.idFarmacia = c.idFarmacia
                WHERE hashCabezal = '$cod'";
  $resul = mysqli_query($conex ,$consulta);
  $datos=mysqli_fetch_array($resul);
    date_default_timezone_set('America/Argentina/Cordoba'); 
    $fecha = date('d-m-Y H:i');
    $fechaCrea=date('d-m-Y H:i',strtotime($datos['fecha_creacion']) );

  $plantilla='
  <body>
 <header class="clearfix">
      <div id="logo">
        <img src="../dist/img/imgCam/logo-circulo.png"  width= "90" height="90">
      </div>
      <div id="company" class="clearfix">
        <div><h2>CAMARA DE FARMACIAS DEL CENTRO ARGENTINO</h2></div>
        
        <div>Direccion: Alvear 874 Villa Maria, Cordoba</div>
        <div>Tel: (0353)4533465 / 4534916 / 4521777</div>
		<div>E-Mail: obrassociales@camaravm.com.ar</div>
      </div>
	  <br>
      <div id="project">
        <div><span>FECHA RECEPCION: <b>'.$fecha.'</b></span></div>
      </div>
	  
    </header>
    <main>
      <p>FARMACIA RECIBIDA: <b>'.$datos['nombre'].'</b></p>
      <p>QUINCENA: <b>'.$datos['quincena'].'</b></p>
      <p>FECHA CREADO: <b>'.$fechaCrea.'</b></p>
      
	
      <div class="puntos">
        <span> ---------------------------------------------------------&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;---------------------------------------------------------- </span>
      </div>
      <div class="puntose">
        <span> FIRMA COMISIONISTA/REPARTIDOR &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; FIRMA CAMARA DE FARMACIAS </span>
      </div>
              
              
          <div class="footer">
            <i>NO VALIDO COMO FACTURA - CAMARA DE FARMACIAS DEL CENTRO ARGENTINO ®</i>
          </div>
        </body>
      </html>';

    return $plantilla;

  }

    ?>
