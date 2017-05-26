<?php
	//SESSION_START();
	$coneccion=mysqli_connect("localhost","root","","final");
	$busca=mysqli_real_escape_string($coneccion,$_POST['busca']);
	$rell="";
	if($coneccion)
		{
			$query='SELECT * FROM usuario WHERE id_usuario LIKE "%'.$busca.'%";';
			$res=mysqli_query($coneccion,$query);
			$fila=mysqli_fetch_assoc($res);
			while(($fila['id_usuario'])==="")
				$fila=mysqli_fetch_assoc($res);				
		}
	if($fila['nombre_usuario']=="")
		echo "no se encontraron resultados";
	else 
		echo $fila['id_usuario']."+".$fila['foto']."+".$fila['nacimiento_usuario']."+".$fila['correo_usuario']."+".$fila['nombre_usuario']."+".$fila['apellido_usuario'];
?>   