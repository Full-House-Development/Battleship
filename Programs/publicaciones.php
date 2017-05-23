<?php
	$conn=mysqli_connect("localhost","root","","final");
	$tex=mysql_real_escape_string($conn,$_POST['tex']);
	
		if($conn)
		{
			$query=mysqli_query($conn,'INSERT INTO publicaciones(id_usuario,texto_publicacion) VALUES("prueba","'.$tex.'");');		
		}
	echo $tex."hola";
?>
