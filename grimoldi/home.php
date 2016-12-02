<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8">
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
 <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar-default {
		margin-bottom: 0;
		border: 0;
		border-radius: 0;
		background-color: #f4511e;
		color: #fff;
		height: auto;	
    }
	
	.navbar-nav{
		margin-bottom: 0;
		border-radius: 0;
		background-color: #f4511e;
		color: #fff;
    }
	
	.navbar-default .navbar-header > a{
		background-color: #f4511e;
		color: #fff;
    }
	
    .navbar-default .navbar-nav > li > a{
		color: #fff;
    }

	.navbar-default .navbar-nav > li > a:hover, 
	.navbar-default .navbar-nav > li > a:focus,
	.navbar-default .navbar-nav > .active {
    background-color: #fff;
    color: #f4511e;
	}

	.navbar-default .navbar-nav > .open > a, 
	.navbar-default .navbar-nav > .open > a:hover, 
	.navbar-default .navbar-nav > .open > a:focus {
		color: #f4511e;
		background-color: #fff;
	}
	
	.navbar-default .navbar-nav .open .dropdown-menu > li > a,
	.navbar-default .navbar-nav .open .dropdown-menu {
		background-color: #fff;
		color:#f4511e;
	}
	
	.navbar-default .navbar-nav .open .dropdown-menu > li > a:hover,
	.navbar-default .navbar-nav .open .dropdown-menu > li > a:focus{
		background-color: #f4511e;
		color:#fff;
	}
	
    /* Set black background color, white text and some padding */
    footer {
		background-color: #f4511e;
		color: #fff;
		height: 20px;
		line-height: 20px;
		position: fixed; 
		bottom: 0%;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
	
	.grimoldi{
		background-color: #1a1a1a;
		color: #fff;
		height: 100px;
		line-height: 100px;
		font-size: 40px;
	}
  </style>

<?php
	
	date_default_timezone_set('America/Argentina/Buenos_Aires');
	setlocale (LC_TIME,"spanish");
	$fecha = date("Y-m-d H:i:s");
	$fecha2 = strftime("%A %e de %B");
	
?>

</head>

<body> 
		
	<div class="container-fluid">
		<div class="row">							
				<!--Logo-->
				<div class="col-sm-12 grimoldi"> 
					<p>GRIMOLDI</p>
				</div>
		
				<!--Barra de navegacion-->
				<nav class="col-sm-12 navbar navbar-default">
					<div class="container-fluid">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>                        
							</button>
							<a class="navbar-brand" href=""></a>
						</div>
						
						<ul class="nav navbar-nav">
							<li>
								<a href="home.php">Home</a>
							</li>
							
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">
									Usuarios
									<span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
									<li><a href="#">Home</a></li>
									<li><a href="#">Usuarios</a></li>
									<li><a href="#">Proyectos</a></li>
									<li><a href="#">Contacto</a></li>
								</ul>
							</li>
							
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">
									Administrar
									<span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
								  <li><a href="#">Page 1-1</a></li>
								  <li><a href="#">Page 1-2</a></li>
								  <li><a href="#">Page 1-3</a></li>
								</ul>
							</li>
							
							<li><a href="#">Proyectos</a></li>
							<li><a href="#">Contacto</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Logout </a></li>
						</ul>
					</div>
				</nav>
		</div>
		
		<!--Menu, contenido y ADS-->
		<div class="row text-center">
				
				<div class="col-sm-2 sidenav" style="border: 10px solid #fff">
					<p><input type = "submit" class="btn btn-default btn-block" value = "Pcs Grimoldi"></input></p>
					<p><input type = "submit" class="btn btn-default btn-block" value = "Equipos e insumos"></input></p>
					<p><input type = "submit" class="btn btn-default btn-block" value = "Telefonia"></input></p>
					<p><input type = "submit" class="btn btn-default btn-block" value = "Gastos"></input></p>
					<p><input type = "submit" class="btn btn-default btn-block" value = "Internos"></input></p>
					<p><input type = "submit" class="btn btn-info btn-block" value = "Pcs Grimoldi"></input></p>
					<p><input type = "submit" class="btn btn-info btn-block" value = "Equipos e insumos"></input></p>
					<p><input type = "submit" class="btn btn-info btn-block" value = "Reportes"></input></p>
				</div>
				
				<!--Contenido-->
				<div class="col-sm-8 text-left"> 
					<?php
					
					?>
					<h1>Welcome</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					<hr>
					<h3>Test</h3>
					<p>Lorem ipsum...</p>
					<h1>Welcome</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					<hr>
					<h3>Test</h3>
					<p>Lorem ipsum...</p>
				</div>
				
				<div class="col-sm-2 sidenav">
					<br>
					<div class="well">
						<p>Perfil Usuario</p>
					</div>
					

					<div class="well">
						<p>Hoy es <?php echo $fecha2 ?> </p>
						<p>Recordatorios</p>
					</div>
				</div>
		</div>		
	</div>
		

		
		<!--Pie de Pagina-->
		<div class="container text-center">    
			<div class="row">
				<div class="col-sm-12"> 
					<footer class="container text-center">
						<p>Intranet 2.0</p>
					</footer>
				</div>
			</div>
		</div>
	
		

</body>
</html>
