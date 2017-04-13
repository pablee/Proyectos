<?php // content="text/plain; charset=utf-8"
session_start();
include "../../clases/database.php";
//agregamos la bibliotecas necesarias
require_once ('../../jpgraph-4.0.1/src/jpgraph.php');
require_once ('../../jpgraph-4.0.1/src/jpgraph_pie.php');

$periodo = $_GET["periodo"];
//$tipo = $_GET["tipo"];
$anio = $_GET["anio"];
$mes = $_GET["mes"];
$datos = $_GET["datos"];
$db = new database();
$db->conectar();

if($datos=="categorias")
	{
	if($periodo=="mensual")	
		{
		$fecha = $mes."-".$anio;	
		$consulta ="SELECT categoria, COUNT(*) as cantidad 
					FROM tickets 
					WHERE fecha_alta LIKE '%/$mes/$anio%'
					GROUP BY categoria
					ORDER BY cantidad DESC;";		
									
		}
		else if($periodo=="anual")	
			{	
			$fecha = $anio;	
			$consulta ="SELECT categoria, COUNT(*) as cantidad 
						FROM tickets 
						WHERE fecha_alta LIKE '%$anio%'
						GROUP BY categoria
						ORDER BY cantidad DESC;";				
			}
			
	$i=0;			
	$result_sec = mysqli_query($db->conexion, $consulta)
	or die ("Fallo la consulta, no se pueden mostrar los consumos por sector");
	while($ver = mysqli_fetch_assoc($result_sec))
		{
		$cantidad = $ver['cantidad'];	
		$categoria = $ver['categoria'];				
		$cantidades[$i]=$cantidad;
		$categorias[$i]=$categoria;
		$i++;
		}
		
	$db->close();
		
	// Create the Pie Graph. 
	$ancho = 900; 
	$alto = 600;
	$graph = new PieGraph($ancho,$alto);
	$graph->SetScale('int');

	//$graph->SetMargin(50,50,50,50);
	$graph->title->Set("Totales por categoria ".$fecha);
	$graph->SetBox(true);

	// Create // Setup the labels to be displayed
	$p1 = new PiePlot($cantidades);
	$p1->SetLegends($categorias);
	//$p1->SetLabels($usuarios);
	$graph->Add($p1);
	$p1->ShowBorder();
	$p1->SetColor('black');

	//$p1->SetSliceColors(array('#1E90FF','#2E8B57','#ADFF2F','#DC143C','#BA55D3'));
	$graph->Stroke();

	$fileName = "temp/categorias_".$periodo."_".$fecha.".png";
	$graph->img->Stream($fileName);		
	
	$_SESSION["categorias"] = '<img src="'.$fileName.'" alt="'.$fileName.'" border="0">';
	
	}
	
?>