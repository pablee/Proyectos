			//muestra todas las lineas de celulares
			function verLineas()
								{
								xhttp = new XMLHttpRequest();
								xhttp.onreadystatechange = function()	
										{
										if (this.readyState == 4 && this.status == 200)
												{
												document.getElementById("contenido").innerHTML = this.responseText;
												}
										};
					
								xhttp.open("GET", "php/celular/listarCel.php", "true");
								xhttp.send();
								}
								
			//genera el formulario para cargar una nueva linea
			function nuevaLinea()
								{
								xhttp = new XMLHttpRequest();
								xhttp.onreadystatechange = function()	
										{
										if (this.readyState == 4 && this.status == 200)
												{
												document.getElementById("contenido").innerHTML = this.responseText;
												}
										};
					
								xhttp.open("GET", "php/celular/nuevaLinea.php", "true");
								xhttp.send();
								}
			
			//agrega la nueva linea
			function agregar()
								{								
								var nombre = document.getElementById("nombre").value;
								var linea = document.getElementById("linea").value;
								var sector = document.getElementById("sector").value;
								var modelo = document.getElementById("modelo").value;
								var propietario = document.getElementById("propietario").value;
								var mail = document.getElementById("mail").value;
								var clave = document.getElementById("clave").value;
								var plan = document.getElementById("plan").value;
								var servicio_adicional = document.getElementById("servicio_adicional").value;
								var datos = document.getElementById("datos").value;
								var detalles = document.getElementById("detalles").value;
								var observaciones = document.getElementById("observaciones").value;
								
								xhttp = new XMLHttpRequest();
								xhttp.onreadystatechange = function()	
										{
										if (this.readyState == 4 && this.status == 200)
												{
												document.getElementById("recientes").innerHTML = this.responseText;
												}
										};
					
								xhttp.open("GET", "php/celular/agregarCel.php?nombre="+nombre+"&linea="+linea+"&sector="+sector+"&modelo="+modelo+"&propietario="+propietario+
										   "&mail="+mail+"&clave="+clave+"&plan="+plan+"&servicio_adicional="+servicio_adicional+"&datos="+datos+"&detalles="+detalles+"&observaciones="+observaciones
											, "true");
								xhttp.send();
								}		
								
			//carga el formulario para buscar la linea a modificar					
			function modificarLinea()
								{
								xhttp = new XMLHttpRequest();
								xhttp.onreadystatechange = function()	
										{
										if (this.readyState == 4 && this.status == 200)
												{
												document.getElementById("contenido").innerHTML = this.responseText;
												}
										};
					
								xhttp.open("GET", "php/celular/modificarLinea.php", "true");
								xhttp.send();
								}	
			
			//carga el formulario para borrar una linea
			function borrarLinea()
								{
								xhttp = new XMLHttpRequest();
								xhttp.onreadystatechange = function()	
										{
										if (this.readyState == 4 && this.status == 200)
												{
												document.getElementById("contenido").innerHTML = this.responseText;
												}
										};
					
								xhttp.open("GET", "php/celular/borrarLinea.php", "true");
								xhttp.send();
								}	
								
			//procesa la modificacion de una linea					
			function modificar()
								{
								var nombre = document.getElementById("nombre").value;
								var linea = document.getElementById("linea").value;	
								
								xhttp = new XMLHttpRequest();
								xhttp.onreadystatechange = function()	
										{
										if (this.readyState == 4 && this.status == 200)
												{
												document.getElementById("contenido").innerHTML = this.responseText;
												}
										};
					
								xhttp.open("GET", "php/celular/modificarCel.php?nombre="+nombre+"&linea="+linea, "true");
								xhttp.send();
								}
								
			//maneja los mensajes que devuelven las operaciones en la pagina
			function mensaje(valor)
								{
								xhttp = new XMLHttpRequest();
								xhttp.onreadystatechange = function()	
										{
										if (this.readyState == 4 && this.status == 200)
												{
												document.getElementById("contenido").innerHTML = this.responseText;
												}
										};
					
								xhttp.open("GET", "php/mensaje.php?valor="+valor, "true");
								xhttp.send();
								}