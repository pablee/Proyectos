<?php
session_start();
include "../../../clases/database.php";
include "../../../clases/auditoria.php";

$accion = $_GET["accion"];	
$db = new database();
$db->conectar();


if($accion=="guardar")
	{
	//mensaje mail
	$_SESSION["mensaje"]="";
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
				
	$k=0;			
	foreach($_SESSION["locales"] as $local)
		{
		$fecha_prox = $_SESSION["fecha_prox"][$k];
		$hora = $_SESSION["hora"][$k];
		
		$consulta ="SELECT *
					FROM locales as LOC
					WHERE LOC.id = '$local'					
					ORDER BY LOC.id ASC;";
		
		if($local!="vacio")
			{
			$resultado = mysqli_query($db->conexion, $consulta)
			or die("No se pueden mostrar los puntos de venta.");	
			while($ver = mysqli_fetch_assoc($resultado))
				{//mensaje guarda los datos para la tabla en el mail
				$_SESSION["mensaje"][$k]='<tr id="'.$ver["id"].'">																						
											<td> '.$ver["id"].' </td>
											<td> '.$ver["nombre"].' </td>										
											<td> '.$ver["domicilio"].', '.$ver["ciudad"].', '.$ver["provincia"].' </td>
											<td> Fecha ANT </td>							
											<td> '.$fecha_prox.' </td>		
											<th> '.$hora.' </th>	
											<td> * </td>	
											<td> Telefono </td>										
										</tr>
										';	 	
						echo'				
							<tr id="'.$ver["id"].'">																						
								<td> '.$ver["id"].' </td>
								<td> '.$ver["nombre"].' </td>										
								<td> '.$ver["domicilio"].', '.$ver["ciudad"].', '.$ver["provincia"].' </td>
								<td> Fecha ANT </td>							
								<td> '.$fecha_prox.' </td>							
								<td> '.$hora.' </td>	
								<td> * </td>
								<td> Telefono </td>							
							</tr>
							';							
				}
				
			//****GUARDAR SEMANA****
			$semana = "INSERT INTO semana(id_local, fecha_prox, hora, terminado) VALUES ('$local', '$fecha_prox', '$hora', 'false');";
			$resultado_loc = mysqli_query($db->conexion, $semana)
			or die("No se pudo guardar la semana.");		
			
			
			//CONTADOR ARRAY
			$k++;
			}
		
		}
		
	echo'							
					</tbody>
				</table> 
			</div>
		</div>
		';
		
	/*
	//*****PRUEBA DE ARRAY*****
	for($k=0;$k<$_SESSION["i"];$k++)
		{	
		echo "id local: ".$_SESSION["locales"][$k]." ";	
		echo $_SESSION["fecha_prox"][$k];	
		echo " / ";
		echo $_SESSION["hora"][$k];	
		echo " posicion arrray: ".$k."<br>";			
		}	
	*/	
	
	//boton enviar mail, guardar semana
	echo'
		<div class="row">
			<div class="col-sm-4 col-md-10">
			<form action="php/auditoria/cronograma/enviarMail.php" method="post">
				<h4> Destinatarios </h4>
				
				<div class="text-left">
					<div class="checkbox">
						<label><input type="checkbox" name="todos" value="true"> Todos </label>
						<br>
						<label><input type="checkbox" name="mail_1" value="lscaravilli@grimoldi.com, "> Luciano Scaravilli </label>
						<label><input type="checkbox" name="mail_2" value="mrocchia@grimoldi.com"> Manuel Rocchia </label>
						<label><input type="checkbox" name="mail_3" value="auditoriainterna@grimoldi.com"> Auditoria Interna </label>
						<br>
						<label><input type="checkbox" name="mail_4" value="erocchia@grimoldi.com"> Ezequiel Rocchia </label>
						<label><input type="checkbox" name="mail_5" value="cmarincovich@grimoldi.com"> Cristian Marincovich </label>
						<label><input type="checkbox" name="mail_6" value="drodriguez@mail.grimoldi.com.ar"> Diego Rodriguez </label>
						<br>
						<label><input type="checkbox" name="mail_7" value="jsierralta@mail.grimoldi.com.ar"> Jorgelina Sierralta </label>
						<label><input type="checkbox" name="mail_8" value="gzolezzi@ingematica.com.ar"> Gustavo Zolezzi </label>
					</div>
				</div>
				
				<textarea name="contenido" rows="4" cols="50"></textarea>
				<br>
				<button type="submit" class="btn btn-default">
					<span class="glyphicon glyphicon-envelope"></span> Enviar mail
				</button>			
			</form>
				<!--button type="button" class="btn btn-default " value="" onclick="">
					<span class="glyphicon glyphicon-floppy-disk"></span> Guardar semana
				</button-->			
			</div>
		</div>
		';	
			
	}//****PLANEAR SEMANA****//
	else{
		$consulta ="SELECT *
					FROM locales as LOC
					WHERE LOC.estado = TRUE					
					ORDER BY LOC.id ASC;";
					
		echo'
			<div class="row">
				<div class="col-sm-2 col-md-4">
					<button type="button" class="btn btn-info btn-sm" value="nuevaSemana" onclick="verCronograma(this.value)">
						<span class="glyphicon glyphicon-plus"></span> Planear semana 
					</button>			
				</div>
			</div>
			';

		if($accion=="nuevaSemana")
			{
			//contador y array que almacena los locales que se van a guardar para la semana	
			$_SESSION["i"]="0";	
			$_SESSION["j"]="0";	
			$_SESSION["locales"]="";	
			$_SESSION["fecha_prox"]="";	
			$_SESSION["hora"]="";		
			
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
			
			$consulta2="SELECT *
						FROM locales as LOC				
						ORDER BY LOC.id ASC;";	

			$resultado = mysqli_query($db->conexion, $consulta2)
			or die("No se pueden mostrar los puntos de venta.");	
			while($ver = mysqli_fetch_assoc($resultado))
				{
				echo'
					<tr id="semana'.$ver["id"].'">
					</tr>
					';
				}	
				
			echo'	
						</tbody>
					</table> 
				</div>
			</div>		
			
			<button type="button" class="btn btn-info btn-sm" value="guardar" onclick="verCronograma(this.value)">
				<span class="glyphicon glyphicon-plus"></span> Guardar semana 
			</button>
			';
			}					

			
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
								<!--th> Fecha Proxima </th-->
								<th> * </th>
								<th> Telefono </th>								
							</tr>
						</thead>
						
						<tbody>
			';			//listado de locales para agregar	
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
									<!--td> <input type="datetime-local" id="fecha_prox'.$ver["id"].'"> </td-->		
									<td> * </td>									
									<td> Telefono </td>									
									<td> 
										<!--button type="button" class="btn btn-danger btn-sm" value ="'.$ver["id"].'" onclick="">
											<span class="glyphicon glyphicon-remove"></span> 
										</button-->
										<button type="button" class="btn btn-info btn-sm" value ="'.$ver["id"].'" onclick="">
											<span class="glyphicon glyphicon-pencil"></span>  
										</button>
								';
								
								if($accion=="nuevaSemana")
									{
									echo'
										<button type="button" class="btn btn-default btn-sm" value="'.$ver["id"].'" onclick="semanaLocal(this.value)">
											<span class="glyphicon glyphicon-plus"></span> Agregar
										</button>
										';
									}
									
							echo'
									</td>
								</tr>							
								';							
							}
								
			echo'							
						</tbody>
					</table> 
				</div>
				';
		}
?>