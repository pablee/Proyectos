<?php

echo '
<div class="col-sm-6 text-left">
	<form method = "GET" action = "php/celular/agregarCel.php">
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
									<td><input class="btn btn-info" onclick="mensaje(this.value)" type = "submit" value = "Agregar"></input></td>
								</tr>									
							</tbody>
	</form>
</div>
';