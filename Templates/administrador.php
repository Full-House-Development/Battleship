<?php
//Inicio de sesion
session_start();

//Coneccion
include('conection.php');

//Inicio del maquetado
echo "<!DOCTYPE html>
		<html>
			<head>
			<!--Etiquetas del tipo de alfabeto-->
				<meta charset='utf-8'/>
				<meta http-equiv='X-UA-Compatible' content='IE=edge'/>
				<meta name='viewport' content='width=device-width, initial-scale=1.0'/>
			<!--Links de materialize y el css/less-->
				<link href='http://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'/>
				<link type='text/css' rel='stylesheet' href='../Documents/css/materialize.css'  media='screen,projection'/>
				<link href='../Documents/css/main.css' type='text/css' rel='stylesheet' media='screen,projection'/>
			<!--Etiquetas referetes al encabezado de la página-->
				<title>Administrador</title>
			<!--Opciones de icono-->
				<link rel='shortcut icon' href='../Sources/icono2.png' type='image/png'/>
			<!--Scripts que se necesitaran-->
				<script type='text/javascript' src='../Documents/js/jquery-3.2.1.js'></script>
				<script type='text/javascript' src='../Documents/js/materialize.js'></script>
				<script type='text/javascript' src='../Documents/js/main.js'></script>
			</head>
			<body>
				<!-- Dropdown -->
				<nav class='cyan darken-1' role='navigation'>
					<div class='nav-wrapper container'>
						<ul class='left hide-on-med-and-down'>
									<li><a href='close.php'><i class='material-icons'>power_settings_new</i></a></li>
									<li><a href='../Templates/administrador.php'><i class='material-icons'>person_pin</i></a></li>
						</ul>
						<a href='#!' class='brand-logo center'>".$_SESSION['nombre']." ".$_SESSION['apellido']."</a>
					</div>
				</nav>
				<!--Tanbs(ayuda/queja)-->
				<div class='row'>
					<div class='col s12 l8 offset-l2'>
					  <ul class='tabs'>
						<li class='tab col l4 offset-l2'><a href='#test1'>Ayuda</a></li>
						<li class='tab col l4 '><a href='#test2'>Reporte</a></li>
					  </ul>
					</div>
					<!--Ayuda-->
					<div id='test1' class='col s12 l10 offset-l1'>";
						$conexion = conection();
						$query = mysqli_query($conexion,'SELECT * FROM reportar WHERE respuesta = NULL;');
						$fila = mysqli_fetch_assoc ($query);
						while($fila)
						{
							echo"<div class='row'>
									<div class='col s6 m6 l8 offset-l2'>
									  <div class='card N/A transparent'>
										<div class='card-content'>
										<!--Ejemplo 1-->
										  <span class='card-title'>Ayuda</span>
										  <p>".$fila['tipo']."</p>
										</div>
										<div class='col s6 m6 l6 offset-l2'>
												<label class='active' for='first_name2'>Responder</label>
												 <input id='first_name2' type='text' class='validate'>
											</div>
											<div class='col s6 m6 l3'>
												<a class='waves-effect waves-light btn #64b5f6 blue lighten-2'><i class='material-icons left'>done</i>Enviar</a>
											</div>
									   </div>
									</div>
								</div>";
						}
		echo"	</div>
					<!--Queja-->
					<div id='test2' class='col s12 l8 offset-l2'>";
						$conexion = conection();
						$query = mysqli_query($conexion,'SELECT * FROM reportar WHERE respuesta IS NULL');
						$fila = mysqli_fetch_assoc ($query);
						while($fila)
						{
							echo"<div class='col s6 m6 l8 offset-l2'>
							  <div class='card N/A transparent'>
								<div class='card-content'>
								<!--Ejemplo 1-->
								  <span class='card-title'>REPORTE</span>
								  <p>Existe un reporte para:".$fila['id_tipo']." De:".$fila['reportador']."</p>
								  <div class='col s6 m6 l3 offset-l3'>
									<a class='waves-effect waves-light btn #00c853 green accent-4'>Ignorar esta vez<i class='material-icons left'>thumb_up</i>Aceptar</a>
								  </div>
								  <div class='col s6 m6 l3'>
									<a class='waves-effect waves-light btn #ff3d00 deep-orange accent-3 bloqueo' id='".$fila['id_tipo']."'>Bloquear usuario<i class='material-icons left'>thumb_down</i>Ignorar</a>
								  </div>
								</div>
								</div>
							   </div>";
						   $fila = mysqli_fetch_assoc ($query);
						}
						
		echo"		</div>
				</div>
				<!--Footer-->
				 <footer class='white page-footer' id='foot'>
						  <div class='footer-copyright teal'>
							<div class='container white-text'>
							© 2017 Copyright Text
							<a class='white-text right' href='http://www.prepa6.unam.mx'>Preparatoria 6 Antonio Caso</a>
							</div>
						  </div>
				 </footer>
			 <!--Fin del maquetado-->
				<script>
					$('.bloqueo').click(function(){
						var usuario = $(this).attr('id');
						$.ajax({
							url:'../Programs/bloqueo.php',
							type:'POST',
							data:
							{
								usuario:usuario
							},
							succes:function(bloqueo)
							{
								alert('La cuenta de '+bloqueo+' ha sido bloqueada');
							}
						})
					})
				</script>
			 </body>
		</html>"
?>
