<?php

$valorCampo = $_GET["valorCampo"];
$idCampo = $_GET["idCampo"];

echo "<br>";
echo '<input type="text" id="'.$idCampo.'"></input>';
echo '<button type="button" class="btn btn-link btn-xs" onclick="aceptar(this.value)" value ='.$idCampo.'>Aceptar</button>';
?>