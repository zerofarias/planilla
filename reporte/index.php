<?php

function getPlantilla(){
$contenido='
  <body>
 <header class="clearfix">
      <div id="logo">
        <img src="./logo.png"  width= "100" height="90">
      </div>
      <div id="company" class="clearfix">
        <div><h2>MI EMPRESA SA DE CV</h2></div>
        
        <div>HEHD000000123</div>
        <div>Av. Robles, Comitan, Chiapas</div>
		<div>960000000</div>
      </div>
	  <br>
      <div id="project">
        <div><span>CLIENTE: </span> Alberto Herrera Aguilar</div>
      </div>
	   <div id="project2">
        <div><span>FECHA: </span> 05/02/2023</div>
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

    return $contenido;

  }

    ?>
