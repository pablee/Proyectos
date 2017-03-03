<?php
session_start();
include "../../../clases/database.php";

$valor = $_GET["valor"];

if(isset($_GET["id"]))
	{
	$id = $_GET["id"];	
	}

if(isset($_GET["id_local"]))
	{
	$id_local = $_GET["id_local"];	
	}

if(isset($_GET["nombre"]))
	{
	$nombre = $_GET["nombre"];
	}

if(isset($_GET["controlador"]))
	{
	$controlador = $_GET["controlador"];
	}
	
if(isset($_GET["manual"]))
	{
	$manual = $_GET["manual"];
	}
	
if(isset($_GET["domicilio"]))
	{
	$domicilio = $_GET["domicilio"];
	}	
	
if(isset($_GET["ciudad"]))
	{
	$ciudad = $_GET["ciudad"];
	}		

if(isset($_GET["provincia"]))
	{
	$provincia = $_GET["provincia"];
	}		

/*
echo $valor;
echo $id_local;
echo $nombre;
echo $controlador;
echo $manual;
echo $domicilio;
echo $ciudad;
echo $provincia;
*/

$db = new database();
$db->conectar();
					
if($valor=="ingresarLocal")
	{
	$locales = "INSERT INTO locales(id, nombre, domicilio, ciudad, provincia, estado)					
				VALUES ('$id_local', '$nombre', '$domicilio', '$ciudad', '$provincia', TRUE);";
	$resultado_loc = mysqli_query($db->conexion, $locales)
	or die("No se pudo ingresar el nuevo local.");	
	
	$punto_venta = "INSERT INTO punto_venta(id_local, controlador, manual, estado)					
					VALUES ('$id_local', '$controlador', '$manual', TRUE);";	

	$resultado_pv = mysqli_query($db->conexion, $punto_venta)
	or die("No se pudo ingresar el punto de venta.");	
	}

if($valor=="ingresarPV")
	{
	$punto_venta = "INSERT INTO punto_venta(id_local, controlador, manual, estado)					
					VALUES ('$id_local', '$controlador', '$manual', TRUE);";	

	$resultado_pv = mysqli_query($db->conexion, $punto_venta)
	or die("No se pudo ingresar el punto de venta.");	
	}	
	
if($valor=="borrarLocal")
	{	
	$locales = "UPDATE locales SET estado = FALSE WHERE id = '$id_local'";
	$resultado_loc = mysqli_query($db->conexion, $locales)
	or die("No se pudo borrar el local.");	
	}

if($valor=="borrarPV")
	{	
	$pv = "UPDATE punto_venta SET estado = FALSE WHERE id = '$id'";
	$resultado_loc = mysqli_query($db->conexion, $pv)
	or die("No se pudo borrar el local.");	
	}
	
if($valor=="modificar")
	{	
	$locales = "UPDATE locales
				SET id='$id_local', nombre='$nombre', domicilio='$domicilio', ciudad='$ciudad', provincia='$provincia', estado = TRUE;";
	$resultado_loc = mysqli_query($db->conexion, $locales)
	or die("No se pudo actualizar el nuevo local.");	
	
	$punto_venta = "UPDATE punto_venta 
					SET id_local='$id_local', controlador='$controlador', manual='$manual');";	

	$resultado_pv = mysqli_query($db->conexion, $punto_venta)
	or die("No se pudo actualizar el punto de venta.");	
	}		

