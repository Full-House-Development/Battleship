<?php
	//SESSION_START()
	//$reportador=$_SESSION['id'];
	$reportador='davidalencia';
	$reportado=$_POST['reportar'];
	$conn = mysqli_connect("132.248.96.53","battleship","sugardadies","final");
	$query=mysqli_query($conn,'INSERT INTO reportar (tipo,id_tipo,reportador) VALUES("usuario","'.$reportado.'","'.$reportador.'");');		
	echo 'REVISAREMOS TU REPORTE A LA BREVEDAD, PUEDES VERIFICAR EL ESTADO DE TUS REPORTES EN EL BOTON DE NOTIFICACIONES';
?>