<?php

$id = $_GET["id"];

echo'
	<div class="row table-responsive">	
		<div class="col-sm-5 col-md-10"> 	
			<table class="table table-striped">
				<thead class="text-center">
					<tr>
						<th> ID </th>									
						<th> Domicilio </th>	
						<th> Ciudad </th>
						<th> Provincia </th>
					</tr>
				</thead>

				<tbody>
					<tr>
						<td> '.$id.' </td>
						<td> <input type="text" id="domicilio"> </input> </td>
						<td> <input type="text" id="ciudad"> </input> </td>
						<td> <input type="text" id="provincia"> </input> </td>							
						<td> 			
							<button type="button" class="btn btn-success btn-sm" value ="'.$id.'" onclick = "guardar(this.value)">
								<span class="glyphicon glyphicon-ok"></span>  
							</button>
							<button type="button" class="btn btn-info btn-sm" " onclick = puntoVenta("agregarLocal")>
								<span class="glyphicon glyphicon-plus"></span>  
							</button>			
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>				
	';

?>