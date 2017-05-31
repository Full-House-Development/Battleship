<?php
	include("conection.php");
	function busqueda($cadena) 
	{
		$cadena = str_replace("á", "a", $cadena);
		$cadena = str_replace("é", "e", $cadena);
		$cadena = str_replace("í", "i", $cadena);
		$cadena = str_replace("ó", "o", $cadena);
		$cadena = str_replace("ú", "u", $cadena);
		$cadena = str_replace("Á", "A", $cadena);
		$cadena = str_replace("É", "E", $cadena);
		$cadena = str_replace("Í", "I", $cadena);
		$cadena = str_replace("Ó", "O", $cadena);
		$cadena = str_replace("Ú", "U", $cadena);
		return $cadena;
	}
	if(isset($_POST["cuentanueva"]) && isset($_POST["contranueva"])&& isset($_POST["nomnuevo"]) && isset($_POST["apellidonuevo"]) && isset($_POST["fechnuevo"]) && isset($_POST["correo"]))
	{
		//Conexión a la base de datos
		// $conexion= mysqli_connect("localhost","root","","final");
		if (mysqli_connect_errno(conection()))
			echo "Fallo al conectar a MySQL: " . mysqli_connect_error();

		// En caso que la conexion sea exitosa, se mete al programa
		else{
			$cuenta = mysqli_real_escape_string (conection(), $_POST["cuentanueva"]);
			$contra = mysqli_real_escape_string (conection(), $_POST["contranueva"]);
			$nombre = mysqli_real_escape_string (conection(), $_POST["nomnuevo"]);
			$apellido = mysqli_real_escape_string (conection(), $_POST["apellidonuevo"]);
			$nacimiento = mysqli_real_escape_string (conection(), $_POST["fechnuevo"]);
			$correo = mysqli_real_escape_string (conection(), $_POST["correo"]);
			$imagen = mysqli_real_escape_string (conection(), $_POST["imagen"]);
			$oregano = md5(uniqid(rand(), TRUE));
			$busqueda = busqueda($_POST["nomnuevo"]).busqueda($_POST["apellidonuevo"]);
			$mix = hash('sha512', $oregano.$contra);
			unset($contra);
			$resultado = mysqli_query(conection(), "INSERT INTO usuario(nombre_usuario,apellido_usuario,id_usuario,password,oregano,nacimiento_usuario,correo_usuario,foto,busqueda) VALUES('".$nombre."','".$apellido."','".$cuenta."','".$mix."','".$oregano."','".$nacimiento."','".$correo."','".$imagen."','".$busqueda."');");
			echo "<script>";
			echo "alert('Usuario Registrado Con Éxito');";  
			echo "window.location = 'index.html';";
			echo "</script>";  
		}
		mysqli_close(conection());
	}
	else
		echo "No esta correctamente completado el formulario de registro.";
?>
