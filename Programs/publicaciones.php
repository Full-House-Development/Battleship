<?php
	//Inicio de sesión
	session_start();
	//Guardar la publicación
	$conn=mysqli_connect("localhost","root","","final");
	$usuario = $_SESSION['id'];
	$tex = mysqli_real_escape_string($conn,$_POST['tex']);
		if($conn)
		{
			$query=mysqli_query($conn,'INSERT INTO publicaciones(id_usuario,texto_publicacion) VALUES("'.$usuario.'","'.$tex.'");');		
		}
	echo $tex;
?>
