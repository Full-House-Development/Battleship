<?php
	//SESSION_START()
	//$retador=$_SESSION['id'];
	$retador='davidalencia';
	$conn=mysqli_connect("localhost","root","","final");
	$retado=$_POST['retado'];
	$query=mysqli_query($conn,'INSERT INTO partida_en_curso (id_usuario_uno,id_usuario_dos) VALUES("'.$retador.'","'.$retado.'");');		
	echo 'bien, ya tienes una partida en curso';
?>