<?php
	session_start();
	date_default_timezone_set('America/Argentina/Buenos_Aires');
	setlocale (LC_TIME,"spanish");
	$fecha = date("d-m-Y H:i:s");
	$fecha2 = strftime("%A %e de %B");

	if($_SESSION['login'] == FALSE)
		{
		header("location: index.php");	
		}
		
	$verSemana=false;
	if(isset($_GET["verSemana"]))
		{
		$verSemana=$_GET["verSemana"];
		}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Intranet 2.0</title>
	<!--meta http-equiv="Content-type" content="text/html; charset=utf-8"-->
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!--La hoja personalizada de estilos tiene que ir despues de la de bootstrap-->
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="jquery/jquery-ui.css">
	
	<script type="text/javascript" src="jquery/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="jquery/jquery-ui.js"></script>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>-->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="script/stock.js"></script>
	<script type="text/javascript" src="script/documentacion.js"></script>
	<script type="text/javascript" src="script/consumos.js"></script>
	<script type="text/javascript" src="script/celular.js"></script>
	<script type="text/javascript" src="script/calendario.js"></script>
	<script type="text/javascript" src="script/pagina.js"></script>
	<script type="text/javascript" src="script/impuestos.js"></script>
	<script type="text/javascript" src="script/graficos.js"></script>
	<script type="text/javascript" src="script/auditoria.js"></script>
	<script>/*
	function nuevaSemana()
			{	
			xhttp= new XMLHttpRequest();	
			xhttp.onreadystatechange = function()	
					{
					if (this.readyState == 4 && this.status == 200)
							{
							document.getElementById("semana").innerHTML=this.responseText;
							}
					};
							
			xhttp.open("GET", "php/auditoria/cronograma/semana.php", true);		
			xhttp.send();	
			}*/
	</script>		
</head>

<?php

if($verSemana==true)
	{
	$body="verSemana('false')";
	echo '<body onload="'.$body.'">';
	}
	else{
		echo '<body>'; 
		}

?>
	<div class="container-fluid">
		<div class="row">							
				<!--Logo-->
				<div class="col-sm-8 grimoldi"> 
					<p>GRIMOLDI</p>
				</div>
				<div class="col-sm-2 perfil">
					<p class="bottomright"> 
						<?php echo $_SESSION['nombre'] ?>			
					</p>
				</div>	
				<div class="col-sm-2 perfil">	
					<p class="bottomright">
						Hoy es	
						<?php echo $fecha2 ?> 
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
								<a class="dropdown-toggle" data-toggle="dropdown">
									Administracion
									<!--span class="caret"></span-->
								</a>
								<ul class="dropdown-menu">
									<li><a href="php/usuario/altaUsuario.php"> Computadoras </a></li>
									<li><a onclick=""></a>  </li>
									<li><a onclick=""></a>  </li>
								</ul>
							</li>
							
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown">
									Consumos
									<!--span class="caret"></span-->
								</a>
								<ul class="dropdown-menu">									
									<li class="dropdown-submenu">
										<a class="test" tabindex="-1" href="#"> 
											Gastos 
											<!--span class="caret"></span-->
										</a>
										<ul class="dropdown-menu">
										  <li><a tabindex="-1" href="php/consumos/gastos/nuevoConsumo.php"> Nuevo </a></li>
										  <li><a tabindex="-1" onclick="verConsumos('1')"> Ver </a></li>
										  <li><a tabindex="-1" onclick="formBorrar('1')"> Borrar </a></li>
										</ul>
									</li>
									<li class="dropdown-submenu">
										<a class="test" tabindex="-1" href="#"> 
											Celulares 
											<!--span class="caret"></span-->
										</a>
										<ul class="dropdown-menu">
											<li><a onclick="nuevoConsumo()"> Nuevo </a></li>
											<li><a onclick="consumosCel('1')"> Ver </a></li>
											<li><a tabindex="-1" onclick=""> Borrar </a></li>
										</ul>
									</li>
									
									<li><a href="#">Telefonia</a></li>
								</ul>
							</li>
							
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">
									Documentacion
									<!--span class="caret"></span-->
								</a>
								<ul class="dropdown-menu">
									<li><a href="php/usuario/altaUsuario.php">Usuarios</a></li>
									<li><a onclick="constancia('notebook')">Notebook</a></li>
									<li><a onclick="constancia('celular')">Celular</a></li>
								</ul>
							</li>
							
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">
									Stock
									<!--span class="caret"></span-->
								</a>
								<ul class="dropdown-menu">
									<li><a onclick="verStock('Disponible')">Disponible</a></li>
									<li><a onclick="verStock('Asignado')">Asignado</a></li>
									<li><a onclick="verStock('Completo')">Completo</a></li>
									<li><a onclick="nuevoIngreso()">Ingreso</a></li>
									<li><a onclick="verStock('Disponible')">Egreso</a></li>
								</ul>
							
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">
									Celulares
									<!--span class="caret"></span-->
								</a>
								<ul class="dropdown-menu">
									<li><a onclick="verLineas()">Ver lineas</a></li>
									<li><a onclick="nuevaLinea()">Nueva linea</a></li>
									<li><a onclick="modificarLinea()">Modificar linea</a></li>
									<li><a onclick="borrarLinea()">Borrar linea</a></li>
								</ul>
							</li>

							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown">
									Auditoria									
								</a>
								<ul class="dropdown-menu">									
									<li><a class="test" tabindex="-1" onclick="verCronograma()"> Cronograma </a></li>									
									<li><a class="test" tabindex="-1" onclick="verSemana('false')"> Ver semana </a></li>			
								</ul>
							</li>
							
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown">
									Impuestos									
								</a>
								<ul class="dropdown-menu">									
									<li class="dropdown-submenu">
										<a class="test" tabindex="-1" href="#"> 
											Puntos de venta 											
										</a>
										<ul class="dropdown-menu">
											<li class="dropdown-submenu">
												<a class="test" tabindex="-1" href="#"> Ver </a>
												<ul class="dropdown-menu">
													<li><a tabindex="-1" onclick="puntoVenta('local')"> Local </a></li>
													<li><a tabindex="-1" onclick="puntoVenta('pv')"> Punto de Venta </a></li>
												</ul>
											</li>											
											<li class="dropdown-submenu">
												<a class="test" tabindex="-1" href="#"> Nuevo </a>
												<ul class="dropdown-menu">
													<li><a tabindex="-1" onclick="puntoVenta('agregarLocal')"> Local </a></li>
													<li><a tabindex="-1" onclick="puntoVenta('agregarPV')"> Punto de Venta </a></li>
												</ul>
											</li>																		
										</ul>
									</li>																										
								</ul>
							</li>
							
							<li><a href=""> Proyectos </a></li>
							
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="">
									Estadisticas
									<!--span class="caret"></span-->
								</a>
								<ul class="dropdown-menu">									
									<li><a onclick="cargarTickets()"> Cargar Tickets </a></li>
									<li><a onclick="estadisticas()"> Graficos </a></li>									
								</ul>
							</li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li>
								<a href="php/logout.php">
									<span class="glyphicon glyphicon-log-in"></span> 
									Logout 
								</a>
							</li>
						</ul>
					</div>
				</nav>
		</div>
		
		<!--Menu, contenido y ADS-->
		<div class="row text-center">
					
			<div class="col-sm-0">
					
			</div>
					
			<!--Contenido-->
			<div class="col-sm-12 text-left" id = "contenido"> 
				
			</div>
			
			<div class="col-sm-0"> 
				
			</div>
			
		</div>

</body>
</html>

