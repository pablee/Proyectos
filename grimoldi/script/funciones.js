/*
			//muestra el stock completo, incluyendo asignados y disponibles
			function stockCompleto()
								{
								xhttp = new XMLHttpRequest();
								xhttp.onreadystatechange = function()	
										{
										if (this.readyState == 4 && this.status == 200)
												{
												document.getElementById("contenido").innerHTML = this.responseText;
												}
										};
					
								xhttp.open("GET", "php/stock/stockCompleto.php", "true");
								xhttp.send();
								}

			//muestra el stock disponibles
			function stockDisponible()
								{
								xhttp = new XMLHttpRequest();
								xhttp.onreadystatechange = function()	
										{
										if (this.readyState == 4 && this.status == 200)
												{
												document.getElementById("contenido").innerHTML = this.responseText;
												}
										};
					
								xhttp.open("GET", "php/stock/stockDisponible.php", "true");
								xhttp.send();
								}

			//muestra el stock asignado
			function stockAsignado()
								{
								xhttp = new XMLHttpRequest();
								xhttp.onreadystatechange = function()	
										{
										if (this.readyState == 4 && this.status == 200)
												{
												document.getElementById("contenido").innerHTML = this.responseText;
			 									}
										};
					
								xhttp.open("GET", "php/stock/stockAsignado.php", "true");
								xhttp.send();
								}	
		
			//egreso de stock
			function stockEgreso()
								{
								xhttp = new XMLHttpRequest();
								xhttp.onreadystatechange = function()	
										{
										if (this.readyState == 4 && this.status == 200)
												{
												document.getElementById("contenido").innerHTML = this.responseText;
												}
										};
					
								xhttp.open("GET", "php/stock/stockEgreso.php", "true");
								xhttp.send();
								}	
*/		
			//edita los campos en el stock
			function editar(idCampo)
								{
								var xhttp = new XMLHttpRequest();
								
								var valorCampo = document.getElementById(idCampo).innerHTML;
																
								xhttp.onreadystatechange = function() 
									{
									if (this.readyState == 4 && this.status == 200) 
										{
										document.getElementById(idCampo+"Contenido").innerHTML = this.responseText;
										}
									};
								xhttp.open("GET", "php/stock/editado.php?valorCampo="+valorCampo+"&idCampo="+idCampo, true);
								xhttp.send();			
								}

			//boton aceptar edicion
			function aceptar(idCampo)
								{
								var xhttp = new XMLHttpRequest();
								var valorCampo = document.getElementById(idCampo).value;
								
								xhttp.onreadystatechange = function() 
									{
									if (this.readyState == 4 && this.status == 200) 
										{
										document.getElementById(idCampo+"Contenido").innerHTML = this.responseText;
										}
									};
								xhttp.open("GET", "php/stock/aceptaEdicion.php?idCampo="+idCampo+"&valorCampo="+valorCampo, true);
								
								xhttp.send();			
								}
								
			//guarda los campos editados en stock
			function guardar(id)
								{
								var xhttp = new XMLHttpRequest();
								
								var estado = document.getElementById(id+"Estado").innerHTML;
								var equipo = document.getElementById(id+"Equipo").innerHTML;
								var marca = document.getElementById(id+"Marca").innerHTML;
								var modelo = document.getElementById(id+"Modelo").innerHTML;
								var nro_serie = document.getElementById(id+"Nro_serie").innerHTML;
								var sistema_operativo = document.getElementById(id+"Sistema_operativo").innerHTML;
								var licencia = document.getElementById(id+"Licencia").innerHTML;
								var procesador = document.getElementById(id+"Procesador").innerHTML;
								var memoria = document.getElementById(id+"Memoria").innerHTML;
								var hdd = document.getElementById(id+"Hdd").innerHTML;
								var detalles = document.getElementById(id+"Detalles").innerHTML;
								var fecha_ingreso = document.getElementById(id+"Fecha_ingreso").innerHTML;
								var fecha_envio = document.getElementById(id+"Fecha_envio").innerHTML;
								var deposito = document.getElementById(id+"Deposito").innerHTML;
								var destino = document.getElementById(id+"Destino").innerHTML;
								var sector = document.getElementById(id+"Sector").innerHTML;
								var usuario = document.getElementById(id+"Usuario").innerHTML;
								
								
								xhttp.onreadystatechange = function() 
									{
									if (this.readyState == 4 && this.status == 200) 
										{
										document.getElementById("guardar").innerHTML = this.responseText;
										}
									};
								
								xhttp.open("GET", "php/stock/guardar.php?id="+id+"&estado="+estado+"&equipo="+equipo+"&marca="+marca+"&modelo="+modelo+"&nro_serie="+nro_serie+
											"&sistema_operativo="+sistema_operativo+"&licencia="+licencia+"&procesador="+procesador+"&memoria="+memoria+"&hdd="+hdd+
											"&detalles="+detalles+"&fecha_ingreso="+fecha_ingreso+"&fecha_envio="+fecha_envio+"&deposito="+deposito+"&destino="+destino+
											"&sector="+sector+"&usuario="+usuario, true);
								
								xhttp.send();			
								}
			
			//carga el form para el nuevo ingreso
			function nuevoIngreso()
								{
								var xhttp = new XMLHttpRequest();
																
								xhttp.onreadystatechange = function() 
									{
									if (this.readyState == 4 && this.status == 200) 
										{
										document.getElementById("contenido").innerHTML = this.responseText;
										}
									};
								xhttp.open("GET", "php/stock/nuevoIngreso.php", true);
								
								xhttp.send();			
								}
			
			//ingresar stock
			function ingresarStock()
								{
								var xhttp = new XMLHttpRequest();
								
								var equipo = document.getElementById("equipo").value;
								var cantidad = document.getElementById("cantidad").value;
								var marca = document.getElementById("marca").value;
								var modelo = document.getElementById("modelo").value;
								var nro_serie = document.getElementById("nro_serie").value;
								var sistema_operativo = document.getElementById("sistema_operativo").value;
								var licencia = document.getElementById("licencia").value;
								var procesador = document.getElementById("procesador").value;
								var memoria = document.getElementById("memoria").value;
								var hdd = document.getElementById("hdd").value;
								var detalles = document.getElementById("detalles").value;
								//var fecha_ingreso = document.getElementById("fecha_ingreso").value;
								var fecha_envio = document.getElementById("fecha_envio").value;
								var deposito = document.getElementById("deposito").value;
								var destino = document.getElementById("destino").value;
								var sector = document.getElementById("sector").value;
								var usuario = document.getElementById("usuario").value;
								
								xhttp.onreadystatechange = function() 
									{
									if (this.readyState == 4 && this.status == 200) 
										{
										document.getElementById("contenido").innerHTML = this.responseText;
										}
									};
								
								xhttp.open("GET", "php/stock/ingresarStock.php?equipo="+equipo+"&cantidad="+cantidad+"&marca="+marca+"&modelo="+modelo+"&nro_serie="+nro_serie+
											"&sistema_operativo="+sistema_operativo+"&licencia="+licencia+"&procesador="+procesador+"&memoria="+memoria+"&hdd="+hdd+
											"&detalles="+detalles+"&fecha_envio="+fecha_envio+"&deposito="+deposito+"&destino="+destino+
											"&sector="+sector+"&usuario="+usuario, true);
								
								xhttp.send();			
								}								
/*
			//asigna los equipos en el stock (SIN USAR POR AHORA)
			function asignar(id)
								{
								var xhttp = new XMLHttpRequest();
																
								var destino = document.getElementById("destino").value;
								var sector = document.getElementById("sector").value;
								var usuario = document.getElementById("usuario").value;
								
								xhttp.onreadystatechange = function() 
									{
									if (this.readyState == 4 && this.status == 200) 
										{
										document.getElementById(idCampo).innerHTML = this.responseText;
										}
									};
									
								xhttp.open("GET", "php/stock/estado.php?id="+id+"&destino="+destino+"&sector="+sector+"&usuario="+usuario, true);
								xhttp.send();			
								}
*/
			//muestra el stock dependiendo de la opcion elegida
			function verStock(valor)
								{
								xhttp = new XMLHttpRequest();
								xhttp.onreadystatechange = function()	
										{
										if (this.readyState == 4 && this.status == 200)
												{
												document.getElementById("contenido").innerHTML = this.responseText;
			 									}
										};
					
								xhttp.open("GET", "php/stock/verStock.php?valor="+valor, "true");
								xhttp.send();
								}						
								
			
			
			