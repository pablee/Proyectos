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