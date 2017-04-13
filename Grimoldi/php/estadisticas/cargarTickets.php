<?php

echo'
	<form action="php/estadisticas/uploadFile.php" method="post" enctype="multipart/form-data">
		<h3> Seleccione los tickets a cargar </h3>
		<br>
		<input type="file" class="btn btn-default" name="archivo" id="archivo">
		<br>
		<input type="submit" class="btn btn-default" value="Subir" name="submit">
	</form>
	';
	
?>