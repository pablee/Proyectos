<?php
session_start();
include "../../clases/database.php";
//agregamos la bibliotecas necesarias
require_once ('../../jpgraph-4.0.1/src/jpgraph.php');
require_once ('../../jpgraph-4.0.1/src/jpgraph_bar.php');

$periodo = $_GET["periodo"];
$tipo = $_GET["tipo"];
$anio = $_GET["anio"];
$mes = $_GET["mes"];

if($periodo=="anual")
	{
	$consulta_sec ="SELECT CEL.sector, SUM(CON.total_fijos_variables) as total
					FROM celulares as CEL 
					JOIN consumoscel as CON 
					ON CEL.linea=CON.linea 
					WHERE CON.anio = '$anio'
					GROUP BY CEL.sector
					ORDER BY total DESC;";	
	$fecha = $anio;				
	}
	else{
		$consulta_sec ="SELECT CEL.sector, SUM(CON.total_fijos_variables) as total
						FROM celulares as CEL 
						JOIN consumoscel as CON 
						ON CEL.linea=CON.linea 
						WHERE CON.anio = '$anio'
						AND CON.mes = '$mes'
						GROUP BY CEL.sector;";
		$fecha = $mes."-".$anio;									
		}

$db = new database();
$db->conectar();

if($tipo ==	"barras")
	{
	$i=0;	
			
	$result_sec = mysqli_query($db->conexion, $consulta_sec)
	or die ("Fallo la consulta, no se pueden mostrar los consumos por sector");
	while($ver = mysqli_fetch_assoc($result_sec))
		{
		$sector = $ver['sector'];	
		$total = $ver['total'];				
		$sectores[$i]=$sector;
		$totales[$i]=$total;
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
	$graph->title->Set("Consumo ".$periodo."(".$fecha.")");
				 
	// Setup X-axis
	$graph->xaxis->SetTickLabels($sectores);
	$graph->xaxis->SetLabelAngle(45);

	//crear curva
	$grafico = new BarPlot($totales);

	// Setup color for gradient fill style
	//$grafico->SetFillGradient("navy:0.9","navy:1.85",GRAD_LEFT_REFLECTION);

	// agregar la curva al grafico
	$graph->Add($grafico);

	// mostrar el grafico
	$graph->Stroke();
	$fileName = "temp/".$periodo."_".$fecha.".png";
	$graph->img->Stream($fileName);	
	
	$_SESSION["barras"] = '<img src="php/consumos/'.$fileName.' alt="'.$fileName.'" border="0">';		
	}
	
?>
