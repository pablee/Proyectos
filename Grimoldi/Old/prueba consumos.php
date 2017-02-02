<?php
include "../../../clases/database.php";

$i = 0;
$db = new database();
$db->conectar();

$sectores = "SELECT DISTINCT sector FROM consumoscel;";
$resultado = mysqli_query($db->conexion, $sectores)
or die ("Fallo la consulta, no se pueden mostrar los consumos totales");
while($ver = mysqli_fetch_assoc($resultado))
	{
	$centro_costos[$i] = $ver['sector'];
	$i++;
	}	

//total por sector
foreach($centro_costos as $sector)
	{
	$total_sector=0;
	$consulta_sec = "SELECT * FROM consumoscel WHERE sector = '$sector' AND anio = '2017';";
	$result_sec = mysqli_query($db->conexion, $consulta_sec)
	or die ("Fallo la consulta, no se pueden mostrar los consumos por sector");
	while($ver = mysqli_fetch_assoc($result_sec))
		{
		$total_sector+=$ver['total_fijos_variables'];		
		}
	echo $sector;	
	echo $total_sector.'<br>';	
	}
	
	

	
/*	

foreach($centro_costos as $sector)
	{
	echo $sector;
	echo "<br>";
	}
	
$long = count($centro_costos);
for ($i=0;$i<$long;$i++)
	{
	echo $centro_costos[$i];
	echo "<br>";
	}

/*	
<option value="Completo"> Completo </option>
<option value="Sucursales"> Sucursales </option>
<option value="Central"> Central </option>
<option value="Usuarios"> Usuarios </option>
<option value="Desarrollo"> Desarrollo </option>
<option value="Vans"> Vans </option>
<option value="Inyectora"> Inyectora </option>
<option value="Deposito"> Deposito </option>
<option value="Olympikus"> Olympikus </option>
<option value="Tesoreria"> Tesoreria </option>
<option value="Mayoristas"> Mayoristas </option>
<option value="Imagen"> Imagen </option>
<option value="Sourcing"> Sourcing </option>
<option value="Ecommerce"> Ecommerce </option>
<option value="Direccion"> Direccion </option>
<option value="Franquicias"> Franquicias </option>
<option value="TNF"> TNF </option>
<option value="Minorista"> Minorista </option>
<option value="Personal"> Personal </option>
<option value="Planning"> Planning </option>
<option value="Fabrica"> Fabrica </option>
<option value="Sistemas"> Sistemas </option>
<option value="PEF"> PEF </option>
<option value="Keds"> Keds </option>
<option value="RRHH"> RRHH </option>
<option value="Auditoria"> Auditoria </option>
<option value="San Martin"> San Martin </option>

"SELECT * FROM consumoscel WHERE sector = '' fecha LIKE '%$anio%';";
*/

?>