//listados			
echo'
	<br>
	<div class="row table-responsive">	
		<div class="col-sm-5 col-md-10"> 	
			<table class="table table-striped">
				<thead class="text-center">
	';
	
	if($valor=="local"||$valor=="agregarLocal"||$valor=="ingresarLocal")
		{	
		echo'
					<tr>
						<th> Sucursal </th>
						<th> Nombre </th>	
						<th> PV CF </th>	
						<th> PV M</th>						
						<th> Domicilio </th>	
						<th> Ciudad </th>
						<th> Provincia </th>
					</tr>
				</thead>

				<tbody>
			';
			
			if($valor=="agregarLocal")
				{
				echo'	
					<tr>													
						<td> <input type = "text" id="id_local"></input> </td>						
						<td> <input type = "text" id="nombre"></input> </td>
						<td> <input type = "text" id="controlador"></input> </td>
						<td> <input type = "text" id="manual"></input> </td>
						<td> <input type = "text" id="domicilio"></input> </td>
						<td> <input type = "text" id="ciudad"></input> </td>
						<td> <input type = "text" id="provincia"></input> </td>										
						<td> <button type = "button" class = "btn btn-info" value = "ingresarLocal" onclick = "ingresarLocal(this.value)"> Ingresar </button> </td>	
					</tr>
					';
				}
				
		$consulta ="SELECT * 
					FROM locales as LOC
					JOIN punto_venta as PV
					ON LOC.id = PV.id_local
					WHERE LOC.estado = TRUE
					AND PV.estado = TRUE
					ORDER BY LOC.id ASC;";
					
		$resultado = mysqli_query($db->conexion, $consulta)
		or die("No se pueden mostrar los puntos de venta.");	
		while($ver = mysqli_fetch_assoc($resultado))
			{
			echo'	
				<div id="prueba">
					<input type=text value="hola"></input>
					<tr>							
						<td> '.$ver["id_local"].' </td>						
						<td> '.$ver["nombre"].' </td>
						<td> '.$ver["controlador"].' </td>
						<td> '.$ver["manual"].' </td>
						<td> '.$ver["domicilio"].' </td>
						<td> '.$ver["ciudad"].' </td>							
						<td> '.$ver["provincia"].' </td>		
						<td> 
							<button type="button" class="btn btn-danger btn-sm" value ="'.$ver["id"].'" onclick = "borrarLocal(this.value)">
								<span class="glyphicon glyphicon-remove"></span> 
							</button>
							<button type="button" class="btn btn-info btn-sm" value ="'.$ver["id"].'" onclick = "editarLocal(this.value)">
								<span class="glyphicon glyphicon-pencil"></span>  
							</button>	
						</td>
					</tr>
				</div>
				';
			}				
		}
		else if($valor=="pv"||$valor=="agregarPV"||$valor=="ingresarPV")
			{
			echo'
					<tr>
						<th> Sucursal </th>						
						<th> PV CF </th>	
						<th> PV M</th>												
					</tr>
				</thead>

				<tbody>
			';
			
			if($valor=="agregarPV")
				{
				echo'	
					<tr>													
						<td> <input type = "text" id="id_local"></input> </td>											
						<td> <input type = "text" id="controlador"></input> </td>
						<td> <input type = "text" id="manual"></input> </td>									
						<td> <button type = "button" class = "btn btn-info" value = "ingresarPV" onclick = "ingresarPV(this.value)"> Ingresar </button> </td>	
					</tr>
					';
				}
				
			$consulta ="SELECT *
						FROM punto_venta as PV						
						WHERE PV.estado = TRUE
						ORDER BY PV.id ASC;";
			
			$resultado = mysqli_query($db->conexion, $consulta)
			or die("No se pueden mostrar los puntos de venta.");	
			while($ver = mysqli_fetch_assoc($resultado))
				{
				echo'	
						<tr>									
							<td> '.$ver["id_local"].' </td>													
							<td> '.$ver["controlador"].' </td>
							<td> '.$ver["manual"].' </td>
								
							<td> 
								<button type="button" class="btn btn-danger btn-sm" value ="'.$ver["id"].'" onclick = "borrarPV(this.value)">
									<span class="glyphicon glyphicon-remove"></span> 
								</button>
								<button type="button" class="btn btn-info btn-sm">
									<span class="glyphicon glyphicon-pencil"></span>  
							</button>			
							</td>
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
	
?>