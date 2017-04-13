function puntoVenta(valor)
						{
						//alert("Hello! I am an alert box!!");						
						var xhttp = new XMLHttpRequest();
						
						xhttp.onreadystatechange = function() 
							{
							if (this.readyState == 4 && this.status == 200) 
								{
								document.getElementById("contenido").innerHTML = this.responseText;
								}
							};
						
						xhttp.open("GET", "php/impuestos/puntos_venta/puntoVenta.php?valor="+valor, true);							
						xhttp.send();			
						}

function ingresarLocal(valor)
						{
						//alert("Hello! I am an alert box!!");						
						var id_local = document.getElementById("id_local").value;				
						var nombre = document.getElementById("nombre").value;
						var controlador = document.getElementById("controlador").value;
						var manual = document.getElementById("manual").value;
						var domicilio = document.getElementById("domicilio").value;
						var ciudad = document.getElementById("ciudad").value;
						var provincia = document.getElementById("provincia").value;					
						
						var xhttp = new XMLHttpRequest();						
						xhttp.onreadystatechange = function() 
							{
							if (this.readyState == 4 && this.status == 200) 
								{
								document.getElementById("contenido").innerHTML = this.responseText;
								}
							};
											
						xhttp.open("GET", "php/impuestos/puntos_venta/puntoVenta.php?valor="+valor+"&id_local="+id_local+"&nombre="+nombre+"&controlador="+controlador+"&manual="+manual+
									"&domicilio="+domicilio+"&ciudad="+ciudad+"&provincia="+provincia, true);		
						
						xhttp.send();			
						}

function ingresarPV(valor)
						{
						//alert("Hello! I am an alert box!!");	
						var id_local = document.getElementById("id_local").value;				
						var controlador = document.getElementById("controlador").value;
						var manual = document.getElementById("manual").value;
														
						var xhttp = new XMLHttpRequest();						
						xhttp.onreadystatechange = function() 
							{
							if (this.readyState == 4 && this.status == 200) 
								{
								document.getElementById("contenido").innerHTML = this.responseText;
								}
							};
											
						xhttp.open("GET", "php/impuestos/puntos_venta/puntoVenta.php?valor="+valor+"&id_local="+id_local+"&controlador="+controlador+"&manual="+manual, true);		
						
						xhttp.send();			
						}
						
/*funciona para ingresar local y PV					
function ingresarPV(valor)
						{
						//alert("Hello! I am an alert box!!");	
						var xhttp = new XMLHttpRequest();						
						xhttp.onreadystatechange = function() 
							{
							if (this.readyState == 4 && this.status == 200) 
								{
								document.getElementById("contenido").innerHTML = this.responseText;
								}
							};
							
						if(document.getElementById("nombre"))
							{
							var id_local = document.getElementById("id_local").value;											
							var nombre = document.getElementById("nombre").value;
							var controlador = document.getElementById("controlador").value;
							var manual = document.getElementById("manual").value;
							var domicilio = document.getElementById("domicilio").value;
							var ciudad = document.getElementById("ciudad").value;
							var provincia = document.getElementById("provincia").value;
									
							xhttp.open("GET", "php/impuestos/puntos_venta/puntoVenta.php?valor="+valor+"&id_local="+id_local+"&nombre="+nombre+"&controlador="+controlador+"&manual="+manual+
									"&domicilio="+domicilio+"&ciudad="+ciudad+"&provincia="+provincia, true);	
							}
							else
								{
								var id_local = document.getElementById("id_local").value;																			
								var controlador = document.getElementById("controlador").value;
								var manual = document.getElementById("manual").value;																			
								
								xhttp.open("GET", "php/impuestos/puntos_venta/puntoVenta.php?valor="+valor+"&id_local="+id_local+"&controlador="+controlador+"&manual="+manual, true);		
								};

						xhttp.send();			
						}
*/
				
function borrarLocal(id_local)
						{
						//alert("Hello! I am an alert box!!");	
						var valor = "borrarLocal";	
						var xhttp = new XMLHttpRequest();												
						xhttp.onreadystatechange = function() 
							{
							if (this.readyState == 4 && this.status == 200) 
								{
								document.getElementById("contenido").innerHTML = this.responseText;
								}
							};
						
						xhttp.open("GET", "php/impuestos/puntos_venta/puntoVenta.php?valor="+valor+"&id_local="+id_local, true);							
						xhttp.send();			
						}	

function borrarPV(id)
						{
						//alert("Hello! I am an alert box!!");	
						var valor = "borrarPV";	
						var xhttp = new XMLHttpRequest();												
						xhttp.onreadystatechange = function() 
							{
							if (this.readyState == 4 && this.status == 200) 
								{
								document.getElementById("contenido").innerHTML = this.responseText;
								}
							};
						
						xhttp.open("GET", "php/impuestos/puntos_venta/puntoVenta.php?valor="+valor+"&id="+id, true);							
						xhttp.send();			
						}		

function editarLocal(id)
						{
						//var prueba = document.getElementById("prueba").childNodes;
						var xhttp = new XMLHttpRequest();												
						xhttp.onreadystatechange = function() 
							{
							if (this.readyState == 4 && this.status == 200) 
								{
								document.getElementById(id).innerHTML = this.responseText;
								}
							};
						
						xhttp.open("GET", "php/impuestos/puntos_venta/editar.php?id="+id, true);							
						xhttp.send();												
						}							

						
						
						
						
						
						