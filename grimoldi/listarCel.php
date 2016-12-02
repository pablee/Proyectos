<?php
include "database.php";

$db = new database();
$db->conectar();

				$query = mysqli_query($db->conexion, "SELECT * FROM celulares;")
				or die ("Fallo la consulta, no se pueden mostrar la planilla celulares");
			
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
	
				while($ver = mysqli_fetch_assoc($query))
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
						
						echo"
						</tbody>
						</table>
						";
								
					
?>


