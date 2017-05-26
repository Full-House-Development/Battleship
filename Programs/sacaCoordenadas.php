<?php
    include "conexion.php";
		//Conexión a la base de datos
    if(isset($_POST["id_juego"])&&isset($_POST['unoODos']))
  	{
      $conexion = conectar();
      $id_juego=mysqli_real_escape_string ($conexion, $_POST["id_juego"]);
      $unoODos=mysqli_real_escape_string ($conexion, $_POST["unoODos"]);

    	if (!mysqli_connect_errno($conexion)){
        $resp = mysqli_query($conexion, "SELECT *FROM partida_en_curso WHERE partida_en_curso.id_partida=".$id_juego.";");
        $fila=mysqli_fetch_assoc($resp);
        echo $fila['coordenadas_'.$unoODos];
      }
    }
    else
      echo "Falta info";

      mysqli_close($conexion);
?>