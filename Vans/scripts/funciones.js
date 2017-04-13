function ingresarBarras(event)
			{				
			if(event.which == 13 || event.keyCode == 13 || event==0)
				{
				var barra = document.getElementById("barra").value;
				
				//alert(barra);	
				
				xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function()	
					{					
					if (this.readyState == 4 && this.status == 200)
							{							
							document.getElementById("lista").innerHTML=this.responseText;
							document.getElementById("barra").value="";
							}
					};
					
				xhttp.open("GET", "php/cargarBarras.php?barra="+barra, true);		
				xhttp.send();			
				}
			}	

			
			