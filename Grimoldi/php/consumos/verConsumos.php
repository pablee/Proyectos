<?php
include "../../clases/database.php";

$db = new database();
$db->conectar();

$consulta = "SELECT * FROM gastos;";

$resultado = mysqli_query($db->conexion, $consulta)
or die ("Fallo la consulta, no se pueden mostrar el gasto");

echo '
	<table class="table table-condensed">
		<thead>
			<tr>
				<th>ID</th>
				<th>Factura</th>
				<th>Proveedor</th>
				<th>Mes</th>	
				<th>Fecha</th>
				<th>Detalles</th>
				<th>Tipo</th>
				<th>Unidad</th>
				<th>Cantidad</th>
				<th>Valor</th>
				<th>Total</th>
				<th>Dispositivo</th>
				<th>Moneda</th>
				<th>Tipo cambio</th>
			</tr>
		</thead>
		
		<tbody>
	';

while($ver = mysqli_fetch_assoc($resultado))
	{		
	echo ' 
		<tr>			
			<td>'.$ver['id'].'</td>
			<td>'.$ver['factura'].'</td>
			<td>'.$ver['proovedor'].'</td>
			<td>'.$ver['mes'].'</td>
			<td>'.$ver['fecha'].'</td>
			<td>'.$ver['detalle'].'</td>
			<td>'.$ver['tipo'].'</td>
			<td>'.$ver['unidad'].'</td>
			<td>'.$ver['cantidad'].'</td>
			<td>'.$ver['valor'].'</td>
			<td>'.$ver['total'].'</td>
			<td>'.$ver['dispositivo'].'</td>
			<td>'.$ver['moneda'].'</td>
			<td>'.$ver['cambio'].'</td>
		</tr>												
		';
	}
	
	echo '
		</tbody>
	</table> 
	';
	
$db->close();

?>