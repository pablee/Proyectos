<?php 
session_start();
include "../../clases/database.php";
require_once ('../../jpgraph-4.0.1/src/jpgraph.php');
require_once ('../../jpgraph-4.0.1/src/jpgraph_line.php');

$_SESSION["lineas"] = "";
$anio = $_GET["anio"];
$consulta_sec ="SELECT CON.mes, SUM(CON.total_fijos_variables) as total
				FROM celulares as CEL
				RIGHT JOIN consumoscel as CON
				ON CEL.linea = CON.linea 
				WHERE CON.anio = '$anio'
				GROUP BY CON.mes;";				

$db = new database();
$db->conectar();

$i=0;	
$result_sec = mysqli_query($db->conexion, $consulta_sec)
or die ("Fallo la consulta, no se pueden mostrar los consumos por sector");
while($ver = mysqli_fetch_assoc($result_sec))
	{
	$mes = $ver['mes'];	
	$total = $ver['total'];				
	$meses[$i]=$mes;
	$totales[$i]=$total;
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
$graph->title->Set("Consumo anual(".$anio.")");
$graph->SetBox(false);

$graph->img->SetAntiAliasing();

$graph->yaxis->HideZeroLabel();
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

$graph->xgrid->Show();
$graph->xgrid->SetLineStyle("solid");
$graph->xaxis->SetTickLabels(array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'));
//$graph->xaxis->SetTickLabels($meses);
$graph->xgrid->SetColor('#E3E3E3');

// Create the first line
$p1 = new LinePlot($totales);
$graph->Add($p1);
$p1->SetColor("#6495ED");
$p1->SetLegend('Consumo en $');

$graph->legend->SetFrameWeight(1);

// mostrar el grafico
$graph->Stroke();

$fileName = "temp/lineas_".$anio.".png";
$graph->img->Stream($fileName);	
$_SESSION["lineas"] = '<img src="'.$fileName.'" alt="'.$fileName.'" border="0">';	
?>

