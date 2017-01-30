<?php
date_default_timezone_set('America/Argentina/Buenos_Aires');
setlocale (LC_TIME,"spanish");
$fecha = date("d-m-Y H:i:s");

echo '
<div class="col-sm-6 text-left">
		
			<table class="table table-default">
				<thead>
					<tr>
						<td>
							<h3>Datos del nuevo equipo</h3>
						</td>
					</tr>
				</thead>
				
				<tbody>
					<tr>
						<td>
							<label for="estado"> Estado </label>
						</td>
						<td>
							<p> Disponible </p>
						</td>
					</tr>

					<tr>
						<td>
							<label for="equipo"> Equipo </label>
						</td>
						<td>
							<select name="equipo" id="equipo">
								<option value="vacio">  </option>
								<option value="Monitor"> Monitor </option>
								<option value="PC"> PC </option>
								<option value="Notebook"> Notebook </option>
								<option value="Tv"> Tv </option>
							</select>
							<!--<input type = "text" name = "equipo" id = "equipo"></input>-->
						</td>
					</tr>

					<tr>
						<td>
							<label for="cantidad"> Cantidad </label>
						</td>
						<td>
							<input type = "text" name = "cantidad" id = "cantidad"></input>
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
							<label for="sistema_operativo"> Sistema operativo </label>
						</td>
						<td>
							<input type = "text" name = "sistema_operativo" id = "sistema_operativo"></input>
						</td>
					</tr>

					<tr>
						<td>
							<label for="licencia"> Licencia </label>
						</td>
						<td>
							<input type = "text" name = "licencia" id = "licencia"></input>
						</td>
					</tr>

					<tr>
						<td>
							<label for="procesador"> Procesador </label>
						</td>
						<td>
							<input type = "text" name = "procesador" id = "procesador"></input>
						</td>
					</tr>

					<tr>
						<td>
							<label for="memoria"> Memoria </label>
						</td>
						<td>
							<input type = "text" name = "memoria" id = "memoria"></input>
						</td>
					</tr>

					<tr>
						<td>
							<label for="hdd"> Hdd </label>
						</td>
						<td>
							<input type = "text" name = "hdd" id = "hdd"></input>
						</td>
					</tr>

					<tr>
						<td>
							<label for="detalles"> Detalles </label>
						</td>
						<td>
							<input type = "text" name = "detalles" id = "detalles"></input>
						</td>
					</tr>

					<tr>
						<td>
							<label for="fecha_ingreso"> Fecha de ingreso </label>
						</td>
						<td>
							<p name = "fecha_ingreso" id = "fecha_ingreso"> '.$fecha.' </p>
						</td>
					</tr>

					<tr>
						<td>
							<label for="fecha_envio"> Fecha de envio </label>
						</td>
						<td>
							<input type = "text" name = "fecha_envio" id = "fecha_envio"></input>
						</td>
					</tr>

					<tr>
						<td>
							<label for="deposito"> Deposito </label>
						</td>
						<td>
							<input type = "text" name = "deposito" id = "deposito"></input>
						</td>
					</tr>

					<tr>
						<td>
							<label for="destino"> Destino </label>
						</td>
						<td>
							<input type = "text" name = "destino" id = "destino"></input>
						</td>
					</tr>

					<tr>
						<td>
							<label for="sector"> Sector </label>
						</td>
						<td>
							<input type = "text" name = "sector" id = "sector"></input>
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
							<button class="btn btn-default" onclick="ingresarStock()"> Agregar </button>
							<!--<button class="btn btn-default" type="Reset"> Cancelar </button>-->
						</td>
					</tr>									
				</tbody>
		
</div>
';

?>