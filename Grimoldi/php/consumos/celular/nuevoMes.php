<?php

echo'
	<form action="php/consumos/celular/uploadFile.php" method="post" enctype="multipart/form-data">
		<h3> Seleccione el archivo del mes a cargar </h3>
		<br>
		<input type="file" class="btn btn-default" name="archivo" id="archivo">
		<br>
		<input type="submit" class="btn btn-default" value="Subir" name="submit">
		
	</form>
	';
	
?>