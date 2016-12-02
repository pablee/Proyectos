<?php
include "database.php";

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
				
$consulta = "INSERT INTO TABLE celulares (nombre, linea, sector, modelo, propietario, mail, clave, plan, servicio_adicional, datos, minutos_libres, detalles, observaciones)
			VALUES ('$nombre', '$linea', '$sector', '$modelo', '$propietario', '$mail', '$clave', '$plan', '$servicio_adicional', '$datos', '$minutos_libres', '$detalles', '$observaciones')"
$query = mysqli_query($db->conexion, $consulta)
		or die ("Fallo la consulta, no se pudo agregar el celular");
			
echo "Celular agregado";

?>