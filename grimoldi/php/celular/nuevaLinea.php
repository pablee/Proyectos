<?php
session_start();
include "../../clases/database.php";
$db = new database();
$db->conectar();

$mostrar = "SELECT * FROM celulares ORDER BY id DESC LIMIT 5;";
$resultado = mysqli_query($db->conexion, $mostrar)
or die ("Fallo la consulta, no se pueden mostrar los ultimos ingresos");

echo '
	<div class="col-md-4 text-left">
	
			<table class="table table-condensed">
				<thead>
					<tr>
						<td><h3>Datos de la nueva linea</h3></td>
					</tr>	
				</thead>
					
			<tbody>
				<tr>
					<td><label for="nombre">Nombre y apellido</label></td>
					<td><input type = "text" name = "nombre" id = "nombre"></input></td>
				</tr>
				
				<tr>
					<td><label for="linea">Numero de linea</label></td>
					<td><input type = "text" name = "linea" id = "linea"></input></td>
				</tr>
				
				<tr>
					<td><label for="sector">Centro de costo</label></td>
					<td><input type = "text" name = "sector" id = "sector"></input></td>
				</tr>
				
				<tr>	
					<td><label for="modelo">Modelo de celular</label></td>
					<td><input type = "text" name = "modelo" id = "modelo"></input></td>
				</tr>
				
				<tr>
					<td><label for="propietario">Propietario del equipo</label></td>
					<td><input type = "text" name = "propietario" id = "propietario"></input></td>
				</tr>
				
				<tr>
					<td><label for="mail">Mail</label></td>
					<td><input type = "text" name = "mail" id = "mail"></input></td>
				</tr>
				
				<tr>
					<td><label for="clave">Clave de correo</label></td>
					<td><input type = "text" name = "clave" id = "clave"></input></td>
				</tr>
				
				<tr>
					<td><label for="plan">Plan telefonico</label></td>
					<td><input type = "text" name = "plan" id = "plan"></input></td>
				</tr>
				
				<tr>
					<td><label for="servicio_adicional">Servicios adicionales</label></td>
					<td><input type = "text" name = "servicio_adicional" id = "servicio_adicional"></input></td>
				</tr>
				
				<tr>
					<td><label for="datos">Plan de datos</label></td>
					<td><input type = "text" name = "datos" id = "datos"></input></td>
				</tr>
				
				<tr>
					<td><label for="detalles">Detalles del equipo</label></td>
					<td><input type = "text" name = "detalles" id = "detalles"></input></td>
				</tr>
				
				<tr>
					<td><label for="observaciones">Observaciones</label></td>
					<td><input type = "text" name = "observaciones" id = "observaciones"></input></td>
				</tr>
				
				<tr>
					<td></td>
					<td><input class="btn btn-info" onclick="agregar()" type = "submit" value = "Agregar"></input></td>
				</tr>									
			</tbody>
		</table>	
	</div>
	
	<div class="col-md-8 text-left" style="overflow-x:auto; height:650px;">	
		<h3> Agregadas recientemente </h3>
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
		
			<tbody>
				<div id="recientes">				
				';
				while($ver = mysqli_fetch_assoc($resultado))
					{
					"					
					<tr>
						<td>".$ver['id']."</td>
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
				'	
				</div>
			</tbody>
		</table>
	</div>
	';

$db->close();

?>
