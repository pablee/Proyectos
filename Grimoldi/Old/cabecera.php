<?php
echo '
<head>
	<title>Intranet 2.0</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!--La hoja personalizada de estilos tiene que ir despues de la de bootstrap-->
	<link rel="stylesheet" href="../../css/estilos.css">
	<link rel="stylesheet" href="../../jquery/jquery-ui.css">
 
	<script type="text/javascript" src="../../jquery/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="../../jquery/jquery-ui.js"></script>
	<!--script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script-->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../script/funciones.js"></script>
	
	<script>
		
		$(function() 
			{
			$("#mes").datepicker({ dateFormat: "mm-yy" }).val();	
			$("#datepicker").datepicker({ dateFormat: "dd-mm-yy" }).val();
			});
			
	</script>
	
</head>'

;
?>