<?php
session_start();

$contenido = $_POST["contenido"];
$todos = $_POST["todos"];

$to = "dmontenegro@grimoldi.com, ";

if($todos!=true)
	{
	$mail_1 = $_POST["mail_1"];
	$mail_2 = $_POST["mail_2"];
	$mail_3 = $_POST["mail_3"];
	$mail_4 = $_POST["mail_4"];
	$mail_5 = $_POST["mail_5"];
	$mail_6 = $_POST["mail_6"];
	$mail_7 = $_POST["mail_7"];
	$mail_8 = $_POST["mail_8"];

	$to.= $mail_1;
	$to.= $mail_2;
	$to.= $mail_3;
	$to.= $mail_4;
	$to.= $mail_5;
	$to.= $mail_6;
	$to.= $mail_7;
	$to.= $mail_8;
	}
	else{
		$to.= $todos;
		}
	
$subject = "Plan de locales";
//en el style se incluye parte del css bootstrap para el cuerpo del mail y la tabla
$message = '
	<html lang="en">
	<head>
		<style>
			table, td, th {    
				border-bottom: 1px solid #ddd;
				text-align: left;
			}

			table {
				border-collapse: collapse;
				width: 100%;
			}

			th, td {
				text-align: left;
				padding: 15px;
			}
			
			th {
				background-color: #4CAF50;
				color: white;
			}
		</style>
	</head>

	<body> 
		<div class="row table-responsive">	
			<div class="col-sm-5 col-md-11"> 
				<p>'.$contenido.'<p>
				<br>
				<table id="tablaMail" class="table table-striped">
					<thead class="text-center">
						<tr>
							<th> ID </th>
							<th> Sucursal </th>
							<th> Domicilio </th>	
							<th> Fecha INV. ANT. </th>
							<th> Fecha Proxima </th>
							<th> Hora </th>							
							<th> * </th>			
							<th> Telefono </th>							
						</tr>
					</thead>
					
					<tbody id="semana">
				';

foreach($_SESSION["mensaje"] as $mensaje)
	{
	$message .= $mensaje;
	}

$message .= '							
					</tbody>
				</table> 
			</div>
		</div>
	</body>
	</html>
	';

$headers  = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: dmontenegro@grimoldi.com";
mail($to,$subject,$message,$headers);

echo $message;
echo $to;

header("location: ../../../home.php?verSemana=true");	
?>

