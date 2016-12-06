<!DOCTYPE html>
<html lang="en">
<head>
	<title>Intranet 2.0</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!--La hoja personalizada de estilos tiene que ir despues de la de bootstrap-->
	<link rel="stylesheet" href="estilos.css">
  
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<?php
		date_default_timezone_set('America/Argentina/Buenos_Aires');
		setlocale (LC_TIME,"spanish");
		$fecha = date("Y-m-d H:i:s");
		$fecha2 = strftime("%A %e de %B");	
	?>

</head>

<body> 
		
	<div class="container-fluid">
		<div class="row">							
				<!--Logo-->
				<div class="col-sm-8 grimoldi"> 
					<p>GRIMOLDI</p>
				</div>
				<div class="col-sm-2 perfil">
					<p class="bottomright">Usuario</p>
				</div>	
				<div class="col-sm-2 perfil">	
					<p class="bottomright">Hoy es 	
											<?php 
											echo $fecha2
											?> 
					</p>
				</div>
		
				<!--Barra de navegacion-->
				<nav class="col-sm-12 navbar navbar-default">
					<div class="container-fluid">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>                        
							</button>
							<a class="navbar-brand" href=""></a>
						</div>
						
						<ul class="nav navbar-nav">
							<li>
								<a href="home.php">Home</a>
							</li>
							
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">
									Usuarios
									<span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
									<li><a href="#">Home</a></li>
									<li><a href="#">Usuarios</a></li>
									<li><a href="#">Proyectos</a></li>
									<li><a href="#">Contacto</a></li>
								</ul>
							</li>
							
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">
									Administrar
									<span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
								  <li><a href="#">Page 1-1</a></li>
								  <li><a href="#">Page 1-2</a></li>
								  <li><a href="#">Page 1-3</a></li>
								</ul>
							</li>
							
							<li><a href="#">Proyectos</a></li>
							<li><a href="#">Contacto</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Logout </a></li>
						</ul>
					</div>
				</nav>
		</div>
		
		<!--Menu, contenido y ADS-->
		<div class="row text-center">
				
				<div class="col-sm-2 sidenav" style="border: 10px solid #fff">
					<p><input type = "submit" class="btn btn-default btn-block" value = "Pcs Grimoldi"></input></p>
					<p><input type = "submit" class="btn btn-default btn-block" value = "Equipos e insumos"></input></p>
					<p><input type = "submit" class="btn btn-default btn-block" value = "Telefonia"></input></p>
					<p><input type = "submit" class="btn btn-default btn-block" value = "Gastos"></input></p>
					<p><input type = "submit" class="btn btn-default btn-block" value = "Internos"></input></p>
					<p><input type = "submit" class="btn btn-info btn-block" value = "Pcs Grimoldi"></input></p>
					<p><input type = "submit" class="btn btn-info btn-block" value = "Equipos e insumos"></input></p>
					<p><input type = "submit" class="btn btn-info btn-block" value = "Reportes"></input></p>
				</div>
				
				<!--Contenido-->
				<div class="col-sm-8 text-left"> 
					<?php
					
					?>
					<div class="col-sm-6 text-left">
						<form method = "GET" action = "agregarCel.php">
							<table class="table table-condensed">
								<thead>
									<tr>
										<td><h3>Datos de la nueva linea</h3></td>
									</tr>	
								</thead>
									
							<tbody>
								<tr>
									<td><label for="nombre">Nombre y apellido</label></td>
									<td><input type = "text" name = "nombre" id = "nombre"></input></td>
								</tr>
								
								<tr>
									<td><label for="linea">Numero de linea</label></td>
									<td><input type = "text" name = "linea" id = "linea"></input></td>
								</tr>
								
								<tr>
									<td><label for="sector">Centro de costo</label></td>
									<td><input type = "text" name = "sector" id = "sector"></input></td>
								</tr>
								
								<tr>	
									<td><label for="modelo">Modelo de celular</label></td>
									<td><input type = "text" name = "modelo" id = "modelo"></input></td>
								</tr>
								
								<tr>
									<td><label for="propietario">Propietario del equipo</label></td>
									<td><input type = "text" name = "propietario" id = "propietario"></input></td>
								</tr>
								
								<tr>
									<td><label for="mail">Mail</label></td>
									<td><input type = "text" name = "mail" id = "mail"></input></td>
								</tr>
								
								<tr>
									<td><label for="clave">Clave de correo</label></td>
									<td><input type = "text" name = "clave" id = "clave"></input></td>
								</tr>
								
								<tr>
									<td><label for="plan">Plan telefonico</label></td>
									<td><input type = "text" name = "plan" id = "plan"></input></td>
								</tr>
								
								<tr>
									<td><label for="servicio_adicional">Servicios adicionales</label></td>
									<td><input type = "text" name = "servicio_adicional" id = "servicio_adicional"></input></td>
								</tr>
								
								<tr>
									<td><label for="datos">Plan de datos</label></td>
									<td><input type = "text" name = "datos" id = "datos"></input></td>
								</tr>
								
								<tr>
									<td><label for="minutos_libres">Minutos libres</label></td>
									<td><input type = "text" name = "minutos_libres" id = "minutos_libres"></input></td>
								</tr>
								
								<tr>
									<td><label for="detalles">Detalles del equipo</label></td>
									<td><input type = "text" name = "detalles" id = "detalles"></input></td>
								</tr>
								
								<tr>
									<td><label for="observaciones">Observaciones</label></td>
									<td><input type = "text" name = "observaciones" id = "observaciones"></input></td>
								</tr>
								
								<tr>
									<td></td>
									<td><input class="btn btn-info" type = "submit" value = "Agregar"></input></td>
								</tr>									
							</tbody>
						</form>
					</div>

					<div class="col-sm-6 text-left">
						<form method = "POST" action = "borrarCel.php">
							<table class="table table-condensed">
								<thead>
									<tr>
										<td><h3>Modificar registro</h3></td>
									</tr>	
								</thead>
									
							<tbody>
								<tr>
									<td><label for="nombre">Nombre y apellido</label></td>
									<td><input type = "text" name = "nombre" id = "nombre"></input></td>
								</tr>
								
								<tr>
									<td><label for="linea">Numero de linea</label></td>
									<td><input type = "text" name = "linea" id = "linea"></input></td>
								</tr>

								<tr>
									<td></td>
									<td><input class="btn btn-info" type = "submit" value = "Buscar"></input></td>
								</tr>									
							</tbody>
						</form>
					</div>					
					
					<div class="col-sm-6 text-left">
						<form method = "POST" action = "borrarCel.php">
							<table class="table table-condensed">
								<thead>
									<tr>
										<td><h3>Eliminar registro</h3></td>
									</tr>	
								</thead>
									
							<tbody>
								<tr>
									<td><label for="nombre">Nombre y apellido</label></td>
									<td><input type = "text" name = "nombre" id = "nombre"></input></td>
								</tr>
								
								<tr>
									<td><label for="linea">Numero de linea</label></td>
									<td><input type = "text" name = "linea" id = "linea"></input></td>
								</tr>
								
								<tr>
									<td><label for="mail">Mail</label></td>
									<td><input type = "text" name = "mail" id = "mail"></input></td>
								</tr>

								<tr>
									<td></td>
									<td><input class="btn btn-info" type = "submit" value = "Borrar"></input></td>
								</tr>									
							</tbody>
						</form>
					</div>

		</div>		
	</div>
	
		<!--Pie de Pagina-->
		<div class="container text-center">    
			<div class="row">
				<div class="col-sm-12"> 
					<footer class="container text-center">
						<p>Intranet 2.0</p>
					</footer>
				</div>
			</div>
		</div>
	
		

</body>
</html>
