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

if($datos=="estado")
	{
	if($periodo=="mensual")	
		{
		$fecha = $mes."-".$anio;	
		$consulta ="SELECT estado, COUNT(*) as cantidad 
					FROM tickets 
					WHERE fecha_alta LIKE '%/$mes/$anio%'
					GROUP BY estado
					ORDER BY cantidad DESC;";											
		}
		else if($periodo=="anual")	
			{	
			$fecha = $anio;	
			$consulta ="SELECT estado, COUNT(*) as cantidad 
						FROM tickets 
						WHERE fecha_alta LIKE '%$anio%'
						GROUP BY estado
						ORDER BY cantidad DESC;";					
			}
			
	$i=0;			
	$result_sec = mysqli_query($db->conexion, $consulta)
	or die ("Fallo la consulta, no se pueden mostrar los consumos por sector");
	while($ver = mysqli_fetch_assoc($result_sec))
		{
		$cantidad = $ver['cantidad'];	
		$estado = $ver['estado'];				
		$cantidades[$i]=$cantidad;
		$estados[$i]=$estado;
		$i++;
		}
		
	$db->close();
		
	// Create the Pie Graph. 
	$ancho = 900; 
	$alto = 600;
	$graph = new PieGraph($ancho,$alto);
	$graph->SetScale('int');

	//$graph->SetMargin(50,50,50,50);
	$graph->title->Set("Totales por estado ".$fecha);
	$graph->SetBox(true);

	// Create // Setup the labels to be displayed
	$p1 = new PiePlot($cantidades);
	$p1->SetLegends($estados);
	//$p1->SetLabels($usuarios);
	$graph->Add($p1);
	$p1->ShowBorder();
	$p1->SetColor('black');

	//$p1->SetSliceColors(array('#1E90FF','#2E8B57','#ADFF2F','#DC143C','#BA55D3'));
	$graph->Stroke();

	$fileName = "temp/torta_estado_".$periodo."_".$fecha.".png";
	$graph->img->Stream($fileName);		
	
	$_SESSION["torta_estado"] = '<img src="'.$fileName.'" alt="'.$fileName.'" border="0">';	
	
	}
	else if($datos=="analista")
		{
		if($periodo=="mensual")	
			{
			$fecha = $mes."-".$anio;	
			$consulta_1 ="SELECT tecnico, estado, count(*) as cantidad
						FROM tickets 
						WHERE tecnico like '%vidal%'
						AND	fecha_alta LIKE '%/$mes/$anio%'				
						GROUP BY estado 
						ORDER BY cantidad DESC
						";
			$consulta_2 ="SELECT tecnico, estado, count(*) as cantidad
						FROM tickets 
						WHERE tecnico like '%pablo%'
						AND	fecha_alta LIKE '%/$mes/$anio%'
						GROUP BY estado
						ORDER BY cantidad DESC					
						";		
			$consulta_3 ="SELECT tecnico, estado, count(*) as cantidad
						FROM tickets 
						WHERE tecnico like '%andretta%'
						AND	fecha_alta LIKE '%/$mes/$anio%'
						GROUP BY estado 
						ORDER BY cantidad DESC
						";				
			}
			else if($periodo=="anual")	
				{
				$fecha = $anio;	
				$consulta_1 ="SELECT tecnico, estado, count(*) as cantidad
							FROM tickets 
							WHERE tecnico like '%vidal%'
							AND	fecha_alta LIKE '%$anio%'				
							GROUP BY estado 
							ORDER BY cantidad DESC
							";	
				$consulta_2 ="SELECT tecnico, estado, count(*) as cantidad
							FROM tickets 
							WHERE tecnico like '%pablo%'
							AND	fecha_alta LIKE '%$anio%'				
							GROUP BY estado 
							ORDER BY cantidad DESC
							";
				$consulta_3 ="SELECT tecnico, estado, count(*) as cantidad
							FROM tickets 
							WHERE tecnico like '%andretta%'
							AND	fecha_alta LIKE '%$anio%'				
							GROUP BY estado 
							ORDER BY cantidad DESC
							";			
				}
		
		//datos analista consulta 1		
		$i=0;
		$j=0;
		$result_sec = mysqli_query($db->conexion, $consulta_1)
		or die ("Fallo la consulta, no se pueden mostrar los tickets por analista");
		while($ver = mysqli_fetch_assoc($result_sec))
			{
			$analista_1 = $ver['tecnico'];			
						
			$cantidad = $ver['cantidad'];				
			$cantidades_1[$i]=$cantidad;
			
			$estado = $ver['estado'];	
			$estados_1[$i]=$estado;
			
			$i++;
			$j++;
			}		
		//datos analista consulta 2					
		$i=0;			
		$result_sec = mysqli_query($db->conexion, $consulta_2)
		or die ("Fallo la consulta, no se pueden mostrar los tickets por analista");
		while($ver = mysqli_fetch_assoc($result_sec))
			{
			$analista_2 = $ver['tecnico'];			
						
			$cantidad = $ver['cantidad'];	
			$cantidades_2[$i]=$cantidad;
			
			$estado = $ver['estado'];							
			$estados_2[$i]=$estado;
			
			$i++;
			$j++;
			}
		//datos analista consulta 3
		$i=0;			
		$result_sec = mysqli_query($db->conexion, $consulta_3)
		or die ("Fallo la consulta, no se pueden mostrar los tickets por analista");
		while($ver = mysqli_fetch_assoc($result_sec))
			{
			$analista_3 = $ver['tecnico'];			
						
			$cantidad = $ver['cantidad'];	
			$cantidades_3[$i]=$cantidad;				
				
			$estado = $ver['estado'];
			$estados_3[$i]=$estado;
			
			$i++;
			$j++;
			}				
		 
		// Create the Pie Graph.
		$ancho = 900; 
		$alto = 400;
		$graph = new PieGraph($ancho,$alto);
		
		// Set A title for the plot
		$graph->title->Set("Tickets por analista ".$periodo."(".$fecha.")");
		$graph->title->SetFont(FF_FONT1,FS_BOLD);
		$graph->legend->SetPos(0.5,0.98,'center','bottom');
		 	 
		// Create plots
		$size=0.25;
		
		//grafico 3
		$p1 = new PiePlot($cantidades_1);
		$graph->Add($p1);
		$p1->SetLegends($estados_1);
		//$p1->SetLabels($estados_1);
		$p1->SetGuideLines(true, false);
		$p1->SetSize($size);
		$p1->SetCenter(0.2,0.5);
		//$p1->value->SetFont(FF_FONT0);
		$p1->title->Set($analista_1);
		$p1->title->SetMargin(10);
		
		//grafico 2	
		$p2 = new PiePlot($cantidades_2);
		$graph->Add($p2);
		//$p2->SetLabels($estados_2);
		$p2->SetGuideLines(true, false);
		$p2->SetSize($size);
		$p2->SetCenter(0.5,0.5);
		//$p2->value->SetFont(FF_FONT0);
		$p2->title->Set($analista_2);
		$p2->title->SetMargin(10);
		
		//grafico 3	
		$p3 = new PiePlot($cantidades_3);
		$graph->Add($p3);		
		//$p3->SetLabels($estados_3);
		$p3->SetGuideLines(true, false);
		$p3->SetSize($size);
		$p3->SetCenter(0.80,0.5);
		//$p3->value->SetFont(FF_FONT0);
		$p3->title->Set($analista_3);
		$p3->title->SetMargin(10);
		 
		$graph->Stroke();	
			
		$fileName = "temp/torta_analista_".$periodo."_".$fecha.".png";
		$graph->img->Stream($fileName);		
		
		$_SESSION["torta_analista"] = '<img src="'.$fileName.'" alt="'.$fileName.'" border="0">';	
		}		
?>