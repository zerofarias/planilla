<?php



function getPlantilla($cod){
    date_default_timezone_set('America/Argentina/Cordoba'); 
    $fecha = date('d-m-Y H:i');

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
			<p>Desglose de productos</p>
      <table>
        <thead>
          <tr>
            <th class="qty">CANTIDAD</th>
            <th class="qty">CLAVE</th>
            <th class="desc">PRODUCTO</th>
            <th>P/U</th>
            <th>IMPORTE</th>
          </tr>
        </thead>
        <tbody>
	
	  <p>Este no es un comprobante fiscal</p>
	  
    </main>
    <footer>
      
    </footer>
    </body>';

    return $plantilla;

  }

    ?>
