<?php
session_start();
?>

<html lang="en">

	<head>
		<!-- Latest compiled and minified CSS
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
		<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

		<!-- Latest compiled JavaScript 
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
		<script src="../../bootstrap/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="../../css/estilos.css">
		<meta charset="utf-8"> 
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>

	<body>
	
		<div class="grimoldi">Gestion de alta de usuario</div>
			
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
						
						</ul>
						
						<ul class="nav navbar-nav navbar-right">
							<li><a href="../../home.php"> Volver </a></li>
						</ul>
							
					
					</div>
				</nav>		
		
		<div class="container">		
			<form method = "post" action = "recibeForm.php">
				
				<div class="jumbotron">
						<div class="row">
							<div class="col-sm-4">
								<br>							
								<table class="table table-condensed">
									<thead>
										<tr>
											<th>Ficha Ingreso</th>
										</tr>
									</thead>
									
									<tbody>
										<tr>
											<td>Nombre</td>
											<td><input type = "text" name = "nombre"></input></td>
										</tr>
									 
										<tr>
											<td>Apellido</td>
											<td><input type = "text" name = "apellido"></input></td>
										</tr>
									  
										<tr>
											<td>Fecha de ingreso</td>
											<td><input type = "date" name = "ingreso"></input></td>
										</tr>
										
										<tr>
											<td>CUIL</td>
											<td><input type = "text" name = "cuil"></input></td>
										</tr>
										
										<tr>
											<td>Legajo</td>
											<td><input type = "text" name = "legajo"></input></td>
										</tr>
										
										<tr>
											<td>Responsable</td>
											<td><input type = "text" name = "responsable"></input></td>
										</tr>
										
										<tr>
											<td>Puesto</td>
											<td><input type = "text" name = "puesto"></input></td>
										</tr>
										
										<tr>
											<td>Area/Gerencia</td>
											<td><input type = "text" name = "area"></input></td>
										</tr>
										
										<tr>
											<td>Unidad de negocio - PU </td>
											<td><input type = "text" name = "unegocio"></input></td>
										</tr>
										
										<tr>
											<td>Encuadre</td>
											<td><input type = "text" name = "encuadre"></input></td>
										</tr>
																		
										<tr>
											<td>Vacaciones</td>
											<td><input type = "text" name = "vacaciones"></input></td>
										</tr>
										
										<tr>
											<td>Ubicacion laboral</td>
											<td>
												<select type = "text" name = "ubicacion">
												  <option value="arroyo">Arroyo Seco</option>
												  <option value="castelar">Castelar</option>
												  <option value="pilar">Pilar</option>
												  <option value="local">Local</option>
												</select>	
											</td>
										</tr>
										
										<tr>
											<td>Celular</td>
											<td>
												Si <input type = "radio" name = "celular" value = "true"></input>
												No <input type = "radio" name = "celular" value = "false"></input>
											</td>
										</tr>
										
										<tr>
											<td>Numero de telefono</td>
											<td><input type = "text" name = "celnum"></input></td>
										</tr>
										
										<tr>
											<td>Plan</td>
											<td><input type = "text" name = "plan"></input></td>
										</tr>
										
										<tr>
											<td>Tarjetas</td>
											<td>
												Si <input type = "radio" name = "tarjetas" value = "true"></input>
												No <input type = "radio" name = "tarjetas" value = "false"></input>
											</td>
										</tr>
										
										<tr>
											<td>Telefono</td>
											<td>
												Si <input type = "radio" name = "telefono" value = "true"></input>
												No <input type = "radio" name = "telefono" value = "false"></input>
											</td>
										</tr>
										
										<tr>
											<td>Notebook</td>
											<td>
												Si <input type = "radio" name = "notebook" value = "true"></input>
												No <input type = "radio" name = "notebook" value = "false"></input>
											</td>
										</tr>
										
										
									</tbody>
								 </table>
							</div>
							
							<div class="col-sm-4">
								<table class="table table-condensed">
										<thead>
											<tr>
												<th>Accesos Requeridos</th>
											</tr>
										</thead>
										
										<tbody>
											<tr>
												<td>SAP</td>
												<td>
													<input type = "checkbox" name = "sap" value = "true"></input>
												</td>
											</tr>
											
											<tr>
												<td>Wave</td>
												<td>
													<input type = "checkbox" name = "wave" value = "true"></input>
												</td>
											</tr>
								
											<tr>
												<td>SOL</td>
												<td>
													<input type = "checkbox" name = "sol" value = "true"></input>
												</td>
											</tr>
											
											<tr>
												<td>Tango</td>
												<td>
													<input type = "checkbox" name = "tango" value = "true"></input>
												</td>
											</tr>
											
											<tr>
												<td>Adobe Reader</td>
												<td>
													<input type = "checkbox" name = "reader" value = "true"></input>
												</td>
											</tr>
											
											<tr>
												<td>Adobe Photoshop</td>
												<td>
													<input type = "checkbox" name = "photoshop" value = "true"></input>
												</td>
											</tr>
								
											<tr>
												<td>Adobe Illustrator</td>
												<td>
													<input type = "checkbox" name = "illustrator" value = "true"></input>
												</td>
											</tr>
											
											<tr>
												<td>Corel</td>
												<td>
													<input type = "checkbox" name = "corel" value = "true"></input>
												</td>
											</tr>
											
											<tr>
												<td>Office</td>
												<td>
													<input type = "checkbox" name = "office" value = "true"></input>
												</td>
											</tr>
											
											<tr>
												<td>SQL</td>
												<td>
													<input type = "checkbox" name = "office" value = "true"></input>
												</td>
											</tr>
											
											<tr>
												<td>Navegacion</td>
												<td>
													<input type = "checkbox" name = "navegacion" value = "true"></input>
												</td>
											</tr>
											
											<tr>
												<td>Redes Sociales</td>
												<td>
													<input type = "checkbox" name = "redes" value = "true"></input>
												</td>
											</tr>
											
											<tr>
												<td>Streaming</td>
												<td>
													<input type = "checkbox" name = "streaming" value = "true"></input>
												</td>
											</tr>
											
											<tr>
												<td>Intranet</td>
												<td>
													<input type = "checkbox" name = "intranet" value = "true"></input>
												</td>
											</tr>
											
											<tr>
												<td>Correo</td>
												<td>
													<input type = "radio" name = "mail" value = "grimoldi"> @grimoldi.com (exchange)</input>
													<br>
													<input type = "radio" name = "mail" value = "pop"> @mail.grimoldi.com (POP3)</input>
												</td>
											</tr>
											
											<tr>
												<td>Accesos en la red</td>
												<td>
													<select>
														<option value[] = "">ninguno</option>
														<option value[] = "sistemas">Sistemas</option>
													</select>
												</td>
											</tr>
								
									</tbody>
								 </table>
							</div>
														
							<div class="col-sm-4">
								<table class="table table-condensed">
										<thead>
											<tr>
												<th>Completa Sistemas</th>
											</tr>
										</thead>
										
										<tbody>
											<tr>
												<td>Usuario AD</td>
												<td>
													<input type = "text" name = "usuarioAD"></input>
												</td>
											</tr>
											
											<tr>
												<td>Contraseña</td>
												<td>
													<input type = "text" name = "pass"></input>
												</td>
											</tr>
											
											<tr>
												<td>Usuario mail</td>
												<td>
													<input type = "text" name = "dirMail"></input>
												</td>
											</tr>
											
											<tr>
												<td>Contraseña</td>
												<td>
													<input type = "text" name = "passMail"></input>
												</td>
											</tr>
											
											<tr>
											<td>Version TeamViewer
											<td><input type = "text" name = "team"></input></td>
											</tr>
											
									</tbody>
								</table>
							
							</div>
							</div>
						<br>
						<br>
						
						<div class="row">
								<input type = "reset" 	class="btn btn-success" value = "Borrar formulario"></input>			
								<input type = "submit" 	class="btn btn-success" value = "Enviar"></input>
								<br>
								<br>
								<input type = "button" 	class="btn btn-info" value = "Exportar PDF"></input>
						</div>
				</div>
			</form>
		</div>
			
	</body>

</html>
