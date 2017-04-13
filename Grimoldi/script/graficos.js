//carga el formulario para un nuevo gasto
function verGraficos(periodo)
			{			
			var anio = document.getElementById("anio").value;			
			var mes = document.getElementById("mes").value;	
			var sector = document.getElementById("filtro").value;	
			
			xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function()	
					{
					if (this.readyState == 4 && this.status == 200)
							{
							document.getElementById("listado").innerHTML = this.responseText;
							}
					};
						
			//xhttp.open("GET", "php/consumos/verGraficos.php?anio="+anio, true);		
			xhttp.open("GET", "php/consumos/verGraficos.php?periodo="+periodo+"&anio="+anio+"&mes="+mes+"&sector="+sector, true);		
			xhttp.send();
			}	
			
//trae el form para cargar los tickets
function cargarTickets()
			{			
			xhttp = new XMLHttpRequest();			
			xhttp.onreadystatechange = function()	
					{
					if (this.readyState == 4 && this.status == 200)
							{
							document.getElementById("contenido").innerHTML = this.responseText;
							}
					};
							
			xhttp.open("GET", "php/estadisticas/cargarTickets.php", true);		
			xhttp.send();
			}				
			
//trae la vista para los graficos
function estadisticas()
			{			
			xhttp = new XMLHttpRequest();			
			xhttp.onreadystatechange = function()	
					{
					if (this.readyState == 4 && this.status == 200)
							{
							document.getElementById("contenido").innerHTML = this.responseText;
							}
					};
							
			xhttp.open("GET", "php/estadisticas/estadisticas.php", true);		
			xhttp.send();
			}	

//trae la vista para los graficos
function graficar(periodo)
			{			
			var anio = document.getElementById("anio").value;			
			var mes = document.getElementById("mes").value;						
			var sector = document.getElementById("filtro").value;
			var datos =  document.getElementById("datos").value;
			
			if(document.getElementById("barras").checked == true)
				{
				var barras = true;
				//alert(tipo);
				}
				else{
					var barras = "";
					}
					
			if(document.getElementById("torta").checked == true)
				{
				var torta = true;
				//alert(tipo);
				}
				else{
					var torta = "";
					}
				
			if(document.getElementById("lineas").checked == true)
				{
				var lineas = true;
				//alert(tipo);
				}
				else{
					var lineas = "";
					}				
			
			if(document.getElementById("completo").checked == true)
				{
				var completo = true;
				//alert(tipo);
				}
				else{
					var completo = "";
					}				
					
			xhttp = new XMLHttpRequest();			
			xhttp.onreadystatechange = function()	
					{
					if (this.readyState == 4 && this.status == 200)
							{
							document.getElementById("graficos").innerHTML = "";	
							document.getElementById("graficos").innerHTML = this.responseText;
							}
					};
							
			xhttp.open("GET", "php/estadisticas/graficar.php?periodo="+periodo+"&anio="+anio+"&mes="+mes+"&sector="+sector+"&barras="+barras+"&torta="+torta+"&lineas="+lineas+"&datos="+datos+"&completo="+completo, true);		
			xhttp.send();			
			}

















			