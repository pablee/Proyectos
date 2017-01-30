<?php
include "../../clases/database.php";
date_default_timezone_set('America/Argentina/Buenos_Aires');
setlocale (LC_TIME,"spanish");

$fecha = date("Y-m-d H:i:s");
$id = $_GET["id"];
$destino = $_GET["destino"];
$sector = $_GET["sector"];
$usuario = $_GET["usuario"];

$db = new database();
$db->conectar();

$query = "UPDATE stock SET estado = 'Asignado', fecha_envio = '$fecha', destino = '$destino', sector = '$sector', usuario = '$usuario' WHERE id = '$id';";
$result = mysqli_query($db->conexion, $query)
or die ("Fallo la consulta, no se puede asignar el stock");

$db->close();

echo 'Asignado';
		
?>