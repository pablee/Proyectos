<?php
session_start();
include "../../../clases/database.php";
$parametro = $_GET["parametro"];
$orden = "ASC";
$anio = $_SESSION["anio"];

$db = new database();
$db->conectar();

if($parametro == "consumo_asc")
	{
	$parametro = "Total";
	$orden = "ASC";
	}else if($parametro == "consumo_desc")
			{
			$parametro = "Total";
			$orden = "DESC";
			}

$ordenar = "SELECT CON.linea, CEL.nombre, CEL.sector, SUM(CON.total_fijos_variables) as Total 
			FROM celulares as CEL
			RIGHT JOIN consumoscel as CON 
			ON CEL.linea = CON.linea
			WHERE CON.anio = '$anio' 
			GROUP BY CEL.nombre 
			ORDER BY $parametro $orden;";
			
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
			</tr>
		</thead>

		<tbody>
		';
		while($ver = mysqli_fetch_assoc($resultado))
			{		
			echo ' 
				<tr>			
					<td>'.$ver['linea'].'</td>
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