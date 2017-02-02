//Funcionalidad para dropdown (hace que funcionen los submenus)

$(document).ready(function(){
	  $('.dropdown-submenu a.test').on("click", function(e){
		$(this).next('ul').toggle();
		e.stopPropagation();
		e.preventDefault();
	  });
	});

//imprime contenido de la pagina	
function imprimir()
			{
			var objeto=document.getElementById("contenido");
			var ventana=window.open('','_blank');
			ventana.document.write(objeto.innerHTML);
			ventana.document.close();
			ventana.print();
			ventana.close();
			}