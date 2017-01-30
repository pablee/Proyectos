<?php
include "../../clases/database.php";

$db = new database();
$db->conectar();

				$query = mysqli_query($db->conexion, "SELECT * FROM stock;")
				or die ("Fallo la consulta, no se pueden mostrar el stock");
																	 			

				echo '
				<div class="col-sm-10 text-left" id = "contenido"> 
				<table class="table table-condensed">
				<thead>
					<tr>
						<th>ID</th>
						<th>Estado</th>
						<th>Equipo</th>
						<th>Marca</th>	
						<th>Modelo</th>
						<th>Nro. Serie</th>
						<th>Sistema operativo</th>
						<th>Licencia</th>
						<th>Procesador</th>
						<th>Memoria</th>
						<th>HDD</th>
						<th>Detalles</th>
						<th>Fecha de ingreso</th>
						<th>Asignación/Envio</th>
						<th>Depósito</th>
						<th>Destino</th>
						<th>Sector</th>
						<th>Usuario</th>
					</tr>
				</thead>
				<tbody>';
	
				while($ver = mysqli_fetch_assoc($query))
						{
						echo
						"
							<tr>
								<td>".$ver['id']."</td>
								<td>".$ver['estado']."</td>
								<td>".$ver['equipo']."</td>
								<td>".$ver['marca']."</td>
								<td>".$ver['modelo']."</td>
								<td>".$ver['nro_serie']."</td>
								<td>".$ver['sistema_operativo']."</td>
								<td>".$ver['licencia']."</td>
								<td>".$ver['procesador']."</td>
								<td>".$ver['memoria']."</td>
								<td>".$ver['hdd']."</td>
								<td>".$ver['detalles']."</td>
								<td>".$ver['fecha_ingreso']."</td>
								<td>".$ver['fecha_envio']."</td>
								<td>".$ver['deposito']."</td>
								<td>".$ver['destino']."</td>
								<td>".$ver['sector']."</td>
								<td>".$ver['usuario']."</td>
							</tr>
						";
						}
						
						echo"
								</tbody>
							</table>
						</div>		
						";
								
					
?>


