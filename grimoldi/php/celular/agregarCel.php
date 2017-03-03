<?php
//guarda en la tabla celulares los datos ingresados en nuevaLinea.php creando un nuevo registro
session_start();
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
$detalles = $_GET["detalles"];
$observaciones = $_GET["observaciones"];

$db = new database();
$db->conectar();
				
$consulta = "INSERT INTO celulares (nombre, linea, sector, modelo, propietario, mail, clave, plan, servicio_adicional, datos, detalles, observaciones)
			VALUES ('$nombre', '$linea', '$sector', '$modelo', '$propietario', '$mail', '$clave', '$plan', '$servicio_adicional', '$datos', '$detalles', '$observaciones');";
$query = mysqli_query($db->conexion, $consulta)	or die ("Fallo la consulta, no se pudo agregar el celular");
		

//muestra los ultimos 10 ingresos
$mostrar = "SELECT * FROM celulares ORDER BY id DESC LIMIT 10;";
$resultado = mysqli_query($db->conexion, $mostrar)
or die ("Fallo la consulta, no se pueden mostrar los ultimos ingresos");

echo '<h3> Linea agregada </h3>';
/*
echo ' 
	<table class="table table-condensed">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Linea</th>
				<th>Centro de costo</th>	
				<th>Modelo de celular</th>
				<th>Propietario</th>
				<th>Gmail</th>
				<th>Clave gmail</th>
				<th>Plan telefonico</th>
				<th>Servicios adicionales</th>
				<th>Plan de datos</th>
				<th>Detalles</th>
			</tr>
		</thead>
		
		<tbody>';

	while($ver = mysqli_fetch_assoc($resultado))
		{
		echo
		"
		<tr>
			<td>".$ver['nombre']."</td>
			<td>".$ver['linea']."</td>
			<td>".$ver['sector']."</td>
			<td>".$ver['modelo']."</td>
			<td>".$ver['propietario']."</td>
			<td>".$ver['mail']."</td>
			<td>".$ver['clave']."</td>
			<td>".$ver['plan']."</td>
			<td>".$ver['servicio_adicional']."</td>
			<td>".$ver['datos']."</td>
			<td>".$ver['detalles']."<br>".$ver['observaciones']."</td>
		</tr>
		";
		}
			
echo'
		</tbody>
	</table>
	';

	
$db->close();

*/

?>