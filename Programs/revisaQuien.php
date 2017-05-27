<?php
    include "conexion.php";
		//Conexión a la base de datos
      $conexion = conectar();
      $id_juego=mysqli_real_escape_string ($conexion, $_POST["id_juego"]);
      $retador=mysqli_real_escape_string ($conexion, $_POST["retador"]);

    	if (!mysqli_connect_errno($conexion)){
        $resp = mysqli_query($conexion, "SELECT *FROM partida_en_curso WHERE partida_en_curso.id_partida=".$id_juego.";");
        $fila=mysqli_fetch_assoc($resp);
        if($fila['id_usuario_uno']==retador)
          echo "retador";
        else {
          echo "retado";
        }
      }
    else
      echo "Falta info";

      mysqli_close($conexion);
?>
