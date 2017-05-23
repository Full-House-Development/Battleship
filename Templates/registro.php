<?php
	if(isset($_POST["cuentanueva"]) && isset($_POST["contranueva"])&& isset($_POST["nomnuevo"]) && isset($_POST["apellidonuevo"]) && isset($_POST["fechnuevo"]) && isset($_POST["correo"]))
	{
		//Conexión a la base de datos
		$conexion = mysqli_connect("localhost","root","","final");
		if (mysqli_connect_errno($conexion))
			echo "Fallo al conectar a MySQL: " . mysqli_connect_error();

		// En caso que la conexion sea exitosa, se mete al programa
		else{
			$cuenta = mysqli_real_escape_string ($conexion, $_POST["cuentanueva"]);
			$contra = mysqli_real_escape_string ($conexion, $_POST["contranueva"]);
			$nombre = mysqli_real_escape_string ($conexion, $_POST["nomnuevo"]);
			$apellido = mysqli_real_escape_string ($conexion, $_POST["apellidonuevo"]);
			$nacimiento = mysqli_real_escape_string ($conexion, $_POST["fechnuevo"]);
			$correo = mysqli_real_escape_string ($conexion, $_POST["correo"]);
			$oregano = md5(uniqid(rand(), TRUE));
			$mix = hash('sha512', $oregano.$contra);
			unset($contra);
			$resultado = mysqli_query($conexion, "INSERT INTO usuario(nombre_usuario,apellido_usuario,id_usuario,password,oregano,nacimiento_usuario,correo_usuario) VALUES('".$nombre."','".$apellido."','".$cuenta."','".$mix."','".$oregano."','".$nacimiento."','".$correo."');");
			echo "USUARIO REGISTRADO CON EXITO";
		}
		mysqli_close($conexion);
	}
	else
		echo "No esta correctamente completado el formulario de registro.";
	
?>
