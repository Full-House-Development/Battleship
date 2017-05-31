<?php
	include('conection.php');
	session_start();
	$usuario = $_SESSION['id'];
	$query="SELECT id_usuario,foto,nombre_usuario FROM usuario ORDER BY nombre_usuario ASC;";
	$res=mysqli_query(conection(),$query);
	$fila=mysqli_fetch_assoc($res);
	$rell="";
	while($fila)
	{
		if($fila['id_usuario']==$usuario||$fila['nombre_usuario']=='Administrador')
			$fila=mysqli_fetch_assoc($res);
		else
		{	
		$rell=$rell.""."<a class='waves-effect waves-light blue btn' href='otroperfil.php?perfext=".$fila['id_usuario']."'><i class='material-icons right'>person_pin</i>".$fila['id_usuario']."</a><img class='circle' width='50px' height='50px' src='../Resources/".$fila['foto'].".jpg'/>";
		$fila=mysqli_fetch_assoc($res);
		}
	}
	echo $rell;
?>