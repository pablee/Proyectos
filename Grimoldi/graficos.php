<?php
	
	include "clases/database.php";
	include_once ("jpgraph-4.0.1/src/jpgraph.php"); 
	include_once ("jpgraph-4.0.1/src/jpgraph_bar.php");
	
	//$anio = $_GET["anio"];
	$anio = '2016';
	$select = 	"SELECT CEL.id, CEL.nombre, CEL.sector, CEL.plan, CEL.linea, CON.plan_voz, CON.servicio_voz, CON.pack_sms, CON.pack_datos, CON.garantia, CON.otros_servicios, CON.total_fijos, CON.voz,
			CON.red, CON.mensajes, CON.datos, CON.roaming, CON.otros_cargos, CON.total_variables, CON.unica_vez, CON.total_fijos_variables
			FROM celulares as CEL, consumoscel as CON
			WHERE CEL.linea = CON.linea ";

	$db = new database();
	$db->conectar();
	
	$consulta_gral = $select." AND CON.anio = '$anio';";
	$consulta_suc = $select." AND CEL.sector = 'Sucursales' AND CON.anio = '$anio';";
	$consulta_cen = $select." AND CEL.sector LIKE '%Central%' AND CON.anio = '$anio';";
	$consulta_usu = $select." AND CEL.sector != '%Central' AND CEL.sector != 'Sucursales' AND CON.anio = '$anio';";
	
	$i=0;
	//carga en un array todos los centros de costo
	$sectores = "SELECT DISTINCT sector FROM celulares;";
	$resultado = mysqli_query($db->conexion, $sectores)
	or die ("Fallo la consulta, no se pueden mostrar los consumos totales por sector");
	while($ver = mysqli_fetch_assoc($resultado))
		{
		$centro_costos[$i] = $ver['sector'];
		$i++;
		}
		
	//total general 
	$resultado = mysqli_query($db->conexion, $consulta_gral)
	or die ("Fallo la consulta, no se pueden mostrar los consumos totales");
	while($ver = mysqli_fetch_assoc($resultado))
		{
		$general+=$ver['total_fijos_variables'];
		}	
		
	//total sucursales 
	$resultado = mysqli_query($db->conexion, $consulta_suc)
	or die ("Fallo la consulta, no se pueden mostrar los consumos de Sucursales");
	while($ver = mysqli_fetch_assoc($resultado))
		{
		$sucursales+=$ver['total_fijos_variables'];
		}
		
	//total central 
	$resultado = mysqli_query($db->conexion, $consulta_cen)
	or die ("Fallo la consulta, no se pueden mostrar los consumos de Casa Central");
	while($ver = mysqli_fetch_assoc($resultado))
		{
		$central+=$ver['total_fijos_variables'];
		}
		
	//total usuarios 
	$resultado = mysqli_query($db->conexion, $consulta_usu)
	or die ("Fallo la consulta, no se pueden mostrar los consumos de usuarios");
	while($ver = mysqli_fetch_assoc($resultado))
		{
		$usuarios+=$ver['total_fijos_variables'];
		}
/*					
	$datos[0]=$general;
	$datos[1]=$sucursales;
	$datos[2]=$central;
	$datos[3]=$usuarios;

// Creamos el grafico
$labels=array("General","Sucursal","Central","Usuarios");

$grafico = new Graph(500, 400, 'auto');
$grafico->SetScale("textlin");
$grafico->title->Set("Consumo anual 2016");
$grafico->xaxis->title->Set("Sectores");
$grafico->xaxis->SetTickLabels($labels);
$grafico->yaxis->title->Set("Pesos");

$barplot1 =new BarPlot($datos);
$barplot1->SetWidth(30); // 30 pixeles de ancho para cada barra

$grafico->Add($barplot1);
$grafico->Stroke();*/

// Creamos el grafico
$datos=array(6,5,8,6);
$labels=array("pepe","juanita","Maria","Luis");

$grafico = new Graph(500, 400, 'auto');
$grafico->SetScale("textlin");
$grafico->title->Set("Ejemplo de Grafica");
$grafico->xaxis->title->Set("trabajadores");
$grafico->xaxis->SetTickLabels($labels);
$grafico->yaxis->title->Set("Horas Trabajadas");

$barplot1 =new BarPlot($datos);
$barplot1->SetWidth(30); // 30 pixeles de ancho para cada barra

$grafico->Add($barplot1);
$grafico->Stroke();
	$db->close();	
?>