<?php
    include "conexion.php";
		//Conexión a la base de datos
    if(isset($_POST["id_juego"]))
  	{
      $conexion = conectar();
      $id_juego=mysqli_real_escape_string ($conexion, $_POST["id_juego"]);
      $tiro=mysqli_real_escape_string ($conexion, $_POST["tiro"]);

    	if (!mysqli_connect_errno($conexion)){
        $resp = mysqli_query($conexion, "SELECT * FROM partida_en_curso WHERE partida_en_curso.id_partida=".$id_juego.";");
        $fila=mysqli_fetch_assoc($resultado);
        echo $fila['tiro'];
      }

      mysqli_close($conexion);
    }
    else
      echo "Falta info";


?>