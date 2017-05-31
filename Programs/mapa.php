<?php
	include "conexion.php";
	$conn=conectar();
	$tablero=mysqli_real_escape_string($conn,$_POST['tablero']);
		if($conn)
		{
			$query=mysqli_query($conn,'INSERT INTO partida_en_curso(coordenadas_uno) VALUES('.$tablero.'");');		
		}
	echo $tablero;
?>