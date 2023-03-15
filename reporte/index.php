<?php


function getPlantilla (){

//  $consulta = 'SELECT * FROM `datos` WHERE id=' . $IdRegistro;
//  
// $resul = mysqli_query($Conexion ,$consulta);
// $datos = mysqli_fetch_array ($resul);
//$fechainhumado=date('d-m-Y',strtotime($datos['fecha_Hs']) );
//$fechafallecimiento=date('d-m-Y',strtotime($datos['Fechafallecimiento']) );
//$fechaNacimiento=date('d-m-Y',strtotime($datos['fechaNacimiento']) );
//$fechadato=date('d-m-Y',strtotime($datos['Fecha']) );
//$Hs=date('H:i',strtotime($datos['fecha_Hs']) );
//
//  if ($datos['dniFallecido'] > 0) {
//    $datosInhumado = '<p> Dni: <b>'.$datos['dniFallecido'].'</b> Fecha de Nacimiento: <b>'.$fechaNacimiento.'</b> Nacionalidad: <b>'.$datos['pais'].'</b> </p>';
//  }


 $plantilla ='

<!DOCTYPE html>

 <head></head>   
<body>
<h2 class="numeroid">Nº 4 </h2>
    <header class="clearfix">
    
      <div id="logo">
        <img src="img/logo.png" width="200" heigth="100" >
      </div>
      
      <div><H1>SOLICITUD DE INHUMACION Y/O TRASLADO</H1></H1></div>
      <div id="company">
      
        <h2 class="name">La Naturaleza</h2>
        <div>Villa Nueva, Cordoba</div>
      
        <div><a href="mailto:lanaturaleza@paviotti.com.ar">lanaturaleza@paviotti.com.ar</a></div>
      </div>
      </div>
      <hr size="2px" color="black" />
      <p></p>
    </header>  
           <div class="empresasol">
           EMPRESA SOLICITANTE <b> aaaa</b>
           </div>
             <div class="fecha">
               FECHA   <b>eeeeee</b>
              
            </div>
  
     
        
        
    <div class="footer">
      <i>Todos los derechos reservados LA NATURALEZA.SRL.</i>
    </div>
  </body>
</html>';
return $plantilla;


}