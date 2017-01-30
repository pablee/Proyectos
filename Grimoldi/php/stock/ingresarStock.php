<?php
include "../../clases/database.php";
date_default_timezone_set('America/Argentina/Buenos_Aires');
setlocale (LC_TIME,"spanish");
$fecha_ingreso = date("Y-m-d H:i:s");

$estado = "Disponible";
$equipo = $_GET["equipo"];
$cantidad = $_GET["cantidad"];
$marca = $_GET["marca"];
$modelo = $_GET["modelo"];
$nro_serie = $_GET["nro_serie"];
$sistema_operativo = $_GET["sistema_operativo"];
$licencia = $_GET["licencia"];
$procesador = $_GET["procesador"];
$memoria = $_GET["memoria"];
$hdd = $_GET["hdd"];
$detalles = $_GET["detalles"];

$fecha_envio = $_GET["fecha_envio"];
$deposito = $_GET["deposito"];
$destino = $_GET["destino"];
$sector = $_GET["sector"];
$usuario = $_GET["usuario"];

$db = new database();
$db->conectar();

$query = "INSERT INTO stock( estado, equipo, marca, modelo, nro_serie, sistema_operativo, licencia, procesador, memoria, hdd, detalles, fecha_ingreso, fecha_envio, deposito, destino, sector, usuario) 
			VALUES ('$estado', '$equipo', '$marca', '$modelo', '$nro_serie', '$sistema_operativo', '$licencia', '$procesador', '$memoria', '$hdd', '$detalles', '$fecha_ingreso', '$fecha_envio', '$deposito', '$destino', '$sector', '$usuario');";


$result = mysqli_query($db->conexion, $query)
or die ("Fallo la consulta, no se puede actualizar el stock");

$db->close();

echo "<h2> Ingreso procesado </h2>";
echo "<input type='button' class='btn btn-default' onclick='nuevoIngreso()' value='Nuevo ingreso'></input>";

if($cantidad>1)
	{
	echo "<br><br>";
	echo "<label for='nro_serie'>Numero de serie</label>";
	echo "<input type='text' id='nro_serie'></input>";
	}

?>