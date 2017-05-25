<?php
	//Inicio de sesión
	session_start();
	//
	if(isset($_SESSION['id']))
	{
		echo "<!DOCTYPE html>
			  <html>
				<head>
				  <link href='http://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>
				  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css'>
				  <link rel='stylesheet' src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js'>
				  <script type='text/javascript' src='https://code.jquery.com/jquery-2.1.1.min.js'></script>
				  <script type='text/javascript' src='https://code.jquery.com/jquery-2.1.1.min.js'></script>
				  <meta name='viewport' content='width=device-width, initial-scale=1.0'/>
				  <style>
					  #pub
					  {
						position:relative;
						top:40px;
						$
					  }
					  #foot
					  {
						position:relative;
						top:100px;
					  }
					  span p
					  {
						position:absolute;
						left:350px;
						font-size:15px;
						display:inline;
					  }
				 </style>
				 <script type='text/javascript' src='../Documents/js/main.js'></script>
				</head>
				<body>
					<nav class='purple' role='navigation'>
							<div class='nav-wrapper container'>
								<a class='brand-logo center'>B A T T L E S H I P</a>
								<a href='' class='left'>¡Hola! ".$_SESSION['nombre']." ".$_SESSION['apellido']."</a>
								<ul class='right hide-on-med-and-down'>
									<li><a class='dropdown-button' href='#!' data-activates='dropdown2'><i class='material-icons'>search</i></a></li>
									<li><a href='muro.php'><i class='material-icons'>web</i></a></li>
									<li><a href='close.php'><i class='material-icons'>power_settings_new</i></a></li>
								</ul>
							</div>
					</nav>
				<div id='todo'>
				 
				</div>
				<!--FOOTER--> 
					<footer class='page-footer #e65100 orange darken-4' id='foot'>
					  <div class='container'>
						<div class='row'>
						  <div class='col l6 s12'>
							<h5 class='white-text'>Just To Friends®</h5>
						  </div>
						</div>
					  </div>
					  <div class='footer-copyright #bf360c deep-orange darken-4'>
						<div class='container'>
						  © 2017 Copyright Text
						</div>	
					  </div>
					</footer>
				<script>
					  var aj='id';
						$.ajax(
						  {
							  url:'../Programs/pubinicio.php',
							  type:'POST',
							  data:
							  {
								usu:aj
							  },
							  success:function(dato)
							  {
								$('#todo').append(dato);
							  }
						  });
						//var com=$('#resol').attr();
						//alert(com);
						function collapsible()
						{
							$('.collapsible').collapsible();
						}
				</script>
				</body>
		</html>";
	}
	else
	{
		header("Location: index.html");
		exit;
	}
?>
