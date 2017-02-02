<?php
include "../../../clases/database.php";
date_default_timezone_set('America/Argentina/Buenos_Aires');
setlocale (LC_TIME,"spanish");
//$fecha_ingreso = date("Y-m-d H:i:s");

$factura = $_GET["factura"];
$proovedor = $_GET["proovedor"];
$mes = $_GET["mes"];
$fecha = $_GET["fecha"];
$detalle = $_GET["detalle"];
$tipo = $_GET["tipo"];
$unidad = $_GET["unidad"];
$cantidad = $_GET["cantidad"];
$valor = $_GET["valor"];
$total = $_GET["total"];
$dispositivo = $_GET["dispositivo"];
$moneda = $_GET["moneda"];
$cambio = $_GET["cambio"];

$db = new database();
$db->conectar();

	//guarda los datos ingresados
	$consulta = "INSERT INTO gastos( factura, proovedor, mes, fecha, detalle, tipo, unidad, cantidad, valor, total, dispositivo, moneda, cambio) 
			  VALUES ('$factura','$proovedor','$mes','$fecha','$detalle','$tipo','$unidad','$cantidad','$valor','$total','$dispositivo','$moneda','$cambio');";

	$result = mysqli_query($db->conexion, $consulta)
	or die ("Fallo la consulta, no se puede ingresar el gasto");

	//muestra los ultimos 5 ingresados
	$mostrar = "SELECT * FROM gastos ORDER BY id DESC LIMIT 5;";
	$resultado = mysqli_query($db->conexion, $mostrar)
	or die ("Fallo la consulta, no se pueden mostrar el gasto");
	
echo "<h2> Consumo ingresado </h2>";
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