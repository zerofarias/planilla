<?php
$conex = mysqli_connect("localhost","camarafv_cfvm","ASKDJcn3i4u0cb287","camarafv_db");
$conex->set_charset('utf8');
$tabla = "datos";
if ($conex->connect_errno) {
	echo "Nuestro sitio experimenta fallos....";
}

