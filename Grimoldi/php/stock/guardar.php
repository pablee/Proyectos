<?php
include "../../clases/database.php";

$id = $_GET["id"];
$estado = $_GET["estado"];
$equipo = $_GET["equipo"];
$marca = $_GET["marca"];
$modelo = $_GET["modelo"];
$nro_serie = $_GET["nro_serie"];
$sistema_operativo = $_GET["sistema_operativo"];
$licencia = $_GET["licencia"];
$procesador = $_GET["procesador"];
$memoria = $_GET["memoria"];
$hdd = $_GET["hdd"];
$detalles = $_GET["detalles"];
$fecha_ingreso = $_GET["fecha_ingreso"];
$fecha_envio = $_GET["fecha_envio"];
$deposito = $_GET["deposito"];
$destino = $_GET["destino"];
$sector = $_GET["sector"];
$usuario = $_GET["usuario"];

$db = new database();
$db->conectar();

$query = mysqli_query($db->conexion, "UPDATE stock 
									  SET estado='$estado', equipo='$equipo', marca='$marca', modelo='$modelo', nro_serie='$nro_serie', sistema_operativo='$sistema_operativo', 
										  licencia='$licencia', procesador='$procesador', memoria='$memoria', hdd='$hdd', detalles='$detalles', fecha_ingreso='$fecha_ingreso', 
										  fecha_envio='$fecha_envio', deposito='$deposito', destino='$destino', sector='$sector', usuario='$usuario'
										  WHERE id = '$id';")
or die ("Fallo la consulta, no se puede actualizar el stock");

$db->close();

echo "Guardado";
echo "<br>";
echo "<button type='button' class='btn btn-link btn-xs' onclick='guardar(this.value)' value ='".$id."'> GUARDAR </button>";

?>