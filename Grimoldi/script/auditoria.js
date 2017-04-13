//carga el cronograma
function verCronograma(accion)
			{
			xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function()	
					{
					if (this.readyState == 4 && this.status == 200)
							{
							document.getElementById("contenido").innerHTML = this.responseText;
							}
					};
			
			if(accion=="nuevaSemana"||accion=="guardar")
				{				
				xhttp.open("GET", "php/auditoria/cronograma/inventarios.php?accion="+accion, true);		
				}
				else{
					xhttp.open("GET", "php/auditoria/cronograma/inventarios.php?accion=false", true);		
					}
				
			xhttp.send();
			}													
						
function semanaLocal(id)
			{
			xhttp = new XMLHttpRequest();			
			xhttp.onreadystatechange = function()	
					{					
					if (this.readyState == 4 && this.status == 200)
							{
							document.getElementById("semana"+id).innerHTML=this.responseText;
							document.getElementById(id).innerHTML="";
							}						
					};
		
			xhttp.open("GET", "php/auditoria/cronograma/semana.php?id="+id, true);								
			xhttp.send();
			}
			
function sacarLocal(id)
			{	
			xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function()	
					{					
					if (this.readyState == 4 && this.status == 200)
							{
							document.getElementById("semana"+id).innerHTML="";
							document.getElementById(id).innerHTML=this.responseText;	
							}
					};
					
			xhttp.open("GET", "php/auditoria/cronograma/semana.php?id="+id+"&accion=sacarLocal", true);		
			xhttp.send();						
			}
			
function fecha_prox(id)
			{	
			var fecha_prox = document.getElementById("fecha_prox"+id).value;
			var hora = document.getElementById("hora"+id).value;
			
			//alert(fecha_prox+hora);
		
			xhttp = new XMLHttpRequest();
			xhttp.open("GET", "php/auditoria/cronograma/guardarFecha.php?fecha_prox="+fecha_prox+"&hora="+hora, true);		
			xhttp.send();			
			}	

function habilitaHora(id)
	{
    document.getElementById("hora"+id).disabled = false;
	}			
	
function verSemana(id)
	{
	//alert(id);	
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function()	
			{					
			if (this.readyState == 4 && this.status == 200)
					{
					document.getElementById("contenido").innerHTML=this.responseText;	
					}
			};
			
	xhttp.open("GET", "php/auditoria/cronograma/verSemana.php?id="+id, true);		
	xhttp.send();	
	}		
	
	
			