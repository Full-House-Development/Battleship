<?php
	//SESSION_START();
	// conection()=mysqli_connect("localhost","root","","final");
	include('../Templates/conection.php');
	$busca=mysqli_real_escape_string(conection(),$_POST['busca']);
	$rell="";
	if(conection())
		{
			$query='SELECT * FROM usuario WHERE id_usuario LIKE "'.$busca.'";';
			$res=mysqli_query(conection(),$query);
			$fila=mysqli_fetch_assoc($res);
			while(($fila['id_usuario'])==="")
				$fila=mysqli_fetch_assoc($res);				
		}
	if($fila['nombre_usuario']=="")
		echo "no se encontraron resultados";
	else 
		echo $fila['id_usuario']."+".$fila['foto']."+".$fila['nacimiento_usuario']."+".$fila['correo_usuario']."+".$fila['nombre_usuario']."+".$fila['apellido_usuario'];
?>
