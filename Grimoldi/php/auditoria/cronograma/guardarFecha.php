<?php
session_start();
include "../../../clases/database.php";

$fecha_prox=$_GET["fecha_prox"];
$hora=$_GET["hora"];

if($fecha_prox!="")
	{
	$_SESSION["fecha_prox"][$_SESSION["j"]]=$fecha_prox;	
	$_SESSION["hora"][$_SESSION["j"]]=$hora;	
	$_SESSION["j"]+="1";
	}

?>