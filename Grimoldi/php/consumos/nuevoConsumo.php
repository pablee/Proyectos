<?php
		session_start();
		date_default_timezone_set('America/Argentina/Buenos_Aires');
		setlocale (LC_TIME,"spanish");
		//$fecha = date("d-m-Y H:i:s");
		//$fecha = date("M-Y");
		$fecha = strftime("%B-%g");
		$fecha2 = strftime("%A %e de %B");	
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Intranet 2.0</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!--La hoja personalizada de estilos tiene que ir despues de la de bootstrap-->
	<link rel="stylesheet" href="../../css/estilos.css">
	<link rel="stylesheet" href="../../jquery/jquery-ui.css">
 
	<script type="text/javascript" src="../../jquery/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="../../jquery/jquery-ui.js"></script>
	<!--script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script-->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../script/funciones.js"></script>
	<script type="text/javascript" src="../../script/calendario.js"></script>
	<script type="text/javascript" src="../../script/pagina.js"></script>
	
	<script>
		
		$(function() 
			{
			$("#mes").datepicker({ dateFormat: "M-yy" }).val();	
		//	$("#datepicker").datepicker({ dateFormat: "yyyy-mm-dd" }).val();
			});
			
	</script>
	
</head>

<body> 
		
	<div class="grimoldi">Nuevos consumos</div>
	
	<nav class="col-sm-12 navbar navbar-default">
		<div class="container-fluid">
			
			<ul class="nav navbar-nav">						
				<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">
									Consumos
									<span class="caret"></span>
								</a>
								<ul class="dropdown-menu">									
									<li class="dropdown-submenu">
										<a class="test" tabindex="-1" href="#"> Gastos <span class="caret"></span></a>
										<ul class="dropdown-menu">
										  <li><a tabindex="-1" href="nuevoConsumo.php"> Nuevo </a></li>
										  <li><a tabindex="-1" onclick="verConsumos()"> Ver </a></li>
										  <li><a tabindex="-1" onclick="formBorrar()"> Borrar </a></li>
										</ul>
									</li>
									<li><a href="#">Celulares</a></li>
									<li><a href="#">Lineas</a></li>
								</ul>
				</li>
			</ul>
			
			<ul class="nav navbar-nav navbar-right">
				<li><a href="../../home.php"> Volver </a></li>
			</ul>		
			
		</div>
	</nav>		
		
	<!--Menu, contenido y ADS-->
	<div class="row text-center">
				
		<div class="col-sm-1 col-md-1">
					
		</div>
				
		<!--Contenido-->
		<div class="col-sm-4 col-md-4 text-left" id = "contenido"> 
			<table class="table table-condensed">
				<thead>
					<tr>
						<td><h3>Datos de la factura</h3></td>
					</tr>	
				</thead>
			
				<tbody>
					<tr>
						<td><label for="factura"> Factura </label></td>
						<td><input type = "text" name = "factura" id = "factura"></input></td>
					</tr>
					
					<tr>
						<td><label for="proovedor"> Proveedor </label></td>
						<td><input type = "text" name = "proovedor" id = "proovedor"></input></td>
					</tr>
					
					<tr>
						<td><label for="mes"> Mes </label></td>
						<td><input type = "text" name = "mes" id = "mes"></input></td>
					</tr>
					
					<tr>	
						<td><label> Fecha </label></td>
						<td><input type = "text" name = "datepicker" id="datepicker"></input></td>
						
					</tr>
					
					<tr>
						<td><label for="detalle"> Detalles </label></td>
						<td><input type = "text" name = "detalle" id = "detalle"></input></td>
					</tr>
					
					<tr>
						<td><label for="tipo"> Tipo </label></td>
						<td>
							<select type = "text" name = "tipo" id = "tipo">
								<option value="abono"> Abono </option>	
								<option value="compra"> Compra </option>
							</select>
						</td>
					</tr>
					
					<tr>
						<td><label for="unidad"> Unidad </label></td>
						<td><input type = "text" name = "unidad" id = "unidad"></input></td>
					</tr>
					
					<tr>
						<td><label for="cantidad"> Cantidad </label></td>
						<td><input type = "text" name = "cantidad" id = "cantidad" onchange="consumoTotal()"></input></td>
					</tr>
					
					<tr>
						<td><label for="valor"> Valor </label></td>
						<td><input type = "text" name = "valor" id = "valor" onchange="consumoTotal()"></input></td>
					</tr>
					
					<tr>
						<td><label for="total"> Total </label></td>
						<td><p type = "text" name = "total" id = "total"></p></td>
					</tr>
					
					<tr>
						<td><label for="dispositivo"> Dispositivo </label></td>
						<td>
							<select type = "text" name = "dispositivo" id = "dispositivo">
								<option value="central"> Central </option>	
								<option value="deposito"> Deposito </option>
								<option value="fabrica"> Fabrica </option>
							</select>
						</td>
					</tr>
					
					<tr>
						<td><label for="moneda"> Moneda </label></td>
						<td>
							<select type = "text" name = "moneda" id = "moneda">
								<option value="pesos"> Pesos </option>	
								<option value="dolar"> Dolares </option>
								<option value="otra"> Otra </option>
							</select>
						</td>
					</tr>
					
					<tr>
						<td><label for="tipoCambio"> Tipo Cambio </label></td>
						<td><input type = "text" name = "tipoCambio" id = "tipoCambio" onchange="cambio()"></input></td>
					</tr>
				
					<tr>
						<td></td>
						<td><input class="btn btn-default" onclick="pasarGasto()" type = "submit" value = "Ingresar"></input></td>
					</tr>									
				</tbody>
			</table>
		</div>
		
		<div class="col-sm-3 col-md-3"> 
			<div id="ingresados"> 
			
			</div>
		</div>
		
	</div>
	
		

</body>
</html>

