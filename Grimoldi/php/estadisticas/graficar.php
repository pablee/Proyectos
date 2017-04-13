<?php
session_start();
//datos para la consulta del grafico
$periodo = $_GET["periodo"];
$anio = $_GET["anio"];
$mes = $_GET["mes"];	
$sector = $_GET["sector"];
$datos = $_GET["datos"];

//tipos de grafico
$barras = $_GET["barras"];
$torta = $_GET["torta"];
$lineas = $_GET["lineas"];
$completo = $_GET["completo"];

$_SESSION["exportar"] =	"";
$_SESSION["completo"] = "";

if($periodo=="mensual")	
	{
	$fecha = $mes."-".$anio;			
	}
	else if($periodo=="anual")	
		{			
		$fecha = $anio;		
		}

if($barras==true)
	{	
	echo '<img style="display: block; margin: auto; width: auto;" src="php/estadisticas/barras.php?periodo='.$periodo.'&anio='.$anio.'&mes='.$mes.'&datos='.$datos.'">';		
	
	$_SESSION["completo"] = "";
	if($datos=="estado")
		{
		$barras_estado = "temp/estado_".$periodo."_".$fecha.".png";				
		$_SESSION["exportar"] = '<img src="'.$barras_estado.'" alt="'.$barras_estado.'" border="0">';	
		}
	if($datos=="analista")
		{
		$barras_analista = "temp/analista_".$periodo."_".$fecha.".png";				
		$_SESSION["exportar"] .= '<img src="'.$barras_analista.'" alt="'.$barras_analista.'" border="0">';	
		}	
	}
	else if($barras==false)
		{
		$_SESSION["exportar"] = "";	
		}
	
if($torta==true)
	{
	echo '<img style="display: block; margin: auto; width: auto;" src="php/estadisticas/torta.php?periodo='.$periodo.'&anio='.$anio.'&mes='.$mes.'&datos='.$datos.'">';				
	
	$_SESSION["completo"] = "";
	if($datos=="estado")
		{
		$torta_estado = "temp/torta_estado_".$periodo."_".$fecha.".png";
		$_SESSION["exportar"] .= '<img src="'.$torta_estado.'" alt="'.$torta_estado.'" border="0">';
		}
	if($datos=="analista")
		{
		$torta_analista = "temp/torta_analista_".$periodo."_".$fecha.".png";				
		$_SESSION["exportar"] .= '<img src="'.$torta_analista.'" alt="'.$torta_analista.'" border="0">';	
		}	
	}
	
if($lineas==true)
	{
	//echo '<img style="display: block; margin: auto; width: auto;" src="php/estadisticas/lineas.php?periodo='.$periodo.'&anio='.$anio.'&mes='.$mes.'&datos='.$datos.'">';		
	}	

if($completo==true)
	{
	echo '<br><img style="display: block; margin: auto; width: auto;" src="php/estadisticas/barras.php?periodo='.$periodo.'&anio='.$anio.'&mes='.$mes.'&datos=estado">';
	echo '<br><img style="display: block; margin: auto; width: auto;" src="php/estadisticas/torta.php?periodo='.$periodo.'&anio='.$anio.'&mes='.$mes.'&datos=estado">';
	echo '<br><img style="display: block; margin: auto; width: auto;" src="php/estadisticas/categorias.php?periodo='.$periodo.'&anio='.$anio.'&mes='.$mes.'&datos=categorias">';		
	echo '<br><img style="display: block; margin: auto; width: auto;" src="php/estadisticas/subcategorias.php?periodo='.$periodo.'&anio='.$anio.'&mes='.$mes.'&datos=subcategorias">';		
				
	//limpia la ruta de IMG individuales				
	$_SESSION["exportar"] =	"";		
	//ruta de las IMG para exportar los graficos de la consulta "COMPLETA"				
	$barras_estado = "temp/estado_".$periodo."_".$fecha.".png";				
	$_SESSION["completo"] = '<img src="'.$barras_estado.'" alt="'.$barras_estado.'" border="0">';

	$torta_estado = "temp/torta_estado_".$periodo."_".$fecha.".png";
	$_SESSION["completo"] .= '<img src="'.$torta_estado.'" alt="'.$torta_estado.'" border="0">';	

	$categorias = "temp/categorias_".$periodo."_".$fecha.".png";
	$_SESSION["completo"] .= '<img src="'.$categorias.'" alt="'.$categorias.'" border="0">';
	 
	$subcategorias = "temp/subcategorias_".$periodo."_".$fecha.".png";
	$_SESSION["completo"] .= '<img src="'.$subcategorias.'" alt="'.$subcategorias.'" border="0">';	
	}	
	
?>