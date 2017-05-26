<?php
	//Conexión a la base de datos
	include("conection.php");
	
	//Inicio de sesión
	session_start();
	
	//Declaración de variables
	$usuario = $_SESSION['id'];
	$conexion = conection();
	mysqli_set_charset($conexion,"utf8");
	
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
				  <meta charset='UTF-8'/>
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
					<nav class='cyan darken-1' role='navigation'>
						<div class='nav-wrapper container'>
							<ul class='left hide-on-med-and-down'>
										<li><a href='close.php'><i class='material-icons'>power_settings_new</i></a></li>
										<li><a href='muro.php'><i class='material-icons'>web</i></a></li>
										<li><a href='../Programs/perf.php'><i class='material-icons'>person_pin</i></a></li>
							</ul>
							<a href='#!' class='brand-logo center'>".$_SESSION['nombre']." ".$_SESSION['apellido']."</a>
							<div class='right nav-wrapper'>
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
				<div id='todo'>";
					$query = "SELECT * FROM publicaciones;";
					$import = mysqli_query($conexion,$query);
					$fila = mysqli_fetch_assoc($import);
					$rell = "";
					while($fila)
						{
							$rell=$rell."
							<div class='row'>
								<div class='col s12 l6 offset-l3 ' id='pub'>
									<div class='card blue darken-1 z-depth-5'>
										<div class='card-content white-text'>
											<span class='card-title'>".$fila['id_usuario']."<p>".$fila['tiempo_publicacion']."</p></span>
											<p>".$fila['texto_publicacion']."</p>
										</div>
					 <ul class='collapsible' data-collapsible='accordion' >
						<li>
						  <div onclick='collapsible()' class='collapsible-header'><i class='material-icons'>textsms</i>Comentarios</div>";
								$pub=$fila['id_publicaciones'];
								$quecom="SELECT comentario.texto_comentario,comentario.tiempo_comentario,comentario.id_usuario FROM comentario JOIN publicaciones ON publicaciones.id_publicaciones=comentario.id_publicacion WHERE comentario.id_publicacion='".$pub."'"; 
								$imporcom=mysqli_query($conexion,$quecom);
								$filacom=mysqli_fetch_assoc($imporcom);
								$rellcom="";
								while($filacom)
								{
									$idus=$filacom['id_usuario'];
									$quecomu="SELECT usuario.nombre_usuario FROM publicaciones JOIN usuario ON usuario.id_usuario=publicaciones.id_usuario WHERE usuario.id_usuario='".$idus."'";
									$imporcomu=mysqli_query($conexion,$quecomu);
									$filacomu=mysqli_fetch_assoc($imporcomu);
									$rellcom=$rellcom."<div class='collapsible-body'><h1>".$filacomu['nombre_usuario'].":"."</h1><span>".$filacom['texto_comentario']."<p>".$filacom['tiempo_comentario']."</p></span></div>";
									$filacom=mysqli_fetch_assoc($imporcom);
								}
								$rell=$rell.$rellcom."
						</li>
					  </ul>
									<div class='row'>
							<div class='row'>
							  <div class='input-field col s6'>
								<input id='input_text' type='text' data-length='30' onblur='sendi(".$fila['id_publicaciones'].")'>
								<label for='input_text'>Comentar</label>
							  </div>
							</div>
							</div>
								</div>
							</div>";
						  
							$fila=mysqli_fetch_assoc($import);
						}
					echo $rell;
		echo"	</div>
				<!--FOOTER--> 
					<footer class='white page-footer' id='foot'>
					  <div class='footer-copyright teal'>
						<div class='container white-text'>
						© 2017 Copyright Text
						<a class='white-text right' href='http://www.prepa6.unam.mx'>Preparatoria 6 Antonio Caso</a>
						</div>
					  </div>
			 </footer>
				</body>
		</html>";
	}
	else
	{
		header("Location: index.html");
		exit;
	}
?>
