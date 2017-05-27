<?php
	session_start();
	
	$perdido=$_SESSION['id'];
	$pregunta=$_POST['aiuda'];
	$conn = mysqli_connect("132.248.96.53","battleship","sugardadies","final");
	$query=mysqli_query($conn,'INSERT INTO apoyo (id_usuario,texto_apoyo) VALUES("'.$perdido.'","'.$pregunta.'");');		
	echo 'TU PREGUNTA FUE PROCESADA';
?>
