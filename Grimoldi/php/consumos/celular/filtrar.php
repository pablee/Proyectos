<?php
session_start();
include "../../../clases/database.php";

$filtro = $_GET["filtro"];
$mes = $_GET["mes"];
$anio = $_GET["anio"];
$valor = $_GET["valor"];
$_SESSION["anio"] = $anio;

$i = 0;
$sucursales = 0;
$central = 0;			
$usuarios = 0;						
$general = 0;	
$total_sector = 0;

$db = new database();
$db->conectar();

if($valor == "anual")
	{
	//$consulta = "SELECT * FROM consumoscel WHERE anio = '$anio';";
	$consulta = "SELECT id, nombre, sector, SUM(total_fijos_variables) as Total FROM consumoscel WHERE anio = '$anio' GROUP BY nombre;";
	$consulta_gral = "SELECT * FROM consumoscel WHERE anio = '$anio';";
	$consulta_suc = "SELECT * FROM consumoscel WHERE sector = 'Sucursales' AND anio = '$anio';";
	$consulta_cen = "SELECT * FROM consumoscel WHERE sector LIKE '%Central%' AND anio = '$anio';";
	$consulta_usu = "SELECT * FROM consumoscel WHERE sector != '%Central' AND sector != 'Sucursales' AND anio = '$anio';";
	$consulta_sec = "SELECT * FROM consumoscel WHERE sector = '$filtro' AND anio = '$anio'";
	$mostrar_fecha = $anio;
	}
	else if ($valor == "0")
		{
		$consulta = "SELECT * FROM consumoscel WHERE sector = '$filtro' AND mes = '$mes' AND anio = '$anio';";
		$consulta_gral = "SELECT * FROM consumoscel WHERE mes = '$mes' AND anio = '$anio';";
		$consulta_suc = "SELECT * FROM consumoscel WHERE sector = 'Sucursales' AND mes = '$mes' AND anio = '$anio';";
		$consulta_cen = "SELECT * FROM consumoscel WHERE sector LIKE '%Central%' AND mes = '$mes' AND anio = '$anio';";
		$consulta_usu = "SELECT * FROM consumoscel WHERE sector != '%Central' AND sector != 'Sucursales' AND mes = '$mes' AND anio = '$anio';";
		$consulta_sec = "SELECT * FROM consumoscel WHERE sector = '$filtro' AND mes = '$mes' AND anio = '$anio';";
		$mostrar_fecha = "$mes-$anio";
		}

if($filtro == "Completo")
	{
	if($valor == "0")
		{
		$consulta = "SELECT * FROM consumoscel WHERE mes = '$mes' AND anio = '$anio';";
		}
		else{
			//$consulta = "SELECT * FROM consumoscel WHERE anio = '$anio';";
			$consulta = "SELECT id, nombre, sector, SUM(total_fijos_variables) as Total FROM consumoscel WHERE anio = '$anio' GROUP BY nombre;";	
			}
	}
	else if($filtro == "Usuarios")
		{
		if($valor == "0")
			{	
			$consulta = "SELECT * FROM consumoscel WHERE sector != '%Central' AND sector != 'Sucursales' AND mes = '$mes' AND anio = '$anio';";
			}
			else{
				$consulta = "SELECT id, nombre, sector, SUM(total_fijos_variables) as Total FROM consumoscel WHERE sector != '%Central' AND sector != 'Sucursales' AND anio = '$anio' GROUP BY nombre;";
				}
		}
		
//total general 
$resultado = mysqli_query($db->conexion, $consulta_gral)
or die ("Fallo la consulta, no se pueden mostrar los consumos totales");
while($ver = mysqli_fetch_assoc($resultado))
	{
	$general+=$ver['total_fijos_variables'];
	}	
	
//total sucursales 
$resultado = mysqli_query($db->conexion, $consulta_suc)
or die ("Fallo la consulta, no se pueden mostrar los consumos de Sucursales");
while($ver = mysqli_fetch_assoc($resultado))
	{
	$sucursales+=$ver['total_fijos_variables'];
	}
	
//total central 
$resultado = mysqli_query($db->conexion, $consulta_cen)
or die ("Fallo la consulta, no se pueden mostrar los consumos de Casa Central");
while($ver = mysqli_fetch_assoc($resultado))
	{
	$central+=$ver['total_fijos_variables'];
	}
	
