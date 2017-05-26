<?php
	//SESSION_START()
	//$perdido=$_SESSION['id'];
	$perdido='davidalencia';
	$pregunta=$_POST['aiuda'];
	$conn = mysqli_connect("132.248.96.53","battleship","sugardadies","final");
	$query=mysqli_query($conn,'INSERT INTO apoyo (id_usuario,texto_apoyo) VALUES("'.$perdido.'","'.$pregunta.'");');		
	echo 'TU PREGUNTA FUE PROCESADA, POR FAVOR ESTÉ AL PENDIENTE DE SU RESPUESTA EN EL BOTÓN DE NOTIFICACIONES';
?>