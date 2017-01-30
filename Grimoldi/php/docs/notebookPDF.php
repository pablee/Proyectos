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
	<title>Constancia de entrega</title>
</head>
<body>
	<i>
	 <img src="../../imagenes/encabezadoPDF.jpg" alt="encabezado"> 
	
	<br>CONSTANCIA DE ENTREGA Y CONDICIONES DE USO DE EQUIPOS DE PROPIEDAD DE GRIMOLDI S.A.:
	<br>
	<br>Por medio del presente se deja constancia que se entregan en &eacute;ste acto los siguientes equipos:
	<br>
	<br>'.$_SESSION['equipo'].' Marca: '.$_SESSION['marca'].', Modelo: '.$_SESSION['modelo'].', Serie N°'.$_SESSION['nro_serie'].' Motivo de Uso: '.$_SESSION['uso'].', propiedad de GRIMOLDI S.A.
	<br>Los Equipos detallados se entregan en perfecto estado, a fin de su uso y afectaci&oacute;n estrictamente laboral y acorde a sus funciones laborales en la empresa GRIMOLDI S.A., lo que deber&aacute; realizarse en un todo de acuerdo a las pol&iacute;ticas de uso que le fueran a Ud. Oportunamente notificadas.
	<br>	
	<br>Se le notifica en este acto que es de su obligaci&oacute;n devolver los Equipos en perfecto estado de uso y conservaci&oacute;n y que deber&aacute; proceder a su devoluci&oacute;n en forma inmediata al momento en que le sean requeridos por la empresa, en las mismas condiciones en que estaban al momento en que le fueran entregados y con todos sus accesorios, es decir, en perfectas condiciones de uso, salvo el desgaste por el buen uso y el paso del tiempo, y en un plazo no mayor a tres (3) d&iacute;as desde que GRIMOLDI S.A. se lo hubiere requerido.
	<br>
	<br>Del mismo modo y para el supuesto de extinci&oacute;n de la relaci&oacute;n laboral con GRIMOLDI S.A., deber&aacute; proceder a la devoluci&oacute;n de los equipos y todos sus accesorios dentro de las 48 hs. de extinguido el v&iacute;nculo laboral cualquiera fuera la causal sin necesidad de requerimiento previo. 
	<br>
	<br>En caso de p&eacute;rdida o destrucci&oacute;n total o parcial de los Equipos y/o sus accesorios por culpa, negligencia o uso indebido, quedar&aacute; obligado a pagar el costo de reparaci&oacute;n y/o su valor de reposici&oacute;n, o a sustituirlos por otros similares y sin uso, a satisfacci&oacute;n de GRIMOLDI S.A., en el plazo m&aacute;ximo de siete (7) d&iacute;as, contados desde la fecha en que se hubiera producido la p&eacute;rdida y/o el da&ntilde;o. 
	<br>
	<br>Por ning&uacute;n motivo dichos Equipos podr&aacute;n ser utilizados para su beneficio particular y/o de su grupo familiar y/o actividades extra laborales, cualquiera fuera el motivo de las mismas. El uso indebido podr&aacute; ser considerado por GRIMOLDI S.A. falta grave por trasgresi&oacute;n a los deberes de buena fe, fidelidad, de diligencia y colaboraci&oacute;n, como as&iacute; tambi&eacute;n incumplimiento inexcusable de expresas &oacute;rdenes e instrucciones impartidas, sin perjuicio de la responsabilidad que pudiera generarse por la utilizaci&oacute;n de los Equipos para fines extra laborales como tales no autorizados.
	<br>
	<br>Conforme lo aqu&iacute; establecido y sin perjuicio de las eventuales sanciones por el uso indebido de los Equipos, GRIMOLDI S.A. se encuentra habilitada a debitar de sus haberes las sumas que figuren en el resumen de cuenta del tel&eacute;fono celular por llamadas que no correspondan a los propias de su actividad y desempe&ntilde;o laboral y/o por la reposici&oacute;n de los Equipos por su culpa o negligencia.
	</i>
	<br>
	<br>
<b>
	<br>A los '.$_SESSION['dias'].' D&iacute;as del mes de '.$_SESSION['mes'].' de '.$_SESSION['anio'].' recibo en este acto de conformidad y en las condiciones arriba expuestas los Equipos detallados y sus accesorios en perfecto estado, y me notifico de conformidad de las condiciones de uso y obligaciones a mi cargo arriba expuestas.
	<br>
	<br>Firma:
	<br>Aclaraci&oacute;n: '.$_SESSION['usuario'].'
	<br>D.N.I.
</b>
	
</body>
</html>';


$pdf = new DOMPDF();

# Definimos el tama&ntilde;o y orientaci&oacute;n del papel que queremos.
$pdf ->set_paper("A4", "portrait");

# Cargamos el contenido HTML.
$pdf ->load_html(utf8_decode($html));

# Renderizamos el documento PDF.
$pdf ->render();

# Enviamos el fichero PDF al navegador.
$pdf ->stream('Notebook');
?>