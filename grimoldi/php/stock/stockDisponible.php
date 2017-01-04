<?php
include "../../clases/database.php";

$db = new database();
$db->conectar();

				$query = mysqli_query($db->conexion, "SELECT * FROM stock WHERE estado = 'Disponible';")
				or die ("Fallo la consulta, no se pueden mostrar el stock");
																	 			
				echo '
				<div class="col-sm-10 text-left" id = "contenido"> 
				<table class="table table-condensed">
				<thead>
					<tr>
						<th>Estado</th>
						<th>Equipo</th>
						<th>Marca</th>	
						<th>Modelo</th>
						<th>Nro. Serie</th>
						<th>S.O.</th>
						<th>Licencia</th>
						<th>Procesador</th>
						<th>Memoria</th>
						<th>HDD</th>
						<th>Detalles</th>
						<th>Fecha de ingreso</th>
						<th>Asignación/Envio</th>
						<th>Depósito</th>
						<th>Destino</th>
						<th>Sector</th>
						<th>Usuario</th>
					</tr>
				</thead>
				<tbody>';
	
				while($ver = mysqli_fetch_assoc($query))
						{
						echo
						"
							<tr>
								<td>
									<p>".$ver['estado']."
										<button type='button' class='btn btn-link btn-xs' onclick='editar(this.value)' value ='".$ver['id']."Estado'>editar</button>
									</p>
									<input type='hidden' id='".$ver['id']."EstadoPlaceholder' value='".$ver['estado']."'></input>
									<!--<input type='hidden' id='nCampo' value='estado'></input>-->
									<div id='".$ver['id']."Estado'></div>
								</td>
								<td>
									<p>".$ver['equipo']."
										<button type='button' class='btn btn-link btn-xs' onclick='editar(this.value)' value ='".$ver['id']."Equipo'>editar</button>
									</p>
									<input type='hidden' id='".$ver['id']."EquipoPlaceholder' value='".$ver['equipo']."'></input>
									<div id='".$ver['id']."Equipo'></div>
								</td>
								<td>
									<p>".$ver['marca']."
										<button type='button' class='btn btn-link btn-xs' onclick='editar(this.value)' value ='".$ver['id']."Marca'>editar</button>
									</p>
									<input type='hidden' id='".$ver['id']."MarcaPlaceholder' value='".$ver['marca']."'></input>
									<div id='".$ver['id']."Marca'></div>
								</td>
								<td>
									<p>".$ver['modelo']."
										<button type='button' class='btn btn-link btn-xs' onclick='editar(this.value)' value ='".$ver['id']."Modelo'>editar</button>
									</p>
									<input type='hidden' id='".$ver['id']."ModeloPlaceholder' value='".$ver['modelo']."'></input>
									<div id='".$ver['id']."Modelo'></div>
								</td>
								<td>
									<p>".$ver['nro_serie']."
										<button type='button' class='btn btn-link btn-xs' onclick='editar(this.value)' value ='".$ver['id']."Nro_serie'>editar</button>
									</p>
									<input type='hidden' id='".$ver['id']."Nro_seriePlaceholder' value='".$ver['nro_serie']."'></input>
									<div id='".$ver['id']."Nro_serie'></div>
								</td>
								<td>
									<p>".$ver['sistema_operativo']."
										<button type='button' class='btn btn-link btn-xs' onclick='editar(this.value)' value ='".$ver['id']."Sistema_operativo'>editar</button>
									</p>
									<input type='hidden' id='".$ver['id']."Sistema_operativoPlaceholder' value='".$ver['sistema_operativo']."'></input>
									<div id='".$ver['id']."Sistema_operativo'></div>
								</td>
								<td>
									<p>".$ver['licencia']."
										<button type='button' class='btn btn-link btn-xs' onclick='editar(this.value)' value ='".$ver['id']."Licencia'>editar</button>
									</p>
									<input type='hidden' id='".$ver['id']."LicenciaPlaceholder' value='".$ver['licencia']."'></input>
									<div id='".$ver['id']."Licencia'></div>
								</td>
								<td>
									<p>".$ver['procesador']."
										<button type='button' class='btn btn-link btn-xs' onclick='editar(this.value)' value ='".$ver['id']."Procesador'>editar</button>
									</p>
									<input type='hidden' id='".$ver['id']."ProcesadorPlaceholder' value='".$ver['procesador']."'></input>
									<div id='".$ver['id']."Procesador'></div>
								</td>
								<td>
									<p>".$ver['memoria']."
										<button type='button' class='btn btn-link btn-xs' onclick='editar(this.value)' value ='".$ver['id']."Memoria'>editar</button>
									</p>
									<input type='hidden' id='".$ver['id']."MemoriaPlaceholder' value='".$ver['memoria']."'></input>
									<div id='".$ver['id']."Memoria'></div>
								</td>
								<td>
									<p>".$ver['hdd']."
										<button type='button' class='btn btn-link btn-xs' onclick='editar(this.value)' value ='".$ver['id']."Hdd'>editar</button>
									</p>
									<input type='hidden' id='".$ver['id']."HddPlaceholder' value='".$ver['hdd']."'></input>
									<div id='".$ver['id']."Hdd'></div>
								</td>
								<td>
									<p>".$ver['detalles']."
										<button type='button' class='btn btn-link btn-xs' onclick='editar(this.value)' value ='".$ver['id']."Detalles'>editar</button>
									</p>
									<input type='hidden' id='".$ver['id']."DetallesPlaceholder' value='".$ver['detalles']."'></input>
									<div id='".$ver['id']."Detalles'></div>
								</td>
								<td>
									<p>".$ver['fecha_ingreso']."
										<button type='button' class='btn btn-link btn-xs' onclick='editar(this.value)' value ='".$ver['id']."Fecha_ingreso'>editar</button>
									</p>
									<input type='hidden' id='".$ver['id']."Fecha_ingresoPlaceholder' value='".$ver['fecha_envio']."'></input>
									<div id='".$ver['id']."Fecha_ingreso'></div>
								</td>
								<td>
									<p>".$ver['fecha_envio']."
										<button type='button' class='btn btn-link btn-xs' onclick='editar(this.value)' value ='".$ver['id']."Fecha_envio'>editar</button>
									</p>
									<input type='hidden' id='".$ver['id']."Fecha_envioPlaceholder' value='".$ver['fecha_envio']."'></input>
									<div id='".$ver['id']."Fecha_envio'></div>
								</td>
								<td>
									<p>".$ver['deposito']."
										<button type='button' class='btn btn-link btn-xs' onclick='editar(this.value)' value ='".$ver['id']."Deposito'>editar</button>
									</p>
									<input type='hidden' id='".$ver['id']."DepositoPlaceholder' value='".$ver['deposito']."'></input>
									<div id='".$ver['id']."Deposito'></div>
								</td>
								<td>
									<p>".$ver['destino']."
										<button type='button' class='btn btn-link btn-xs' onclick='editar(this.value)' value ='".$ver['id']."Destino'>editar</button>
									</p>
									<input type='hidden' id='".$ver['id']."DestinoPlaceholder' value='".$ver['destino']."'></input>
									<div id='".$ver['id']."Destino'></div>
								</td>
								<td>
									<p>".$ver['sector']."
										<button type='button' class='btn btn-link btn-xs' onclick='editar(this.value)' value ='".$ver['id']."Sector'>editar</button>
									</p>
									<input type='hidden' id='".$ver['id']."SectorPlaceholder' value='".$ver['sector']."'></input>
									<div id='".$ver['id']."Sector'></div>
								</td>
								<td>
									<p>".$ver['usuario']."
										<button type='button' class='btn btn-link btn-xs' onclick='editar(this.value)' value ='".$ver['id']."Usuario'>editar</button>
									</p>
									<input type='hidden' id='".$ver['id']."UsuarioPlaceholder' value='".$ver['usuario']."'></input>
									<div id='".$ver['id']."Usuario'></div>
								</td>
								<td>
									<div id='editar'>	
										<input  type='button' onclick='' value='Guardar'></input>
									</div>
								</td>
							</tr>
						";
						}
						
						echo"
								</tbody>
							</table>
						</div>		
						";
								
					
?>


