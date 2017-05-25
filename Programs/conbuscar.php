<?php
	//SESSION_START();
	$coneccion=mysqli_connect("localhost","root","","final");
	$busca=mysqli_real_escape_string($coneccion,$_POST['busca']);
	$rell="";
	if($coneccion)
		{
			$query='SELECT * FROM usuario WHERE nombre_usuario LIKE "%'.$busca.'%";';
			$res=mysqli_query($coneccion,$query);
			$fila=mysqli_fetch_assoc($res);
		}
	if($fila['nombre_usuario']=="")
		echo "no sé encontraron resultados";
	else 
		echo $fila['nombre_usuario'];
?>   