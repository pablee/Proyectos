<?php
session_start();
$periodo = $_GET["periodo"];
$anio = $_GET["anio"];
$mes = $_GET["mes"];	
$sector = $_GET["sector"];

if($periodo == "anual")
	{
	$mes="";
	echo '<br>';
	echo '<img style="display: block; margin: auto; width: auto;" src="php/consumos/graficoLineas.php?anio='.$anio.'">';	
	echo '<br>';
	echo '<img style="display: block; margin: auto; width: auto;" src="php/consumos/graficoBarras.php?periodo='.$periodo.'&tipo=barras&anio='.$anio.'&mes='.$mes.'">';	
	}
	else if($periodo == "mensual")
		{
		$_SESSION["lineas"] = "";	
		if($mes!="")
			{			
			if($sector!="")
				{
				echo'<div class="row">
						<div class="col-sm-6 col-md-12"> 
							<br>
							<img style="display: block; margin: auto; width: auto;" src="php/consumos/graficoTorta.php?anio='.$anio.'&mes='.$mes.'&sector='.$sector.'">				
							<br>
							<img style="display: block; margin: auto; width: auto;" src="php/consumos/graficoBarras.php?periodo='.$periodo.'&tipo=barras&anio='.$anio.'&mes='.$mes.'">
						</div>
					</div>';
				}
				else{
					echo "Se debe elegir un sector para la consulta";			
					}			
			}
			else{
				echo "Se debe elegir un mes para la consulta";
				}		
		
		}

/*
else if($periodo == "mensual")
		{
		//barras mensual
		echo '<br>';
		echo '<img style="display: block; margin: auto; width: 50%;" src="php/consumos/graficoBarras.php?periodo='.$periodo.'&tipo=barras&anio='.$anio.'&mes='.$mes.'">';	
		//torta mensual
		echo '<br>';
		echo '<img style="display: block; margin: auto; width: 50%;" src="php/consumos/graficoTorta.php?anio='.$anio.'&mes='.$mes.'&sector='.$sector.'">';
		}
*/
?>