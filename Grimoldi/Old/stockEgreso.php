<?php
include "../../clases/database.php";

$db = new database();
$db->conectar();

				$query = mysqli_query($db->conexion, "SELECT * FROM stock WHERE estado = 'Disponible';")
				or die ("Fallo la consulta, no se pueden mostrar el stock");
																	 			
				echo '
				<div class="col-sm-10 text-left" id = "contenido"> 
				<table class="table table-default">
				<thead>
					<tr>
						<th>ID</th>
						<th>Estado</th>
						<th>Equipo</th>
						<th>Marca</th>	
						<th>Modelo</th>
						<th>Nro. Serie</th>
						<th>Sistema operativo</th>
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
						<th></th>
					</tr>
				</thead>
				<tbody>';
	
				while($ver = mysqli_fetch_assoc($query))
						{
						echo
						"	
							<tr>
								<td>
									<p>".$ver['id']."</p>
								</td>
								<td>
									<div id='".$ver['id']."EstadoContenido'>
										<div id='".$ver['id']."Estado'>	".$ver['estado']." </div>
										<button type='button' class='btn btn-link btn-xs' onclick='editar(this.value)' value ='".$ver['id']."Estado'> editar </button>
									</div>
									
								</td>
								<td>
									<div id='".$ver['id']."EquipoContenido'>
										<div id='".$ver['id']."Equipo'>".$ver['equipo']."</div>
										<button type='button' class='btn btn-link btn-xs' onclick='editar(this.value)' value ='".$ver['id']."Equipo'>editar</button>
									</div>
								
								</td>
								<td>
									<div id='".$ver['id']."MarcaContenido'>
										<div id='".$ver['id']."Marca'>".$ver['marca']."</div>
										<button type='button' class='btn btn-link btn-xs' onclick='editar(this.value)' value ='".$ver['id']."Marca'>editar</button>
									</div>
									
								</td>
								<td>
									<div id='".$ver['id']."ModeloContenido'>
										<div id='".$ver['id']."Modelo'>".$ver['modelo']."</div>
										<button type='button' class='btn btn-link btn-xs' onclick='editar(this.value)' value ='".$ver['id']."Modelo'>editar</button>
									</div>
									
								</td>
								<td>
									<div id='".$ver['id']."Nro_serieContenido'>
										<div id='".$ver['id']."Nro_serie'>".$ver['nro_serie']."</div>
										<button type='button' class='btn btn-link btn-xs' onclick='editar(this.value)' value ='".$ver['id']."Nro_serie'>editar</button>
									</div>
									
								</td>
								<td>
									<div id='".$ver['id']."Sistema_operativoContenido'>
										<div id='".$ver['id']."Sistema_operativo'>".$ver['sistema_operativo']."</div>
										<button type='button' class='btn btn-link btn-xs' onclick='editar(this.value)' value ='".$ver['id']."Sistema_operativo'>editar</button>
									</div>
									
								</td>
								<td>
									<div id='".$ver['id']."LicenciaContenido'>
										<div id='".$ver['id']."Licencia'>".$ver['licencia']."</div>
										<button type='button' class='btn btn-link btn-xs' onclick='editar(this.value)' value ='".$ver['id']."Licencia'>editar</button>
									</div>
									
								</td>
								<td>
									<div id='".$ver['id']."ProcesadorContenido'>
										<div id='".$ver['id']."Procesador'>".$ver['procesador']."</div>
										<button type='button' class='btn btn-link btn-xs' onclick='editar(this.value)' value ='".$ver['id']."Procesador'>editar</button>
									</div>
									
								</td>
								<td>
									<div id='".$ver['id']."MemoriaContenido'>
										<div id='".$ver['id']."Memoria'>".$ver['memoria']."</div>
										<button type='button' class='btn btn-link btn-xs' onclick='editar(this.value)' value ='".$ver['id']."Memoria'>editar</button>
									</div>
									
								</td>
								<td>
									<div id='".$ver['id']."HddContenido'>
										<div id='".$ver['id']."Hdd'>".$ver['hdd']."</div>
										<button type='button' class='btn btn-link btn-xs' onclick='editar(this.value)' value ='".$ver['id']."Hdd'>editar</button>
									</div>
									
								</td>
								<td>
									<div id='".$ver['id']."DetallesContenido'>
										<div id='".$ver['id']."Detalles'>".$ver['detalles']."</div>
										<button type='button' class='btn btn-link btn-xs' onclick='editar(this.value)' value ='".$ver['id']."Detalles'>editar</button>
									</div>
									
								</td>
								<td>
									<div id='".$ver['id']."Fecha_ingresoContenido'>
										<div id='".$ver['id']."Fecha_ingreso'>".$ver['fecha_ingreso']."</div>
										<button type='button' class='btn btn-link btn-xs' onclick='editar(this.value)' value ='".$ver['id']."Fecha_ingreso'>editar</button>
									</div>
									
								</td>
								<td>
									<div id='".$ver['id']."Fecha_envioContenido'>
										<div id='".$ver['id']."Fecha_envio'>".$ver['fecha_envio']."</div>
										<button type='button' class='btn btn-link btn-xs' onclick='editar(this.value)' value ='".$ver['id']."Fecha_envio'>editar</button>
									</div>
									
								</td>
								<td>
									<div id='".$ver['id']."DepositoContenido'>
										<div id='".$ver['id']."Deposito'>".$ver['deposito']."</div>
										<button type='button' class='btn btn-link btn-xs' onclick='editar(this.value)' value ='".$ver['id']."Deposito'>editar</button>
									</div>
									
								</td>
								<td>
									<div id='".$ver['id']."DestinoContenido'>
										<div id='".$ver['id']."Destino'>".$ver['destino']."</div>
										<button type='button' class='btn btn-link btn-xs' onclick='editar(this.value)' value ='".$ver['id']."Destino'>editar</button>
									</div>
									
								</td>
								<td>
									<div id='".$ver['id']."SectorContenido'>
										<div id='".$ver['id']."Sector'>".$ver['sector']."</div>
										<button type='button' class='btn btn-link btn-xs' onclick='editar(this.value)' value ='".$ver['id']."Sector'>editar</button>
									</div>
									
								</td>
								<td>
									<div id='".$ver['id']."UsuarioContenido'>
										<div id='".$ver['id']."Usuario'>".$ver['usuario']."</div>
										<button type='button' class='btn btn-link btn-xs' onclick='editar(this.value)' value ='".$ver['id']."Usuario'>editar</button>
									</div>
									
								</td>
								
								<td>
									<p id='guardar'>
										<button type='button' class='btn btn-link btn-xs' onclick='asignar(this.value)' value ='".$ver['id']."'> Asignar </button>
									</p>
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


