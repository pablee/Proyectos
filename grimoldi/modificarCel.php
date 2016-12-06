<?php
session_start();
?>
<?php
include "database.php";

$nombre = $_GET["nombre"];
$linea = $_GET["linea"];


$db = new database();
$db->conectar();
				
$consulta = "SELECT * FROM celulares WHERE nombre = '$nombre' OR linea = '$linea';"; 
$query = mysqli_query($db->conexion, $consulta)	or die ("Fallo la consulta, no se pudo modificar el registro");
$ver = mysqli_fetch_assoc($query);
$_session["ver"] = $ver;

echo '
<form method = "GET" action = "actualizarCel.php">
<table class="table table-condensed">
								<thead>
									<tr>
										<td><h3>Modificar linea</h3></td>
										<td><h3>Datos guardados</h3></td>
										<td><h3>Nuevos datos</h3></td>
									</tr>	
								</thead>
									
							<tbody>
								<tr>
									<td><label for="nombre">Nombre y apellido</label></td>
									<td>'.$ver["nombre"].'</td>
									<td><input type = "text" name = "nombre" id = "nombre"></input></td>
								</tr>
								
								<tr>
									<td><label for="linea">Numero de linea</label></td>
									<td>'.$ver["linea"].'</td>
									<td>'.$ver["linea"].'</td>
								</tr>
								
								<tr>
									<td><label for="sector">Centro de costo</label></td>
									<td>'.$ver["sector"].'</td>
									<td><input type = "text" name = "sector" id = "sector"></input></td>
								</tr>
								
								<tr>	
									<td><label for="modelo">Modelo de celular</label></td>
									<td>'.$ver["modelo"].'</td>
									<td><input type = "text" name = "modelo" id = "modelo"></input></td>
								</tr>
								
								<tr>
									<td><label for="propietario">Propietario del equipo</label></td>
									<td>'.$ver["propietario"].'</td>
									<td><input type = "text" name = "propietario" id = "propietario"></input></td>
								</tr>
								
								<tr>
									<td><label for="mail">Mail</label></td>
									<td>'.$ver["mail"].'</td>
									<td><input type = "text" name = "mail" id = "mail"></input></td>
								</tr>
								
								<tr>
									<td><label for="clave">Clave de correo</label></td>
									<td>'.$ver["clave"].'</td>
									<td><input type = "text" name = "clave" id = "clave"></input></td>
								</tr>
								
								<tr>
									<td><label for="plan">Plan telefonico</label></td>
									<td>'.$ver["plan"].'</td>
									<td><input type = "text" name = "plan" id = "plan"></input></td>
								</tr>
								
								<tr>
									<td><label for="servicio_adicional">Servicios adicionales</label></td>
									<td>'.$ver["servicio_adicional"].'</td>
									<td><input type = "text" name = "servicio_adicional" id = "servicio_adicional"></input></td>
								</tr>
								
								<tr>
									<td><label for="datos">Plan de datos</label></td>
									<td>'.$ver["datos"].'</td>
									<td><input type = "text" name = "datos" id = "datos"></input></td>
								</tr>
								
								<tr>
									<td><label for="minutos_libres">Minutos libres</label></td>
									<td>'.$ver["minutos_libres"].'</td>
									<td><input type = "text" name = "minutos_libres" id = "minutos_libres"></input></td>
								</tr>
								
								<tr>
									<td><label for="detalles">Detalles del equipo</label></td>
									<td>'.$ver["detalles"].'</td>
									<td><input type = "text" name = "detalles" id = "detalles"></input></td>
								</tr>
								
								<tr>
									<td><label for="observaciones">Observaciones</label></td>
									<td>'.$ver["observaciones"].'</td>
									<td><input type = "text" name = "observaciones" id = "observaciones"></input></td>
								</tr>
								
								<tr>
									<td></td>
									<td></td>
									<td><input class="btn btn-info" type = "submit" value = "Modificar"></input></td>
								</tr>									
							</tbody>
</table>
</form>
	
';
	
//header('location: home.php');

?>