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
$select = 	"SELECT CEL.id, CEL.nombre, CEL.sector, CEL.plan, CON.linea, CON.plan_voz, CON.servicio_voz, CON.pack_sms, CON.pack_datos, CON.garantia, CON.otros_servicios, CON.total_fijos, CON.voz,
			CON.red, CON.mensajes, CON.datos, CON.roaming, CON.otros_cargos, CON.total_variables, CON.unica_vez, CON.total_fijos_variables
			FROM celulares as CEL
			RIGHT JOIN consumoscel as CON
			ON CEL.linea = CON.linea ";

if($filtro=="")
	{
	echo "<h2>Se debe seleccionar un sector.</h2>";	
	}
	else{			
		$db = new database();
		$db->conectar();

		if($valor == "anual")
			{
			//$consulta = "SELECT CEL.linea, CEL.nombre, CEL.sector, SUM(CON.total_fijos_variables) as Total FROM celulares as CEL, consumoscel as CON WHERE CEL.linea = CON.linea AND CEL.sector = '$filtro' AND CON.anio = '$anio' GROUP BY CEL.nombre";
			$consulta = "SELECT CON.linea, CEL.nombre, CEL.sector, SUM(CON.total_fijos_variables) as Total FROM celulares as CEL RIGHT JOIN consumoscel as CON ON CEL.linea = CON.linea WHERE CEL.sector = '$filtro' AND CON.anio = '$anio' GROUP BY CEL.nombre";
			$consulta_gral = $select." WHERE CON.anio = '$anio';";
			$consulta_suc = $select." WHERE CEL.sector = 'Sucursales' AND CON.anio = '$anio';";
			$consulta_cen = $select." WHERE CEL.sector LIKE '%Central%' AND CON.anio = '$anio';";
			$consulta_usu = $select." WHERE CEL.sector != '%Central' AND CEL.sector != 'Sucursales' AND CON.anio = '$anio';";
			$consulta_sec = $select." WHERE CEL.sector = '$filtro' AND CON.anio = '$anio'";
			$mostrar_fecha = $anio;
			}
			else if ($valor == "0")
				{
				$consulta = $select." WHERE CEL.sector = '$filtro' AND CON.mes = '$mes' AND CON.anio = '$anio';";
				$consulta_gral = $select." WHERE CON.mes = '$mes' AND CON.anio = '$anio';";
				$consulta_suc = $select." WHERE CEL.sector = 'Sucursales' AND CON.mes = '$mes' AND CON.anio = '$anio';";
				$consulta_cen = $select." WHERE CEL.sector LIKE '%Central%' AND CON.mes = '$mes' AND CON.anio = '$anio';";
				$consulta_usu = $select." WHERE CEL.sector != '%Central' AND CEL.sector != 'Sucursales' AND CON.mes = '$mes' AND CON.anio = '$anio';";
				$consulta_sec = $select." WHERE CEL.sector = '$filtro' AND CON.mes = '$mes' AND CON.anio = '$anio';";
				$mostrar_fecha = "$mes-$anio";
				}

		if($filtro == "Completo")
			{
			if($valor == "0")
				{
				$consulta = $select." WHERE CON.mes = '$mes' AND CON.anio = '$anio';";
				}
				else{			
					//$consulta = "SELECT CEL.id, CEL.linea, CEL.nombre, CEL.sector, SUM(CON.total_fijos_variables) as Total FROM celulares as CEL, consumoscel as CON WHERE CEL.linea = CON.linea AND CON.anio = '$anio' GROUP BY CEL.nombre";
					$consulta = "SELECT CEL.id, CON.linea, CEL.nombre, CEL.sector, SUM(CON.total_fijos_variables) as Total FROM celulares as CEL RIGHT JOIN consumoscel as CON ON CEL.linea = CON.linea WHERE CON.anio = '$anio' GROUP BY CON.linea ORDER BY CEL.id";
					}
			}
			else if($filtro == "Usuarios")
				{
				if($valor == "0")
					{	
					$consulta = $select." WHERE CEL.sector != '%Central' AND CEL.sector != 'Sucursales' AND CON.mes = '$mes' AND CON.anio = '$anio';";
					}
					else{
						//$consulta = "SELECT CEL.id, CEL.nombre, CEL.sector, SUM(CON.total_fijos_variables) as Total FROM celulares as CEL, consumoscel as CON WHERE CEL.sector != '%Central' AND CEL.sector != 'Sucursales' AND CON.anio = '$anio' GROUP BY CEL.nombre;";	
						$consulta = "SELECT CEL.id, CEL.nombre, CEL.sector, SUM(CON.total_fijos_variables) as Total FROM celulares as CEL, consumoscel as CON WHERE CEL.sector != '%Central' AND CEL.sector != 'Sucursales' AND CON.anio = '$anio' GROUP BY CON.linea ORDER BY CEL.id;";	
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
		or die ("Fallo la consulta, no se pueden mostrar los consumos por CEL.sector");
		while($ver = mysqli_fetch_assoc($result_sec))
			{
			$total_sector+=$ver['total_fijos_variables'];
			}		
				
		echo '
			<br>
			<div class="row table-responsive">	
				<div class="col-sm-1 col-md-5"> 	
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
								<td><b>'.$filtro.'</b></td>
								<td> $'.$total_sector.' </td>		
							</tr>							
						</tbody>
					</table> 
				</div>
			</div>				
			';

		//imprime resumen anual por sector
		if($valor=="anual")
			{
			//carga en un array todos los centros de costo
			$sectores = "SELECT DISTINCT sector FROM celulares;";
			$resultado = mysqli_query($db->conexion, $sectores)
			or die ("Fallo la consulta, no se pueden mostrar los consumos totales por sector");
			while($ver = mysqli_fetch_assoc($resultado))
				{
				$centro_costos[$i] = $ver['sector'];
				$i++;
				}
			
			//calcula todos los totales anuales por centro de costos	
			echo '
				<div class="row">
					<div class="col-sm-1 col-md-10">
				';	
			foreach($centro_costos as $sector)
				{
				$total_sector=0;
				//$consulta_sec = "SELECT * FROM celulares as CEL, consumoscel as CON WHERE CEL.linea=CON.linea AND CEL.sector = '$sector' AND CON.anio = '$anio';";
				$consulta_sec = "SELECT * FROM celulares as CEL JOIN consumoscel as CON ON CEL.linea=CON.linea AND CEL.sector = '$sector' AND CON.anio = '$anio';";
				$result_sec = mysqli_query($db->conexion, $consulta_sec)
				or die ("Fallo la consulta, no se pueden mostrar los consumos por sector");
				while($ver = mysqli_fetch_assoc($result_sec))
					{
					$total_sector+=$ver['total_fijos_variables'];		
					}
				echo '<div class="col-sm-1 col-md-2"><b>'.$sector.'</b>'.' $'.$total_sector.'</div>';							
				}	
				
			echo '
					</div>
				</div>
				';	
			}

		$resultado = mysqli_query($db->conexion, $consulta) 
		or die ("Fallo la consulta, no se pudo filtrar.");
		if($valor=="anual")
			{//ordenar por filtro
			echo '
			<!--Filtro ordenar-->
			<br>
			<div class="row">
				<div class="col-sm-4 col-md-4 text-left"> 	
					<select type = "text" class="form-control" onchange="ordenar(this.value)">
						<option value=""> Ordenar </option>
						<option value="linea"> Linea </option>
						<option value="nombre"> Nombre </option>}
						<option value="sector"> Sector </option>
						<option value="consumo_asc"> Consumo ASC </option>
						<option value="consumo_desc"> Consumo DESC </option>
					</select>	
				</div>	
			</div>	
			
			<br>
			
			<div class="row">
			<div class="col-md-10 text-left" id = "lista"> 
				<table class="table table-condensed">
					<thead class="text-center">
						<tr>
							<th>Linea</th>
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
			}//si la consulta no es anual:
			else
				{
				echo '
				<div class="row">
				<div class="col-md-12 text-left" id = "lista">
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
			</div>
			';
			
		$db->close();
		}
?>