<?php
	include "conexion.php";
	$a=0;
	if(isset($_POST["usuario"])
	{
		//Conexión a la base de datos
		$conexion =conectar();
		if (mysqli_connect_errno($conexion))
			echo "Fallo al conectar a MySQL:" . mysqli_connect_error();
		// En caso que la conexion sea exitosa, se mete al programa
		else{
			$usuarioRetador= mysqli_real_escape_string ($conexion, $_POST["usuario"]);

			$resultado = mysqli_query($conexion, "SELECT id_partida FROM partida_en_curso WHERE partida_en_curso.id_usuario_uno='".$usuarioRetador."'  ORDER BY id_partida;");

			if ($resultado==true){
						$fila=mysqli_fetch_assoc($resultado);
						if ($fila['id_partida']!='') {
							echo $fila['id_partida'];
						}
			}
			$resultado = mysqli_query($conexion, "SELECT id_partida FROM partida_en_curso WHERE partida_en_curso.id_usuario_dos='".$usuarioRetador."'  ORDER BY id_partida;");

			if ($resultado==true){
						$fila=mysqli_fetch_assoc($resultado);
						if ($fila['id_partida']!='') {
							echo $fila['id_partida'];
						}

			}
    }
		mysqli_close($conexion);
	}
	else
		echo "No esta correctamente completado el formulario de registro.";

?>
