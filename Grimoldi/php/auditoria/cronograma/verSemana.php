<?php
session_start();
include "../../../clases/database.php";

$id=$_GET["id"];

$db = new database();
$db->conectar();

// cambia el estado del local en la tabla semana, campo "terminado"
if($id!="false")
	{
	$cambiar_estado = "UPDATE semana SET terminado = TRUE WHERE id_local = '$id';";
	$resultado = mysqli_query($db->conexion, $cambiar_estado)
	or die("No se pudo cambiar el estado de local en semana.");
	}

$consulta ="SELECT *
			FROM semana SEM JOIN locales LOC 
			ON SEM.id_local = LOC.id
			WHERE fecha_prox > (CURDATE()-7)
			OR terminado = false;";
echo'
	<div class="row table-responsive">	
		<div class="col-sm-5 col-md-11"> 	
			<table class="table table-striped">
				<thead class="text-center">
					<tr>
						<th> ID </th>
						<th> Sucursal </th>
						<th> Domicilio </th>	
						<th> Fecha INV. ANT. </th>
						<th> Fecha Proxima </th>						
						<th> Hora </th>							
						<th> * </th>							
						<th> Telefono </th>
					</tr>
				</thead>
				
				<tbody id="semana">
			';				
			
$resultado = mysqli_query($db->conexion, $consulta)
or die("No se pueden mostrar los puntos de venta.");	
while($ver = mysqli_fetch_assoc($resultado))
	{
				echo'				
					<tr id="'.$ver["id"].'">																						
						<td> '.$ver["id"].' </td>
						<td> '.$ver["nombre"].' </td>										
						<td> '.$ver["domicilio"].', '.$ver["ciudad"].', '.$ver["provincia"].' </td>
						<td> Fecha ANT </td>		
						<td> '.$ver["fecha_prox"].' </td>		
						<th> '.$ver["hora"].' </th>	
						<td> * </td>
						<td> Telefono </td>
					';	
					
					if($ver["terminado"]==false)
						{
						echo'	
							<td> 
								<button type="button" class="btn btn-default btn-md" value="'.$ver["id"].'" onclick="verSemana(this.value)">
									<span class="glyphicon glyphicon-unchecked"></span> 
								</button>	
							</td>
							';
						}
						else{
							echo'
								<td> 
									<!--button type="button" class="btn btn-success btn-md" value="'.$ver["id"].'" onclick="verSemana(this.value)"-->
										<span class="glyphicon glyphicon-ok"></span> 
									<!--/button-->	
								</td>
								';
							}	
				echo'			
					</tr>
					';							
	}			

echo'							
				</tbody>
			</table> 
		</div>
	</div>
	';

?>