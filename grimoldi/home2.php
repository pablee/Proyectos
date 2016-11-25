<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar-default {
		margin-bottom: 0;
		border-radius: 0;
		background-color: #f4511e;
		color: #fff;
		height: 70px;
		
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
	
    
  
    
        
    /* Set black background color, white text and some padding */
    footer {
		background-color: #f4511e;
		color: #fff;
		padding: 15px;
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
  </style>
</head>
<body>
		<!--Barra de navegacion-->
		<nav class="navbar navbar-default">
		  <div class="container-fluid">
		   
		   <div class="navbar-header">
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>                        
			  </button>
			  <a class="navbar-brand" href="#">GRIMOLDI</a>
			</div>
			
		   
			  <ul class="nav navbar-nav">
				<li><a href="#">Home</a></li>
				<li><a href="#">About</a></li>
				<li><a href="#">Projects</a></li>
				<li><a href="#">Contact</a></li>
			  </ul>
			  <ul class="nav navbar-nav navbar-right">
				<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Logout </a></li>
			  </ul>
			
		  </div>
		</nav>
		
		<!--Menu izquierda-->
		<div class="container-fluid text-center">    
		  
			<div class="row content">
				<div class="col-sm-2 sidenav">
				  <p><a href="#">Link</a></p>
				  <p><a href="#">Link</a></p>
				  <p><a href="#">Link</a></p>
				</div>
			</div>
			
		</div>
		
		<!--Contenido y pie-->
		<div class="container text-center">    
		  
			<div class="row content">
			
			   
			   <div class="col-sm-8 text-left"> 
				  <h1>Welcome</h1>
				  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
				  <hr>
				  <h3>Test</h3>
				  <p>Lorem ipsum...</p>
				</div>
				
				<div class="col-sm-2 sidenav" style="float: right">
					<div class="well">
						<p>ADS</p>
					</div>
					  
					<div class="well">
						<p>ADS</p>
					</div>
				</div>
				
				<footer class="container text-center">
					<p>Intranet 2.0</p>
				</footer>
			</div>
			
		 </div>
	
		

</body>
</html>