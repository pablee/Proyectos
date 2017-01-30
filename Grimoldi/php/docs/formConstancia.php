<?php
session_start();
include "../../clases/database.php";
date_default_timezone_set('America/Argentina/Buenos_Aires');
setlocale (LC_TIME,"spanish");
$fecha = date("d-m-Y");
$valor = $_GET["valor"];

$_SESSION['equipo'] = "";
$_SESSION['marca']	= "";
$_SESSION['modelo']	= "";
$_SESSION['nro_serie'] = "";
$_SESSION['uso'] 	= "";
$_SESSION['usuario']= "";
$_SESSION['nro_linea'] 	= "";
$_SESSION['sim'] 	= "";
$_SESSION['imei'] = "";


if($valor == "notebook")
	{
	echo '
	<div class="col-sm-6 text-left">
			
				<table class="table table-default">
					<thead>
						<tr>
							<td>
								<h3>Cargar datos</h3>
							</td>
						</tr>
					</thead>
					
					<tbody>
						
						<tr>
							<td>
								<label for="equipo"> Equipo </label>
							</td>
							<td>
								<div name = "equipo" id = "equipo">'.$valor.'</div>
							</td>
						</tr>
						
						<tr>
							<td>
								<label for="marca"> Marca </label>
							</td>
							<td>
								<input type = "text" name = "marca" id = "marca"></input>
							</td>
						</tr>

						<tr>
							<td>
								<label for="modelo"> Modelo </label>
							</td>
							<td>
								<input type = "text" name = "modelo" id = "modelo"></input>
							</td>
						</tr>

						<tr>
							<td>
								<label for="nro_serie"> Numero de serie </label>
							</td>
							<td>
								<input type = "text" name = "nro_serie" id = "nro_serie"></input>
							</td>
						</tr>

						<tr>
							<td>
								<label for="uso"> Motivo de uso </label>
							</td>
							<td>
								<select name="uso" id="uso">
									<option value="laboral"> Laboral </option>
									<option value="personal"> Personal </option>
									<option value="otro"> Otro </option>
								</select>
							</td>
						</tr>

						<tr>
							<td>
								<label for="fecha"> Fecha </label>
							</td>
							<td>
								<p name = "fecha" id = "fecha"> '.$fecha.' </p>
							</td>
						</tr>

						<tr>
							<td>
								<label for="usuario"> Usuario </label>
							</td>
							<td>	
								<input type = "text" name = "usuario" id = "usuario"></input>
							</td>
						</tr>

						<tr>
							<td>
							</td>
							<td>					
								<button class="btn btn-default" onclick="constanciaNotebook()"> Aceptar </button> 
							</td>
						</tr>									
					</tbody>
			
	</div>
	';
	}
	else if($valor == "celular")
		{
		echo '
			<div class="col-sm-6 text-left">
					
						<table class="table table-default">
							<thead>
								<tr>
									<td>
										<h3>Cargar datos</h3>
									</td>
								</tr>
							</thead>
							
							<tbody>
								
								<tr>
									<td>
										<label for="equipo"> Equipo </label>
									</td>
									<td>
										<div name = "equipo" id = "equipo">'.$valor.'</div>
									</td>
								</tr>
								
								<tr>
									<td>
										<label for="marca"> Marca </label>
									</td>
									<td>
										<input type = "text" name = "marca" id = "marca"></input>
									</td>
								</tr>

								<tr>
									<td>
										<label for="modelo"> Modelo </label>
									</td>
									<td>
										<input type = "text" name = "modelo" id = "modelo"></input>
									</td>
								</tr>

								<tr>
									<td>
										<label for="nro_serie"> Numero de serie </label>
									</td>
									<td>
										<input type = "text" name = "nro_serie" id = "nro_serie"></input>
									</td>
								</tr>
								
								<tr>
									<td>
										<label for="nro_linea"> Numero de linea </label>
									</td>
									<td>
										<input type = "text" name = "nro_linea" id = "nro_linea"></input>
									</td>
								</tr>
								
								<tr>
									<td>
										<label for="sim"> SIM </label>
									</td>
									<td>
										<input type = "text" name = "sim" id = "sim"></input>
									</td>
								</tr>
								
								<tr>
									<td>
										<label for="imei"> IMEI </label>
									</td>
									<td>
										<input type = "text" name = "imei" id = "imei"></input>
									</td>
								</tr>
								
								<tr>
									<td>
										<label for="uso"> Motivo de uso </label>
									</td>
									<td>
										<select name="uso" id="uso">
											<option value="laboral"> Laboral </option>
											<option value="personal"> Personal </option>
											<option value="otro"> Otro </option>
										</select>
									</td>
								</tr>

								<tr>
									<td>
										<label for="fecha"> Fecha </label>
									</td>
									<td>
										<p name = "fecha" id = "fecha"> '.$fecha.' </p>
									</td>
								</tr>

								<tr>
									<td>
										<label for="usuario"> Usuario </label>
									</td>
									<td>	
										<input type = "text" name = "usuario" id = "usuario"></input>
									</td>
								</tr>

								<tr>
									<td>
									</td>
									<td>
										<button class="btn btn-default" onclick="constanciaCelular()"> Aceptar </button> 
									</td>
								</tr>									
							</tbody>
					
			</div>
			';
		}
	
?>