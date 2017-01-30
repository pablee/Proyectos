<?php
include "../../clases/database.php";

$id = $_GET["id"];

$db = new database();
$db->conectar();

$consulta = "DELETE FROM gastos WHERE id = '$id';";

$resultado = mysqli_query($db->conexion, $consulta)
or die ("Fallo la consulta, no se pueden borrar el gasto");

$db->close();

echo "<h2> Registro borrado </h2>";
?>