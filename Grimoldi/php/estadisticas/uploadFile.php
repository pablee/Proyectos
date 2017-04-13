<?php
session_start();
include "../../clases/database.php";

$target_path = "../../../../../mysql/data/grimoldi/tickets/";
$target_path = $target_path . basename($_FILES['archivo']['name']); 

if(move_uploaded_file($_FILES['archivo']['tmp_name'], $target_path)) 
	{ 
	echo "El archivo ". basename($_FILES['archivo']['name']). " ha sido subido";
	} 
	else
		{
		echo "Ha ocurrido un error, intenete de nuevo!";
		} 
		
//nombre del archivo
//echo $_FILES['archivo']['name'];		

$db = new database();
$db->conectar();

$consulta = "TRUNCATE tickets
			LOAD DATA INFILE 'grimoldi/tickets/".$_FILES['archivo']['name']."'
			INTO TABLE tickets
			FIELDS TERMINATED BY ','
			LINES TERMINATED BY '\n';";

$resultado = mysqli_query($db->conexion, $consulta)
or die ("No se pudo cargar el archivo en la base");

echo "<br>";
echo "Archivo cargado";			
	
?>
