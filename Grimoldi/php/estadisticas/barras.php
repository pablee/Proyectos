<?php
session_start();
include "../../clases/database.php";
//agregamos la bibliotecas necesarias
require_once ('../../jpgraph-4.0.1/src/jpgraph.php');
require_once ('../../jpgraph-4.0.1/src/jpgraph_bar.php');

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
	
	//Definir ancho y alto del grafico
	$ancho = 900; 
	$alto = 600;

	//crear la instancia del objeto graph
	$graph = new Graph($ancho, $alto, 'auto');

	//especificar la escala	
	$graph->SetScale('int');

	//Rotate graph 90 degrees and set margin
	//$graph->Set90AndMargin(90,20,50,0);
	$graph->SetMargin(90,30,50,90);
			 
	//Setup title
	$graph->title->Set("Total por estado (".$periodo." ".$fecha.")");
				 
	// Setup X-axis
	$graph->xaxis->SetTickLabels($estados);
	$graph->xaxis->SetLabelAngle(45);

	//crear curva
	$grafico = new BarPlot($cantidades);

	// agregar la curva al grafico
	$graph->Add($grafico);

	// mostrar el grafico
	$graph->Stroke();
	
	$fileName = "temp/estado_".$periodo."_".$fecha.".png";
	$graph->img->Stream($fileName);	
	
	$_SESSION["barras_estado"] = '<img src="'.$fileName.'" alt="'.$fileName.'" border="0">';
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
			}				
		
		// Create the graph. These two calls are always required
		$ancho = 900; 
		$alto = 600;
		$graph = new Graph($ancho, $alto, 'auto');
		$graph->SetScale("textlin");
		$graph->SetMargin(90,30,50,90);
		
		//$theme_class=new UniversalTheme;
		//$graph->SetTheme($theme_class);
		
		//define escala en el eje y
		//$graph->yaxis->SetTickPositions(array(0,30,60,90,120,150), array(15,45,75,105,135));
		$graph->SetBox(false);

		//setfill filas grises y blancas de fondo
		//$graph->ygrid->SetFill(false);
		$graph->xaxis->SetTickLabels($estados_1);
		//$graph->xaxis->SetLabelAngle(45);
		$graph->yaxis->HideLine(false);
		$graph->yaxis->HideTicks(false,false);

		// Create the bar plots
		$b1plot = new BarPlot($cantidades_1);
		$b2plot = new BarPlot($cantidades_2);
		$b3plot = new BarPlot($cantidades_3);

		// Create the grouped bar plot
		$gbplot = new GroupBarPlot(array($b1plot,$b2plot,$b3plot));
		// ...and add it to the graPH
		$graph->Add($gbplot);

		$b1plot->SetColor("white");
		$b1plot->SetFillColor("#cc1111");
		$b1plot->SetLegend($analista_1);
		
		$b2plot->SetColor("white");
		$b2plot->SetFillColor("skyblue3");
		$b2plot->SetLegend($analista_2);
		
		$b3plot->SetColor("white");
		$b3plot->SetFillColor("rosybrown1");
		$b3plot->SetLegend($analista_3);
		
		$graph->title->Set("Tickets por analista ".$periodo."(".$fecha.")");
		
		// Display the graph
		$graph->Stroke();	
		
		$fileName = "temp/analista_".$periodo."_".$fecha.".png";
		$graph->img->Stream($fileName);	
		
		$_SESSION["barras_analista"] = '<img src="'.$fileName.'" alt="'.$fileName.'" border="0">';	
		}
?>
