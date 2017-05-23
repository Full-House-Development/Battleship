<?php
	$hr= $_POST['hr'];
	$tex=$_POST['tex']; 
	$conn=mysqli_connect("localhost","root","","final");
		if($conn)
		{
			$query='insert into publicaciones(id_usuario,texto_publicacion,tiempo_publicacion) values("prueba","'.$tex.'","'.hr.'")';		
		}
	echo 0;
?>
