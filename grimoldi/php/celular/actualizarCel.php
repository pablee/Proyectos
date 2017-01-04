<?php
//graba en la tabla celulares las modificaciones realizadas en una linea existente, recibe los datos de modificarCel.php
include "../../clases/database.php";


$nombre = $_GET["nombre"];
$linea = $_GET["linea"];
$sector = $_GET["sector"];
$modelo = $_GET["modelo"];
$propietario = $_GET["propietario"];
$mail = $_GET["mail"];
$clave = $_GET["clave"];
$plan = $_GET["plan"];
$servicio_adicional = $_GET["servicio_adicional"];
$datos = $_GET["datos"];
$minutos_libres = $_GET["minutos_libres"];
$detalles = $_GET["detalles"];
$observaciones = $_GET["observaciones"];

$db = new database();
$db->conectar();

	if($nombre!="")
		{
		$consulta = "UPDATE celulares SET nombre = '$nombre' WHERE linea = '$linea';";
		$query = mysqli_query($db->conexion, $consulta)	or die ("Fallo la consulta, no se pudo actualizar el celular");
		}

	if($sector!="")
		{
		$consulta = "UPDATE celulares SET sector = '$sector' WHERE linea = '$linea';";
		$query = mysqli_query($db->conexion, $consulta)	or die ("Fallo la consulta, no se pudo actualizar el celular");
		}
	
	if($modelo!="")
		{
		$consulta = "UPDATE celulares SET modelo = '$modelo' WHERE linea = '$linea';";
		$query = mysqli_query($db->conexion, $consulta)	or die ("Fallo la consulta, no se pudo actualizar el celular");
		}

	if($propietario!="")
		{
		$consulta = "UPDATE celulares SET propietario = '$propietario' WHERE linea = '$linea';";
		$query = mysqli_query($db->conexion, $consulta)	or die ("Fallo la consulta, no se pudo actualizar el celular");
		}		

	if($mail!="")
		{
		$consulta = "UPDATE celulares SET mail = '$mail' WHERE linea = '$linea';";
		$query = mysqli_query($db->conexion, $consulta)	or die ("Fallo la consulta, no se pudo actualizar el celular");
		}	

	if($clave!="")
		{
		$consulta = "UPDATE celulares SET clave = '$clave' WHERE linea = '$linea';";
		$query = mysqli_query($db->conexion, $consulta)	or die ("Fallo la consulta, no se pudo actualizar el celular");
		}		

	if($plan!="")
		{
		$consulta = "UPDATE celulares SET plan = '$plan' WHERE linea = '$linea';";
		$query = mysqli_query($db->conexion, $consulta)	or die ("Fallo la consulta, no se pudo actualizar el celular");
		}	

	if($servicio_adicional!="")
		{
		$consulta = "UPDATE celulares SET servicio_adicional = '$servicio_adicional' WHERE linea = '$linea';";
		$query = mysqli_query($db->conexion, $consulta)	or die ("Fallo la consulta, no se pudo actualizar el celular");
		}

	if($datos!="")
		{
		$consulta = "UPDATE celulares SET datos = '$datos' WHERE linea = '$linea';";
		$query = mysqli_query($db->conexion, $consulta)	or die ("Fallo la consulta, no se pudo actualizar el celular");
		}	

	if($minutos_libres!="")
		{
		$consulta = "UPDATE celulares SET minutos_libres = '$minutos_libres' WHERE linea = '$linea';";
		$query = mysqli_query($db->conexion, $consulta)	or die ("Fallo la consulta, no se pudo actualizar el celular");
		}

	if($detalles!="")
		{
		$consulta = "UPDATE celulares SET detalles = '$detalles' WHERE linea = '$linea';";
		$query = mysqli_query($db->conexion, $consulta)	or die ("Fallo la consulta, no se pudo actualizar el celular");
		}		

	if($observaciones!="")
		{
		$consulta = "UPDATE celulares SET observaciones = '$observaciones' WHERE linea = '$linea';";
		$query = mysqli_query($db->conexion, $consulta)	or die ("Fallo la consulta, no se pudo actualizar el celular");
		}			

$_SESSION['mensaje'] = "Los datos del usuario fueron actualizados";
header('location: ../../home.php');

?>