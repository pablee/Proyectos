<?php
session_start();
include "../clases/database.php";

$mail = $_POST['mail'];
$pass = $_POST['pass'];
$recordar = $_POST['recordar']; 

$_SESSION['login'] = FALSE;

$db = new database();
$db->conectar();

$consulta = "SELECT * FROM usuarios WHERE mail = '$mail' AND password = '$pass';";
$resultado = mysqli_query($db->conexion, $consulta) or die ("Fallo la consulta no se puede validar el usuario");
$datos = mysqli_fetch_assoc($resultado);

if (1 == mysqli_num_rows($resultado))
	{
	if ($recordar == "si")
		{	
		//setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
		setcookie("mail", $mail, time() + (86400 * 30), "/"); // 86400 = 1 day
		setcookie("pass", $pass, time() + (86400 * 30), "/"); // 86400 = 1 day
		}else if($recordar == "no")
				{
				//set the expiration date to one hour ago
				setcookie("mail", "", time() - 3600, "/");				
				setcookie("pass", "", time() - 3600, "/");
				}
		
	$_SESSION['login'] = TRUE;
	$_SESSION['nombre'] = $datos['nombre'];
	header("location: ../home.php");
	}
	else{
		header("location: ../index.php");
		}
 	
/*
echo $datos['mail'];
echo $datos['password'];
*/
?>