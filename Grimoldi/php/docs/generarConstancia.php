<?php
session_start();
?>

<?php
include "../../clases/database.php";
date_default_timezone_set('America/Argentina/Buenos_Aires');
setlocale (LC_TIME,"spanish");
$fecha = date("d-m-Y");
$dias = date("d");
$mes = strftime("%B");//strftime("%B"); para que devuelva el nombre del mes en español
$anio = date("Y");


$_SESSION['equipo'] = $_GET["equipo"];
$_SESSION['marca'] = $_GET["marca"];
$_SESSION['modelo'] = $_GET["modelo"];
$_SESSION['nro_serie'] = $_GET["nro_serie"];
$_SESSION['uso'] = $_GET["uso"];
$_SESSION['dias'] = $dias;
$_SESSION['mes'] = $mes;
$_SESSION['anio'] = $anio;
$_SESSION['usuario'] = $_GET["usuario"];

if(isset($_GET["nro_linea"]))
	{
	$_SESSION['nro_linea'] = $_GET["nro_linea"];
	}

if(isset($_GET["sim"]))
	{	
	$_SESSION['sim'] = $_GET["sim"];
	}

if(isset($_GET["imei"]))
	{
	$_SESSION['imei'] = $_GET["imei"];
	}
	
echo "<h2>Reporte generado</h2><br>";
echo "<br>";
echo '
	<a href="php/docs/'.$_SESSION['equipo'].'PDF.php">	
		<button class="btn btn-default"> Generar PDF </button> 
	</a>';

?>