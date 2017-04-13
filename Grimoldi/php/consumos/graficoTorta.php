<?php // content="text/plain; charset=utf-8"
session_start();
include "../../clases/database.php";
//agregamos la bibliotecas necesarias
require_once ('../../jpgraph-4.0.1/src/jpgraph.php');
require_once ('../../jpgraph-4.0.1/src/jpgraph_pie.php');

$_SESSION["torta"] = "";
$anio = $_GET["anio"];
$mes = $_GET["mes"];
$sector = $_GET["sector"];
$fecha = $mes."-".$anio;
$consulta_sec ="SELECT CEL.nombre, CEL.sector, CON.mes, CON.total_fijos_variables as total
				FROM celulares as CEL
				RIGHT JOIN consumoscel as CON
				ON CEL.linea = CON.linea 
				WHERE CEL.sector = '$sector'
				AND CON.anio = '$anio'
				AND CON.mes = '$mes';";				

$db = new database();
$db->conectar();

$i=0;			
$result_sec = mysqli_query($db->conexion, $consulta_sec)
or die ("Fallo la consulta, no se pueden mostrar los consumos por sector");
while($ver = mysqli_fetch_assoc($result_sec))
	{
	$usuario = $ver['nombre'];	
	$total = $ver['total'];				
	$usuarios[$i]=$usuario;
	$totales[$i]=$total;
	$i++;
	}

$db->close();
	
// Create the Pie Graph. 
$ancho = 900; 
$alto = 600;
$graph = new PieGraph($ancho,$alto);
$graph->SetScale('int');

//$graph->SetMargin(50,50,50,50);
$graph->title->Set("Consumos por sector (".$fecha.")");
$graph->SetBox(true);

// Create
$p1 = new PiePlot($totales);
$p1->SetLegends($usuarios);
// Setup the labels to be displayed
//$p1->SetLabels($usuarios);
$graph->Add($p1);

$p1->ShowBorder();
$p1->SetColor('black');
//$p1->SetSliceColors(array('#1E90FF','#2E8B57','#ADFF2F','#DC143C','#BA55D3'));

$graph->Stroke();

$fileName = "temp/".$fecha.".png";
$graph->img->Stream($fileName);		
$_SESSION["torta"] = '<img src="'.$fileName.'" alt="'.$fileName.'" border="0">';	
?>