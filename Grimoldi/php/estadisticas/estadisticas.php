<?php
session_start();

echo'
	<br>
	<div class="row">		
		<div class="col-sm-1 col-md-2 panel panel-default panel-body"> 
			<label> Datos del grafico </label>
			<select type = "text" class="form-control" id="datos">
				<option value="estado"> Estado </option>
				<option value="analista"> Analista </option>				
			</select>
			
			<br>	
			
			<label> Periodo </label>
			<select type = "text" class="form-control" id = "filtro" disabled>
				<option value=""> Sector </option>		
				<option value="Auditoria"> Auditoria </option>		
			</select>
			
			<select type = "text" class="form-control" id="mes">				
				<option value="01"> Enero </option>	
				<option value="02"> Febrero </option>
				<option value="03"> Marzo </option>
				<option value="04"> Abril </option>
				<option value="05"> Mayo </option>
				<option value="06"> Junio </option>
				<option value="07"> Julio </option>
				<option value="08"> Agosto </option>
				<option value="09"> Septiembre </option>
				<option value="10"> Octubre </option>
				<option value="11"> Noviembre </option>
				<option value="12"> Diciembre </option>				
			</select>
			<select type = "text" class="form-control" id="anio">
				<option value="2017"> 2017 </option>
				<option value="2016"> 2016 </option>				
			</select>		
		
			<br>	
			
			<label> Tipo de grafico </label>
			<div class="text-left">					
				<label class="control-label"><input type="checkbox" id="barras" value="barras"> Barras </label>
				<label class="control-label"><input type="checkbox" id="torta"  value="torta"> Torta </label>
				<label class="control-label"><input type="checkbox" id="lineas" value="lineas" disabled> Lineas </label>	
				<label class="control-label"><input type="checkbox" id="completo" value="completo"> Completo </label>										
			</div>			
		
			<br>
		
			<div class="btn-group">
				<button type="button" class="btn btn-danger" value="anual" onclick="graficar(this.value)">Anual</button>
				<button type="button" class="btn btn-danger" value="mensual" onclick="graficar(this.value)">Mensual</button>
				<a href="php/estadisticas/graficosPDF.php" class="btn btn-info btn-md">
					Exportar
				</a>	
			</div>	
		</div>
		
		<div class="col-sm-4 col-md-8" id="graficos">
			
		</div>
	</div>
	';
	
echo'
	
	';	
	
?>