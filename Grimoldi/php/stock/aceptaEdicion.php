<?php

$idCampo = $_GET["idCampo"];
$valorCampo = $_GET["valorCampo"];

echo '<div id="'.$idCampo.'">'.$valorCampo.'</div>';
echo "<button type='button' class='btn btn-link btn-xs' onclick='editar(this.value)' value ='".$idCampo."'> editar </button>";

?>