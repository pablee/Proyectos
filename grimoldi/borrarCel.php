<?php
include "database.php";

$nombre = $_POST["nombre"];
$linea = $_POST["linea"];
$mail = $_POST["mail"];

$db = new database();
$db->conectar();
				
$consulta = "DELETE FROM celulares WHERE nombre = '$nombre' OR linea = '$linea' OR mail = '$mail';";

$query = mysqli_query($db->conexion, $consulta)	or die ("Fallo la consulta, no se pudo borrar el registro");
			
echo "Registro borrado";
header('location: home.php');

?>