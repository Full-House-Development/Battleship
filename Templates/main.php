<?php

	include("conection.php");
	/*En este php, se accede a los datos de la base de datos, se comprueba el usuario, asi como la contraseña y redirecciona segun el caso a los diferentes mensajes 
	de error*/	
	if (isset($_POST["cuenta"]) && isset($_POST["contra"])){
		//Conexión a la base de datos
				
		
		// $conexion = mysqli_connect("localhost", "root", "", "final");
		if (mysqli_connect_errno(conection())) {
			echo "Fallo al conectar a MySQL: " . mysqli_connect_error();
		}
		// En caso que la conexion sea exitosa, se mete al programa
		else{
			$cuenta = $_POST["cuenta"];
			$resultado = mysqli_query(conection(), "SELECT * FROM usuario WHERE id_usuario='".$cuenta."';");
			$consulta= mysqli_fetch_assoc($resultado);
			$usuario=$consulta["password"];
			$oregano=$consulta["oregano"];	
			$contra=$_POST["contra"];
			$nombreusuario=$consulta["nombre_usuario"];	
			//Comprobar si el usuario existe
			if ($usuario=="")
			{
					echo "<script>";
					echo "alert('¿Primera vez en la página? ¡Registrate!');";  
					echo "window.location = 'index.html';";
					echo "</script>";
			//El usuario es válido:
			}
			$admin = substr($cuenta,0,1);
			if($admin == '*')
			{
					if ($usuario === hash('sha512', $oregano.$contra))
					{
						SESSION_start();
						$_SESSION["nombre"]=$consulta["nombre_usuario"];
						$_SESSION["apellido"]=$consulta["apellido_usuario"];
						$_SESSION["id"]=$consulta["id_usuario"];
						$_SESSION["nacimiento"]=$consulta["nacimiento_usuario"];
						$_SESSION["correo"]=$consulta["correo_usuario"];
						$_SESSION["foto"]=$consulta["foto"];
						echo "<script>";
						echo "alert('¿Administrador?');";  
						echo "var adm = prompt('Contraseña:');";
						echo "if(adm == 'sweetdaddies')
								{
									alert('¡Bienvenido Administrador!');  
									window.location = 'administrador.php'; 
								}
							  else
							  {
									alert('¡No eres admin!');  
									window.location = 'index.html'; 
							  }";
						echo "</script>";
					}
					
			}
			else {
					if ($usuario === hash('sha512', $oregano.$contra))
					{
						SESSION_start();
						$_SESSION["nombre"]=$consulta["nombre_usuario"];
						$_SESSION["apellido"]=$consulta["apellido_usuario"];
						$_SESSION["id"]=$consulta["id_usuario"];
						$_SESSION["nacimiento"]=$consulta["nacimiento_usuario"];
						$_SESSION["correo"]=$consulta["correo_usuario"];
						$_SESSION["foto"]=$consulta["foto"];
						echo "<script>";
						echo "alert('¡Bienvenido De Nuevo!');";  
						echo "window.location = 'perfil.php';";
						echo "</script>"; 
					}
					echo "<script>";
					echo "alert('Tu contraseña es incorrecta');";  
					echo "window.location = 'index.html';";
					echo "</script>";  
				}
		}
		mysqli_close(conection());
	}
	else {
		echo "Formulario de inicio de sesion inválido.";
	}
?>
