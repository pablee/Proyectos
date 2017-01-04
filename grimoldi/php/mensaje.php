<?php
	
	$valor = $_GET["valor"];
			
	if($valor == "agregar")
		{
		echo "Se agrego una nueva linea";
		//document.getElementById("contenido").innerHTML = "Se agrego una nueva linea";								
		}
								
	if($valor == "modificar")
		{
		echo "La linea fue actualizada";
		//document.getElementById("contenido").innerHTML = "La linea fue actualizada";								
		}
								
	if($valor == "borrar")
		{
		echo "Se elimino la linea";
		//document.getElementById("contenido").innerHTML = "Se elimino la linea";								
		}
										
?>
