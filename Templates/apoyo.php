<?php
	include('conection.php');
	//Inicio de sesión
	//session_start();
	
	//$conn=conection();
	//$usuario = $_SESSION['id'];
	$tex=(isset($_POST['texto']))?$_POST['texto']:"";
	if($tex!="")
	{
		$usu=$_POST['usu'];
		$rep=$_POST['rep'];
		$text = mysqli_real_escape_string(conection(),$tex);
		if(conection())
		{
			$query=mysqli_query(conection(),'UPDATE apoyo SET respuesta_apoyo = "'.$text.'" WHERE id_apoyo = "'.$rep.'";');		
		}
		echo $tex;
	}
?>
