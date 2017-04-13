<?php 
session_start();
include "../../clases/database.php";
require_once ('../../jpgraph-4.0.1/src/jpgraph.php');
require_once ('../../jpgraph-4.0.1/src/jpgraph_line.php');

$db = new database();
$db->conectar();

if($periodo=="mensual")	
	{
	$consulta ="SELECT tecnico, fecha_cierre, estado 
				FROM tickets 
				WHERE fecha_cierre LIKE '%/$mes/$anio%' 
				ORDER BY fecha_cierre DESC ";
	}
	else if($periodo=="anual")	
		{		
		$consulta ="SELECT tecnico, fecha_cierre, estado 
					FROM tickets 
					WHERE fecha_cierre LIKE '%$anio%' 
					ORDER BY fecha_cierre DESC ";
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
	
// Setup the graph
$ancho = 900; 
$alto = 600;

$graph = new Graph($ancho,$alto);
$graph->SetScale("textlin");
//$graph->SetMargin(30,10,40,20);

$theme_class=new UniversalTheme;

$graph->SetTheme($theme_class);
//izq, der, arriba, abajo
$graph->SetMargin(50,50,50,0);
$graph->img->SetAntiAliasing(false);
$graph->title->Set("Cerrados por dia");
$graph->SetBox(false);

$graph->img->SetAntiAliasing();

$graph->yaxis->HideZeroLabel();
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

$graph->xgrid->Show();
$graph->xgrid->SetLineStyle("solid");
$graph->xaxis->SetTickLabels($estados);
$graph->xgrid->SetColor('#E3E3E3');

// Create the first line
$p1 = new LinePlot($cantidades);
$graph->Add($p1);
$p1->SetColor("#6495ED");
$p1->SetLegend('Consumo en $');

$graph->legend->SetFrameWeight(1);

// mostrar el grafico
$graph->Stroke();

$fileName = "temp/total_lineas.png";
$graph->img->Stream($fileName);	
$_SESSION["lineas"] = '<img src="'.$fileName.'" alt="'.$fileName.'" border="0">';	
?>

