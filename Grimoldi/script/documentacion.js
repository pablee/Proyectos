//constancias de entrega de equipos
			function constancia(valor)
								{
								xhttp = new XMLHttpRequest();
								xhttp.onreadystatechange = function()	
										{
										if (this.readyState == 4 && this.status == 200)
												{
												document.getElementById("contenido").innerHTML = this.responseText;
			 									}
										};
					
								xhttp.open("GET", "php/docs/formConstancia.php?valor="+valor, "true");
								xhttp.send();
								}								
			
			function constanciaNotebook()
								{
								xhttp = new XMLHttpRequest();
								
								var equipo = document.getElementById("equipo").innerHTML;
								var marca = document.getElementById("marca").value;
								var modelo = document.getElementById("modelo").value;
								var nro_serie = document.getElementById("nro_serie").value;
								var uso = document.getElementById("uso").value;
								var usuario = document.getElementById("usuario").value;
								
								xhttp.onreadystatechange = function()	
										{
										if (this.readyState == 4 && this.status == 200)
												{
												document.getElementById("contenido").innerHTML = this.responseText;
			 									}
										};
								
								xhttp.open("GET", "php/docs/generarConstancia.php?equipo="+equipo+"&marca="+marca+"&modelo="+modelo+"&nro_serie="+nro_serie+
											"&uso="+uso+"&usuario="+usuario, true);
								xhttp.send();
								}				
			
			function constanciaCelular()
								{
								xhttp = new XMLHttpRequest();
								
								var equipo = document.getElementById("equipo").innerHTML;
								var marca = document.getElementById("marca").value;
								var modelo = document.getElementById("modelo").value;
								var nro_serie = document.getElementById("nro_serie").value;
								var nro_linea = document.getElementById("nro_linea").value;
								var sim = document.getElementById("sim").value;
								var imei = document.getElementById("imei").value;
								var uso = document.getElementById("uso").value;
								var usuario = document.getElementById("usuario").value;
								
								xhttp.onreadystatechange = function()	
										{
										if (this.readyState == 4 && this.status == 200)
												{
												document.getElementById("contenido").innerHTML = this.responseText;
			 									}
										};
								
								xhttp.open("GET", "php/docs/generarConstancia.php?equipo="+equipo+"&marca="+marca+"&modelo="+modelo+"&nro_serie="+nro_serie+"&nro_linea="+nro_linea+
											"&sim="+sim+"&imei="+imei+"&uso="+uso+"&usuario="+usuario, true);
								xhttp.send();
								}		