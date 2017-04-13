<?php

$nombre = $_POST["nombre"];					
$apellido = $_POST["apellido"];	
$fecha_ingreso  = $_POST["ingreso"];	
$cuil  = $_POST["cuil"];	
$legajo = $_POST["legajo"];	
$responsable = $_POST["responsable"];
$puesto = $_POST["puesto"];
$area = $_POST["area"];
$unegocio = $_POST["unegocio"];
$encuadre = $_POST["encuadre"];
$vacaciones = $_POST["vacaciones"];
$ubicacion = $_POST["ubicacion"];
$celular = $_POST["celular"];
$celnum = $_POST["celnum"];
$plan = $_POST["plan"];
$tarjetas = $_POST["tarjetas"];
$telefono = $_POST["telefono"];
$notebook = $_POST["notebook"];
$sap = $_POST["sap"];
$wave = $_POST["wave"];
$sol = $_POST["sol"];
$tango = $_POST["tango"];
$reader = $_POST["reader"];
$photoshop = $_POST["photoshop"];
$illustrator = $_POST["illustrator"];
$corel = $_POST["corel"];
$office = $_POST["office"];
$sql = $_POST["sql"];
$navegacion = $_POST["navegacion"];
$redes = $_POST["redes"];
$streaming = $_POST["streaming"];
$intranet = $_POST["intranet"];
$correo = $_POST["correo"];
$accesos = $_POST["accesos"];
$usuarioAD = $_POST["usuarioAD"];
$pass = $_POST["pass"];
$dirMail = $_POST["dirMail"];
$passMail = $_POST["passMail"];
$team = $_POST["team"];


$to = "pgarcia@grimoldi.com";
$subject = "Alta de usuario";
$message = "
<html>

	<head>	

	</head>
	
	<body>
		<form>
			<h1>Gestion de usuario</h1>
				
				N° Control:
				<div>
					<h3>Ficha Ingreso</h3>
					
					Nombre: ".$nombre."
					
					<br>
					Apellido: ".$apellido."
					
					<br>
					Fecha de ingreso: ".$fecha_ingreso."
					
					<br>
					CUIL: ".$cuil."
					
					<br>
					Legajo: ".$legajo."
					
					<br>
					Responsable: ".$responsable."
					
					<br>
					Puesto: ".$puesto."
					
					<br>
					Area/Gerencia: ".$area."
					
					<br>
					Unidad de negocio: - PU ".$unegocio." 
					
					<br>
					Encuadre: ".$encuadre."
					
					<br>
					Vacaciones: ".$vacaciones."
					
					<br>	
					Ubicacion laboral: ".$ubicacion."
					
					<br>
					Celular: ".$celular."
					
					<br>
					Numero de telefono: ".$celnum."
					
					<br>
					Plan: ".$plan."
					
					<br>
					Tarjetas: ".$tarjetas."
					
					<br>
					Telefono: ".$telefono."
					
					<br>
					Notebook: ".$notebook."
					
				</div>
				
				
				<div>
					<h3>Acceso Requerido</h3>
					
					<br>
					SAP: ".$sap."
					
					<br>
					Wave: ".$wave."
					
					<br>
					SOL: ".$sol."
					
					<br>
					Tango: ".$tango."
			
					<br>
					Adobe Reader: ".$reader."
					
					<br>
					Adobe Photoshop: ".$photoshop."
					
					<br>
					Adobe Illustrator: ".$illustrator."
					
					<br>
					Corel: ".$corel."
					
					<br>
					Office: ".$office."
					
					<br>
					SQL: ".$sql."
					
					<br>
					Navegacion: ".$navegacion."
					
					<br>
					Redes Sociales: ".$redes."
					
					<br>
					Streaming: ".$streaming."
					
					<br>
					Intranet: ".$intranet."
					
					<br>
					Correo: ".$correo."
					
					<br>
					Accesos en la red: ".$accesos."	
					
				</div>
					
				<div>
					<br>
					<h3>Completa Sistemas</h3>
					Usuario AD
					
					<br>
					Contraseña
					
					<br>
					Usuario mail
					
					<br>
					Contraseña
				
					<br>
					Version TeamViewer
				</div>
		
		</form>
		
	</body>

</html>

";

//$headers = "From: administrador@example.com";
$headers  = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: administrador@example.com";
mail($to,$subject,$message,$headers);

echo "<h1>Su solicitud fue procesada con exito</h1>";

?>