//Funcionalidad para dropdown (hace que funcionen los submenus)

$(document).ready(function(){
	  $('.dropdown-submenu a.test').on("click", function(e){
		$(this).next('ul').toggle();
		e.stopPropagation();
		e.preventDefault();
		
	  });
	});


/*
$(document).ready(function(){
	  $('.dropdown-submenu a.test').hover(function(e){
		$(this).next('ul').toggle();
		e.stopPropagation();
		e.preventDefault();
	  });
	});	


 $(document).ready(function () { 
    

    $('nav li > a').hover(
		function () {$('ul', this.parentNode).stop().slideDown(100);}
		
    );

	$('nav li').hover(null, 
		function (e) {$('ul', this.parentNode).stop().slideUp(100);}

	);

  }
  );	
*/

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