<?php
session_start();
include "../../../clases/database.php";
$parametro = $_GET["parametro"];
$anio = $_SESSION["anio"];

$db = new database();
$db->conectar();

$ordenar = "SELECT id, nombre, sector, SUM(total_fijos_variables) as Total FROM consumoscel WHERE anio = '$anio' GROUP BY nombre ORDER BY $parametro ASC;";
$resultado = mysqli_query($db->conexion, $ordenar) 
or die ("Fallo la consulta, no se pudo filtrar.");

	echo '
	<br>
	<table class="table table-condensed">
		<thead class="text-center">
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Centro de costo</th>				
				<th>Total cargos fijos y variables</th>
				<th>
					<select type = "text" class="form-control" onchange="ordenar(this.value)">
							<option value="">  </option>
							<option value="id"> ID </option>
							<option value="nombre"> Nombre </option>}
							<option value="sector"> Sector </option>
					</select>
				</th>	
			</tr>
		</thead>

		<tbody>
		';
		while($ver = mysqli_fetch_assoc($resultado))
			{		
			echo ' 
				<tr>			
					<td>'.$ver['id'].'</td>
					<td>'.$ver['nombre'].'</td>
					<td>'.$ver['sector'].'</td>					
					<td>$'.$ver['Total'].'</td>
				</tr>												
				';
			}	
	echo '
		</tbody>
	</table> 
	';

$db->close();	
?>