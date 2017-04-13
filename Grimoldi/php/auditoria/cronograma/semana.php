<?php
session_start();
include "../../../clases/database.php";
include "../../../clases/auditoria.php";

$id=$_GET["id"];

if(isset($_GET["accion"]))
	{
	$accion=$_GET["accion"];
	}
	else 
		{//pasar la fecha tambien y verificar que no sea "". En caso de serlo no se guarda el local si la fecha existe se guarda.
		$accion=false;
		$_SESSION["locales"][$_SESSION["i"]]=$id;
		$_SESSION["i"]+="1";
		}

	$db = new database();
	$db->conectar();

	$consulta ="SELECT *
				FROM locales as LOC
				WHERE LOC.id = '$id'					
				ORDER BY LOC.id ASC;";
				
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
			';
		
		if($accion=="sacarLocal")
			{
			//echo '<td> <input type="datetime-local" id="fecha_prox" name="fecha_prox"> </td>';
			}
			else{				
				//echo '<td> <input type="date" id="fecha_prox'.$ver["id"].'" onchange="fecha_prox('.$ver["id"].')"></input> </td>';			
				echo '<td> <input type="date" id="fecha_prox'.$ver["id"].'" class="form-control" onchange="habilitaHora('.$ver["id"].')"></input> </td>';			
				}	
			
		echo'	
				<td>
					<select id="hora'.$ver["id"].'" class="form-control" onchange="fecha_prox('.$ver["id"].')" disabled>
						<option value=""> Elija la hora </option>
						<option value="06:00"> 06:00 </option>
						<option value="07:00"> 07:00 </option>
						<option value="08:00"> 08:00 </option>
						<option value="09:00"> 09:00 </option>
						<option value="10:00"> 10:00 </option>
						<option value="11:00"> 11:00 </option>
						<option value="12:00"> 12:00 </option>
						<option value="13:00"> 13:00 </option>
						<option value="14:00"> 14:00 </option>
						<option value="15:00"> 15:00 </option>
						<option value="16:00"> 16:00 </option>
					</select> 
				</td>
				<td> * </td>
				<td> Telefono </td>
				<td> 
			';
		
		if($accion==false)
			{	
			echo'
				<button type="button" class="btn btn-danger btn-sm" value="'.$ver["id"].'" onclick="sacarLocal(this.value)">
					<span class="glyphicon glyphicon-remove"></span> 
				</button>				
				';	
			}
			
		if($accion=="sacarLocal")
			{
			echo'
				<button type="button" class="btn btn-info btn-sm" value ="'.$ver["id"].'" onclick="">
					<span class="glyphicon glyphicon-pencil"></span>  
				</button>
				
				<button type="button" class="btn btn-default btn-sm" value="'.$ver["id"].'" onclick="semanaLocal(this.value)">
					<span class="glyphicon glyphicon-plus"></span> Agregar
				</button>
				';
			
			for($k=0;$k<$_SESSION["i"];$k++)
				{	
				if($_SESSION["locales"][$k]==$ver["id"])
					{
					echo "id local: ".$ver["id"]." ";	
					//echo $_SESSION["fecha_prox"][$k];	
					echo "posicion array: ".$k."<br>";
					$_SESSION["locales"][$k]="vacio";					
					if(isset($_SESSION["fecha_prox"][$k]))
						{
						$_SESSION["fecha_prox"][$k]="sin fecha";							
						$_SESSION["hora"][$k]="sin hora";	
						echo $_SESSION["fecha_prox"][$k];	
						echo $_SESSION["hora"][$k];	
						}					
					//$_SESSION["fecha_prox"][$k]="sin fecha";							
					}
				}	
				
			}			
			
		echo'		
				</td>
			</tr>
			';							
		}

?>