<?php
	include("conection.php");
	//Inicio de sesión
	session_start();
	
	//Declaración de variables
	
	//Inicio del maquetado
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
				</head>
				<body>
					<nav class='purple' role='navigation'>
						<div class='nav-wrapper container'>
							<ul class='left hide-on-med-and-down'>
										<li><a href='close.php'><i class='material-icons'>power_settings_new</i></a></li>
										<li><a href='muro.php'><i class='material-icons'>web</i></a></li>
							</ul>
							<a href='' class='left'>¡Hola! ".$_SESSION['nombre']." ".$_SESSION['apellido']."</a>
							<div class='right nav-wrapper container'>
									<form>
										<div class='input-field'>
											<input id='search' type='search'/>
											<label class='label-icon' for='search'><i class='material-icons'>search</i></label>
											<i class='material-icons'>close</i>
										</div>
									</form>
							</div>
						</div>
					</nav>
				<div id='publicaciones'>";
					
		echo"	</div>
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
