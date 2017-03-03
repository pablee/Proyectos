			//carga el formulario para un nuevo gasto
			function nuevoConsumo()
								{
								xhttp = new XMLHttpRequest();
								xhttp.onreadystatechange = function()	
										{
										if (this.readyState == 4 && this.status == 200)
												{
												document.getElementById("contenido").innerHTML = this.responseText;
			 									}
										};
					
								xhttp.open("GET", "php/consumos/celular/nuevoMes.php", "true");
								xhttp.send();
								}		
								
			//total nuevo ingreso
			function consumoTotal()
								{
								var cantidad = document.getElementById("cantidad").value;
								var valor = document.getElementById("valor").value;
								var total = (cantidad*valor);
								//document.getElementById("total").value = total;
								document.getElementById("total").innerHTML = total;
								}	

			function cambio()
								{
								var cantidad = document.getElementById("cantidad").value;
								var valor = document.getElementById("valor").value;
								var cambio = document.getElementById("tipoCambio").value;
								var moneda = document.getElementById("moneda").value;
								var total = (valor*cambio*cantidad);
								
								if(moneda == "dolar")
									{
									document.getElementById("total").innerHTML = total;
									}
								}	
								
			//ingresa nuevo gasto					
			function pasarGasto()
								{
								xhttp = new XMLHttpRequest();
								
								var factura = document.getElementById("factura").value;
								var proovedor = document.getElementById("proovedor").value;
								var mes = document.getElementById("mes").value;
								var fecha = document.getElementById("datepicker").value;
								var detalle = document.getElementById("detalle").value;
								var tipo = document.getElementById("tipo").value;
								var unidad = document.getElementById("unidad").value;
								var cantidad = document.getElementById("cantidad").value;
								var valor = document.getElementById("valor").value;
								var total = document.getElementById("total").innerHTML;
								var dispositivo = document.getElementById("dispositivo").value;
								var moneda = document.getElementById("moneda").value;
								var cambio = document.getElementById("tipoCambio").value;
								
								xhttp.onreadystatechange = function()	
										{
										if (this.readyState == 4 && this.status == 200)
												{
												document.getElementById("ingresados").innerHTML = this.responseText;
			 									}
										};
								
								xhttp.open("GET", "guardarGasto.php?factura="+factura+"&proovedor="+proovedor+"&mes="+mes+"&fecha="+fecha+"&detalle="+detalle+
											"&tipo="+tipo+"&unidad="+unidad+"&cantidad="+cantidad+"&valor="+valor+"&total="+total+"&dispositivo="+dispositivo+"&moneda="+moneda+
											"&cambio="+cambio, true);
								xhttp.send();
								
								}	
			
			//ver gastos
			function verConsumos(valor)
								{
								xhttp = new XMLHttpRequest();
								xhttp.onreadystatechange = function()	
										{
										if (this.readyState == 4 && this.status == 200)
												{
												document.getElementById("contenido").innerHTML = this.responseText;
			 									document.getElementById("ingresados").innerHTML = "";
												}
										};
								
								if(valor == 1)
									{
									xhttp.open("GET", "php/consumos/gastos/verConsumos.php", "true");
									}
									else{
										xhttp.open("GET", "verConsumos.php", "true");
										}
								xhttp.send();
								}			

			//carga el formulario del gasto a eliminar
			function formBorrar(valor)
								{
								xhttp = new XMLHttpRequest();								
								xhttp.onreadystatechange = function()	
										{
										if (this.readyState == 4 && this.status == 200)
												{
												document.getElementById("contenido").innerHTML = this.responseText;			 									
												}
										};
								
								if(valor == 1)
									{
									xhttp.open("GET", "php/consumos/gastos/formBorrar.php?valor="+valor, "true");
									}
									else{
										xhttp.open("GET", "formBorrar.php?valor="+valor, "true");
										}
								xhttp.send();
								}									
								
			//borra el consumo por el id
			function borrarConsumo(valor)
								{
								var id = document.getElementById("id").value;
								xhttp = new XMLHttpRequest();								
								xhttp.onreadystatechange = function()	
										{
										if (this.readyState == 4 && this.status == 200)
												{
												document.getElementById("contenido").innerHTML = this.responseText;			 									
												}
										};
								
								if(valor == 1)
									{
									xhttp.open("GET", "php/consumos/gastos/borrarConsumo.php?id="+id, "true");
									}
									else{
										xhttp.open("GET", "borrarConsumo.php?id="+id, "true");
										}
								xhttp.send();
								}							

			//ver consumos de celular
			function consumosCel(valor)
								{
								xhttp = new XMLHttpRequest();
								xhttp.onreadystatechange = function()	
										{
										if (this.readyState == 4 && this.status == 200)
												{
												document.getElementById("contenido").innerHTML = this.responseText;
			 									document.getElementById("ingresados").innerHTML = "";
												}
										};
								
								if(valor == 1)
									{
									xhttp.open("GET", "php/consumos/celular/consumosCel.php", "true");
									}
									else{
										xhttp.open("GET", "../celular/consumosCel.php", "true");
										}
								xhttp.send();
								}											
			
			//filtra los resultados de los consumos de celular
			function filtrar(valor)
								{
								var filtro = document.getElementById("filtro").value;
								var mes = document.getElementById("mes").value;
								var anio = document.getElementById("anio").value;
								
								xhttp = new XMLHttpRequest();
								xhttp.onreadystatechange = function()	
										{
										if (this.readyState == 4 && this.status == 200)
												{
												document.getElementById("listado").innerHTML = this.responseText;
			 									}
										};		
										
								xhttp.open("GET", "php/consumos/celular/filtrar.php?filtro="+filtro+"&mes="+mes+"&anio="+anio+"&valor="+valor, "true");								
								xhttp.send();
								}

			//ordenar A->Z id, nombre, sector 
			function ordenar(parametro)
								{	
								xhttp = new XMLHttpRequest();
								xhttp.onreadystatechange = function()	
										{
										if (this.readyState == 4 && this.status == 200)
												{
												document.getElementById("lista").innerHTML = this.responseText;
			 									}
										};												
								xhttp.open("GET", "php/consumos/celular/ordenar.php?parametro="+parametro, "true");								
								xhttp.send();
								}



















			