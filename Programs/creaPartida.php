<?php
	include "conexion.php";
	$a=0;
	if(isset($_POST["usuario"])&& $_POST["usuario_2"])
	{
		//Conexión a la base de datos
		$conexion =conectar();
		if (mysqli_connect_errno($conexion))
			echo "Fallo al conectar a MySQL:" . mysqli_connect_error();
		// En caso que la conexion sea exitosa, se mete al programa
		else{
			$usuarioRetador= mysqli_real_escape_string ($conexion, $_POST["usuario"]);
      $usuarioRetado= mysqli_real_escape_string ($conexion, $_POST["usuario_2"]);

			$resultado = mysqli_query($conexion, "SELECT id_partida FROM partida_en_curso WHERE partida_en_curso.id_usuario_uno='".$usuarioRetador."'  ORDER BY id_partida;");

			if ($resultado==true){
						$fila=mysqli_fetch_assoc($resultado);
						if ($fila['id_partida']!='') {
							echo $fila['id_partida'];
							$a++;
						}
			}
			$resultado = mysqli_query($conexion, "SELECT id_partida FROM partida_en_curso WHERE partida_en_curso.id_usuario_dos='".$usuarioRetador."'  ORDER BY id_partida;");

			if ($resultado==true){
						$fila=mysqli_fetch_assoc($resultado);
						if ($fila['id_partida']!='') {
							echo $fila['id_partida'];
							$a++;
						}

			}
			if($a==0){
      	$resultado = mysqli_query($conexion, "INSERT INTO partida_en_curso(id_usuario_uno, id_usuario_dos) VALUES('".$usuarioRetador."','".$usuarioRetado."');");
				$resultado = mysqli_query($conexion, "SELECT LAST_INSERT_ID();");
	      $fila=mysqli_fetch_assoc($resultado);
				echo $fila['LAST_INSERT_ID()'];
			}
    }
		mysqli_close($conexion);
	}
	else
		echo "No esta correctamente completado el formulario de registro.";

?>