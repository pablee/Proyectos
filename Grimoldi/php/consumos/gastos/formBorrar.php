<?php
//psao el valor para elegir la ruta donde busca el formulario para borrar el gasto
$valor = $_GET["valor"];

echo'
<h3> Ingrese el id del consumo que desea borrar </h3>
<input type="text" id="id"> </input>
<input class="btn btn-default" onclick="borrarConsumo('.$valor.')" type = "submit" value = "Borrar"></input>
';
	
?>