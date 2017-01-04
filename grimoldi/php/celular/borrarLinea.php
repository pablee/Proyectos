<?php

echo '
	<div class="col-sm-6 text-left">
		<form method = "POST" action = "php/celular/borrarCel.php">
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
									<td><input class="btn btn-info" onclick="mensaje(this.value)" type = "submit" value = "Borrar"></input></td>
								</tr>									
							</tbody>
		</form>
	</div>
';

?>