//total usuarios 
$resultado = mysqli_query($db->conexion, $consulta_usu)
or die ("Fallo la consulta, no se pueden mostrar los consumos de usuarios");
while($ver = mysqli_fetch_assoc($resultado))
	{
	$usuarios+=$ver['total_fijos_variables'];
	}
				
//total por sector
$result_sec = mysqli_query($db->conexion, $consulta_sec)
or die ("Fallo la consulta, no se pueden mostrar los consumos por sector");
while($ver = mysqli_fetch_assoc($result_sec))
	{
	$total_sector+=$ver['total_fijos_variables'];
	}		
		
echo '
	<br>
	<div class="row">
		<div class="col-sm-2 col-md-2 text-left"> 
			<select type = "text" class="form-control" id = "filtro">
				<option value="Completo"> Completo </option>
				<option value="Sucursales"> Sucursales </option>
				<option value="Central"> Central </option>
				<option value="Usuarios"> Usuarios </option>
				<option value="Desarrollo"> Desarrollo </option>
				<option value="Vans"> Vans </option>
				<option value="Inyectora"> Inyectora </option>
				<option value="Deposito"> Deposito </option>
				<option value="Olympikus"> Olympikus </option>
				<option value="Tesoreria"> Tesoreria </option>
				<option value="Mayoristas"> Mayoristas </option>
				<option value="Imagen"> Imagen </option>
				<option value="Sourcing"> Sourcing </option>
				<option value="Ecommerce"> Ecommerce </option>
				<option value="Direccion"> Direccion </option>
				<option value="Franquicias"> Franquicias </option>
				<option value="TNF"> TNF </option>
				<option value="Minorista"> Minorista </option>
				<option value="Personal"> Personal </option>
				<option value="Planning"> Planning </option>
				<option value="Fabrica"> Fabrica </option>
				<option value="Sistemas"> Sistemas </option>
				<option value="PEF"> PEF </option>
				<option value="Keds"> Keds </option>
				<option value="RRHH"> RRHH </option>
				<option value="Auditoria"> Auditoria </option>
				<option value="San Martin"> San Martin </option>
			</select>	
			<select type = "text" class="form-control" id = "mes">				
				<option value="01"> Enero </option>
				<option value="02"> Febrero </option>
				<option value="03"> Marzo </option>
				<option value="04"> Abril </option>
				<option value="05"> Mayo </option>
				<option value="06"> Junio </option>
				<option value="07"> Julio </option>
				<option value="08"> Agosto </option>
				<option value="09"> Septiembre </option>
				<option value="10"> Octubre </option>
				<option value="11"> Noviembre </option>
				<option value="12"> Diciembre </option>					
			</select>
			<select type = "text" class="form-control" id = "anio">
				<option value="2016"> 2016	</option>
				<option value="2017"> 2017 </option>
			</select>			
		</div>
		
		<div class="col-sm-1 col-md-1 text-left"> 			
			<button class="btn btn-default" onclick="filtrar(0)"> Filtrar </button>			
			<button class="btn btn-default" onclick="consumosCel(1)"> Ver todo </button>
			<button class="btn btn-default" onclick="filtrar(this.value)" value="anual"> Anual </button>			
		</div>
		
		<div class="col-sm-5 col-md-5 text-left"> 
			<table class="table table-condensed">
				<thead class="text-center">
					<tr>
						<th>Totales</th>
						<th>'.$mostrar_fecha.'</th>	
					</tr>
				</thead>

				<tbody>
					<tr>			
						<td><b> Sucursales </b></td>
						<td> $'.$sucursales.' </td>
						<td><b> Central </b></td>
						<td> $'.$central.' </td>
						<td><b> Usuarios </b></td>
						<td> $'.$usuarios.'</td>
						<td><b> General </b></td>
						<td> $'.$general.' </td>					
					</tr>							
				</tbody>
			</table> 	
		</div>
		
		<div class="col-sm-1 col-md-1 text-left"> 
			<table class="table table-condensed">
				<thead class="text-center">
					<tr>
						<th> Total sector </th>						
					</tr>
					<tr>						
						<th> '.$filtro.' </th>
					</tr>
				</thead>

				<tbody>
					<tr>									
						<td> $'.$total_sector.' </td>					
					</tr>							
				</tbody>
			</table> 	
		</div>
		
		<div class="col-sm-1 col-md-2"> 			
			<button class="btn btn-info" onclick=""> Generar PDF </button>			
			<button class="btn btn-info" onclick=""> Estadisticas </button>					
		</div>
		
	</div>
	';

