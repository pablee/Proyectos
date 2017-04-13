<?php
session_start();
include "../clases/database.php";
include "../clases/articulos.php";

$barra=$_GET["barra"];
/*
if($_SESSION["i"]=="0")
	{
	$articulo[] = new articulo();
	}
	
$articulo[0]->linea="vans";
$articulo[0]->modelo="2";
$articulo[0]->codigo="asdasdsa";
$articulo[0]->medida="11.0";
$articulo[0]->barra=$barra;
$articulo[0]->cantidad="1";

$articulo[0]->ver();

$articulo[1]->linea="vans";
$articulo[1]->modelo="2222";
$articulo[1]->codigo="fffffff";
$articulo[1]->medida="12.0";
$articulo[1]->barra=$barra;
$articulo[1]->cantidad="01";

$articulo[1]->ver();
*/
if($barra!="")
	{
	$_SESSION["barra"][$_SESSION["i"]]=$barra;
	$_SESSION["i"]+="1";	
	}

echo'	
	<div class="table-responsive">          
	  <table class="table">
		<thead>
		  <tr>
			<th> Linea </th>
			<th> Modelo </th>
			<th> Codigo </th>
			<th> Medida </th>
			<th> Barra </th>
		  </tr>
		</thead>
		
		<tbody>
	';

if($barra=="guardar")
	{
	$db = new database();
	$db->conectar();

	foreach($_SESSION["barra"] as $barra)
		{
		$consulta ="SELECT *
					FROM productos
					WHERE barra = $barra;";
			
		$resultado = mysqli_query($db->conexion, $consulta) 
		or die ("No se pudo buscar el codigo de barra en la base.");

		while($producto = mysqli_fetch_assoc($resultado))
			{
			echo'	
				  <tr>
					<td> '.$producto["linea"].' </td>
					<td> '.$producto["modelo"].' </td>
					<td> '.$producto["codigo"].' </td>
					<td> '.$producto["DescMedida"].' </td>
					<td> '.$producto["barra"].' </td>
				  </tr>
				';	
			}
		}
	$db->close();	
	}
	else{	
		foreach($_SESSION["barra"] as $barra)
			{
			//echo $barra;
			echo'	
				  <tr>
					<td>  </td>
					<td>  </td>
					<td>  </td>
					<td>  </td>
					<td> '.$barra.' </td>
				  </tr>
				';
			}
		}
	
echo'	
		</tbody>
	  </table>
	  
	  <button type="button" class="btn btn-info" onclick="ingresarBarras()"> Guardar </button>	
	</div>
	';
?>