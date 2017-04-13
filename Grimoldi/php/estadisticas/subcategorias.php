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

if($datos=="subcategorias")
	{
	if($periodo=="mensual")	
		{
		$fecha = $mes."-".$anio;	
		$consulta ="SELECT subcategoria, COUNT(*) as cantidad 
					FROM tickets 
					WHERE fecha_alta LIKE '%/$mes/$anio%'
					GROUP BY subcategoria
					ORDER BY subcategoria DESC;";		
									
		}
		else if($periodo=="anual")	
			{	
			$fecha = $anio;	
			$consulta ="SELECT subcategoria, COUNT(*) as cantidad 
						FROM tickets 
						WHERE fecha_alta LIKE '%$anio%'
						GROUP BY subcategoria
						ORDER BY subcategoria DESC;";				
			}
			
	$i=0;			
	$result_sec = mysqli_query($db->conexion, $consulta)
	or die ("Fallo la consulta, no se pueden mostrar los consumos por sector");
	while($ver = mysqli_fetch_assoc($result_sec))
		{
		$cantidad = $ver['cantidad'];	
		$subcategoria = $ver['subcategoria'];				
		$cantidades[$i]=$cantidad;
		$subcategorias[$i]=$subcategoria;
		$i++;
		}
		
	$db->close();
		
	// Create the Pie Graph. 
	$ancho = 900; 
	$alto = 700;
	$graph = new PieGraph($ancho,$alto);
	

	$graph->title->Set("Totales por subcategoria ".$fecha);
	$p1 = new PiePlot($cantidades);
	$p1->SetSize(0.3);
	$p1->SetCenter(0.3,0.6);
	$p1->SetLabels($subcategorias);
	
	// Setup the labels
	$p1->SetLabelPos(1);
	$p1->SetGuideLines(true, false); // Enable and set policy for guide-lines
	$p1->SetGuideLinesAdjust(1.3);
	$p1->SetLabelType(PIE_VALUE_PER);    
	$p1->value->Show();            
	$p1->value->SetFont(FF_ARIAL,FS_NORMAL,9);    
	$p1->value->SetFormat('%.1f%%');   
	
		
	$graph->Add($p1);
	$p1->ShowBorder();
	$p1->SetColor('black');

	//$p1->SetSliceColors(array('#1E90FF','#2E8B57','#ADFF2F','#DC143C','#BA55D3'));
	$graph->Stroke();

	$fileName = "temp/subcategorias_".$periodo."_".$fecha.".png";
	$graph->img->Stream($fileName);		
	
	$_SESSION["subcategorias"] = '<img src="'.$fileName.'" alt="'.$fileName.'" border="0">';	
	
	}
	
?>