//imprime resumen anual por sector
if($valor=="anual")
	{
	//carga en un array todos los centros de costo
	$sectores = "SELECT DISTINCT sector FROM consumoscel;";
	$resultado = mysqli_query($db->conexion, $sectores)
	or die ("Fallo la consulta, no se pueden mostrar los consumos totales");
	while($ver = mysqli_fetch_assoc($resultado))
		{
		$centro_costos[$i] = $ver['sector'];
		$i++;
		}
		
	//calcula todos los totales anuales por centro de costos	
	foreach($centro_costos as $sector)
		{
		$total_sector=0;
		$consulta_sec = "SELECT * FROM consumoscel WHERE sector = '$sector' AND anio = '$anio';";
		$result_sec = mysqli_query($db->conexion, $consulta_sec)
		or die ("Fallo la consulta, no se pueden mostrar los consumos por sector");
		while($ver = mysqli_fetch_assoc($result_sec))
			{
			$total_sector+=$ver['total_fijos_variables'];		
			}
		echo '<div class="col-sm-1 col-md-2"><b>'.$sector.'</b>'.' $'.$total_sector.'</div>';							
		}	
	}

$resultado = mysqli_query($db->conexion, $consulta) 
or die ("Fallo la consulta, no se pudo filtrar.");
if($valor=="anual")
	{
	echo '
	<div class="col-md-12 text-left" id = "lista"> 
		<table class="table table-condensed">
			<thead class="text-center">
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Centro de costo</th>				
					<th>Total cargos fijos y variables</th>
					<th>
						<select type = "text" class="form-control" onchange="ordenar(this.value)">
							<option value=""> Ordenar </option>
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
	}//si la consulta no es anual:
	else
		{
		echo '
		<div class="col-md-6 text-left" id = "lista">
			<table class="table table-condensed">
				<thead class="text-center">
					<tr>
						<th>ID</th>
						<th>Nombre</th>
						<th>Centro de costo</th>
						<th>Plan</th>
						<th>Linea</th>
						<th>Plan de voz</th>
						<th>Servicio de voz</th>
						<th>Pack SMS</th>
						<th>Pack Datos</th>
						<th>Garantia</th>
						<th>Otros servicios</th>
						<th>Total cargos fijos</th>
						<th>Voz</th>
						<th>Red Local LDN-LDI</th>
						<th>Mensajes y contenidos</th>
						<th>Datos</th>
						<th>Roaming</th>
						<th>Otros cargos</th>
						<th>Total cargos variables</th>
						<th>Cargos por &uacute;nica vez</th>
						<th>Total cargos fijos y variables</th>
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
							<td>'.$ver['plan'].'</td>
							<td>'.$ver['linea'].'</td>
							<td>$'.$ver['plan_voz'].'</td>
							<td>$'.$ver['servicio_voz'].'</td>
							<td>$'.$ver['pack_sms'].'</td>
							<td>$'.$ver['pack_datos'].'</td>
							<td>$'.$ver['garantia'].'</td>
							<td>$'.$ver['otros_servicios'].'</td>
							<td>$'.$ver['total_fijos'].'</td>
							<td>$'.$ver['voz'].'</td>
							<td>$'.$ver['red'].'</td>
							<td>$'.$ver['mensajes'].'</td>
							<td>$'.$ver['datos'].'</td>
							<td>$'.$ver['roaming'].'</td>
							<td>$'.$ver['otros_cargos'].'</td>
							<td>$'.$ver['total_variables'].'</td>
							<td>$'.$ver['unica_vez'].'</td>
							<td>$'.$ver['total_fijos_variables'].'</td>
						</tr>												
						';
					}
		}
		
	echo '
			</tbody>
		</table> 
	</div>
	';
	
$db->close();

?>