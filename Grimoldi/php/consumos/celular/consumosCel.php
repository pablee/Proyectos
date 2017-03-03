<?php
session_start();

date_default_timezone_set('America/Argentina/Buenos_Aires');
setlocale (LC_TIME,"spanish");

if(strftime("%m")=="1")
	{
	$mes = "12";
	$anio = (strftime("%Y"))-1;	
	}
	else{
		$mes = (strftime("%m"))-1;
		$anio = strftime("%Y");				
		}

include "../../../clases/database.php";

$db = new database();
$db->conectar();
$_SESSION['sucursales'] = 0;
$_SESSION['central'] = 0;
$_SESSION['usuarios'] = 0;
$_SESSION['general'] = 0;

$select = 	"SELECT CEL.id, CEL.nombre, CEL.sector, CEL.plan, CEL.linea, CON.plan_voz, CON.servicio_voz, CON.pack_sms, CON.pack_datos, CON.garantia, CON.otros_servicios, CON.total_fijos, CON.voz,
			CON.red, CON.mensajes, CON.datos, CON.roaming, CON.otros_cargos, CON.total_variables, CON.unica_vez, CON.total_fijos_variables
			FROM celulares as CEL, consumoscel as CON
			WHERE CEL.linea = CON.linea ";
			
$consulta = $select." AND mes = '$mes' AND anio = '$anio';";

//total general 
$resultado = mysqli_query($db->conexion, $consulta)
or die ("Fallo la consulta, no se pueden mostrar los consumos totales");
while($ver = mysqli_fetch_assoc($resultado))
	{
	$_SESSION['general']+=$ver['total_fijos_variables'];
	}

//total sucursales 
$resultado = mysqli_query($db->conexion, $select." AND sector = 'Sucursales' AND mes = '$mes' and anio = '$anio';")
or die ("Fallo la consulta, no se pueden mostrar los consumos de Sucursales");
while($ver = mysqli_fetch_assoc($resultado))
	{
	$_SESSION['sucursales']+=$ver['total_fijos_variables'];
	}
	
//total central 
$resultado = mysqli_query($db->conexion, $select." AND sector LIKE '%Central%' AND mes = '$mes' and anio = '$anio';")
or die ("Fallo la consulta, no se pueden mostrar los consumos de Casa Central");
while($ver = mysqli_fetch_assoc($resultado))
	{
	$_SESSION['central']+=$ver['total_fijos_variables'];
	}
	
//total usuarios 
$resultado = mysqli_query($db->conexion,  $select." AND sector != 'Casa Central' AND sector != 'Sucursales' AND mes = '$mes' and anio = '$anio';")
or die ("Fallo la consulta, no se pueden mostrar los consumos de usuarios");
while($ver = mysqli_fetch_assoc($resultado))
	{
	$_SESSION['usuarios']+=$ver['total_fijos_variables'];
	}

	
$resultado = mysqli_query($db->conexion, $consulta)
or die ("Fallo la consulta, no se pueden mostrar los consumos");
	
echo '
	<br>
	<div class="row">
		<div class="col-sm-2 col-md-2 text-left"> 
			<select type = "text" class="form-control" id = "filtro">
				<option value=""> Sector </option>		
				<option value="Auditoria"> Auditoria </option>		
				<option value="Central"> Central </option>		
				<option value="Completo"> Completo </option>		
				<option value="Deposito"> Deposito </option>		
				<option value="Desarrollo"> Desarrollo </option>		
				<option value="Direccion"> Direccion </option>		
				<option value="Ecommerce"> Ecommerce </option>		
				<option value="Fabrica"> Fabrica </option>		
				<option value="Franquicias"> Franquicias </option>		
				<option value="Imagen"> Imagen </option>		
				<option value="Inyectora"> Inyectora </option>		
				<option value="Keds"> Keds </option>		
				<option value="Mayoristas"> Mayoristas </option>		
				<option value="Minorista"> Minorista </option>		
				<option value="Olympikus"> Olympikus </option>		
				<option value="PEF"> PEF </option>		
				<option value="Personal"> Personal </option>		
				<option value="Planning"> Planning </option>		
				<option value="RRHH"> RRHH </option>		
				<option value="San Martin"> San Martin </option>		
				<option value="Sistemas"> Sistemas </option>		
				<option value="Sourcing"> Sourcing </option>		
				<option value="Sucursales"> Sucursales </option>		
				<option value="Tesoreria"> Tesoreria </option>		
				<option value="TNF"> TNF </option>		
				<option value="Usuarios"> Usuarios </option>		
				<option value="Vans"> Vans </option>		
			</select>
			<select type = "text" class="form-control" id="mes">
				<option value=""> Mes </option>		
				<option value="1"> Enero </option>	
				<option value="2"> Febrero </option>
				<option value="3"> Marzo </option>
				<option value="4"> Abril </option>
				<option value="5"> Mayo </option>
				<option value="6"> Junio </option>
				<option value="7"> Julio </option>
				<option value="8"> Agosto </option>
				<option value="9"> Septiembre </option>
				<option value="10"> Octubre </option>
				<option value="11"> Noviembre </option>
				<option value="12"> Diciembre </option>				
			</select>
			<select type = "text" class="form-control" id = "anio">
				<option value="2017"> 2017 </option>
				<option value="2016"> 2016 </option>				
			</select>		
		</div>
		
		<div class="col-sm-1 col-md-1 text-left"> 			
			<button class="btn btn-default" onclick="filtrar(0)"> Filtrar </button>
			<button class="btn btn-default" onclick="filtrar(this.value)" value="anual"> Anual </button>
			<button class="btn btn-default" onclick="consumosCel(1)"> Ver todo </button>
		</div>
		
		<div class="row table-responsive">	
			<div class="col-sm-1 col-md-5"> 	
				<table class="table table-condensed">
					<thead class="text-center">
						<tr>
							<th>Totales</th>
							<th>'.$mes.'-'.$anio.'</th>	
						</tr>
					</thead>

					<tbody>
						<tr>			
							<td><b> Sucursales </b></td>
							<td> $'.$_SESSION['sucursales'].' </td>
							<td><b> Central </b></td>
							<td> $'.$_SESSION['central'].' </td>
							<td><b> Usuarios </b></td>
							<td> $'.$_SESSION['usuarios'].' </td>
							<td><b> General </b></td>
							<td> $'.$_SESSION['general'].' </td>		
						</tr>							
					</tbody>
				</table> 	
			</div>
		</div>
		
		<div class="col-sm-1 col-md-2"> 	
			<button class="btn btn-info" onclick=""> Generar PDF </button>						
			<button class="btn btn-info" onclick=""> Estadisticas </button>							
		</div>				
	</div>
	';
	
echo '
	<div class="row">	
		<div class="col-sm-6 col-md-12"> 
			<div id="listado"> 
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
	
	echo '
					</tbody>
				</table> 
			</div>	
		</div>
	</div>	
	';

$db->close();

?>