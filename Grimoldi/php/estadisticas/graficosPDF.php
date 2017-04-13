<?php
session_start();
?>
<?php

//require_once 'lib/pdf/dompdf_config.inc.php';
use Dompdf\Adapter\CPDF;
use Dompdf\Dompdf;
use Dompdf\Exception;
require_once '../../dompdf/autoload.inc.php';


$html='
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title> Consumo anual </title>
</head>
<body>
	<div>
		'.$_SESSION["completo"].'
		'.$_SESSION["exportar"].'
	</div>	
</body>
</html>';


$pdf = new DOMPDF();

# Definimos el tama&ntilde;o y orientaci&oacute;n del papel que queremos.
//$pdf ->set_paper("A4", "portrait");
$pdf ->set_paper("A4", "landscape");

# Cargamos el contenido HTML.
$pdf ->load_html(utf8_decode($html));

# Renderizamos el documento PDF.
$pdf ->render();

# Enviamos el fichero PDF al navegador.
$pdf ->stream('Resumen tickets');
?>