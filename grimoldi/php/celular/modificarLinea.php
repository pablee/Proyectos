<?php
//carga el formulario para modificar un registro de la tabla celular
echo '
	<div class="col-sm-6 text-left">
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
									<td><button type = "button" class="btn btn-info" onclick="modificar()">Buscar</button></td>
								</tr>									
							</tbody>
		</table>
	</div>
';

?>

