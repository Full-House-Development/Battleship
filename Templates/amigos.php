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
		$rell=$rell."".$fila['nombre_usuario']."<img class='circle' width='50px' height='50px' src='../Resources/Avatar/".$fila['foto'].".jpg'/><input type='submit' class='avi' id='".$fila['id_usuario']."' value='".$fila['id_usuario']."'/></br>";
		$fila=mysqli_fetch_assoc($res);
		}
	}
	$rell=$rell."
	<script>
	$('.avi').click(function(){
		var id=$(this).attr('id');
		console.log(id);
		$.ajax(
			 {
				 url:'otroajaxperfil.php',
				 type:'POST',
				 data:
				 {
				   perfext:id
				 },
				 success:function(dato)
				 {
				   location.href = 'otroperfil.php';
				 }
			 });
	});
	</script>";
	echo $rell;
?>