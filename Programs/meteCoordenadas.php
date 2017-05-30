<?php
    include "conexion.php";
		//Conexión a la base de datos
    if(isset($_POST["id_juego"])&&isset($_POST['coordenadas'])&&isset($_POST['unoODos']))
  	{
      $conexion = conectar();
      $id_juego=mysqli_real_escape_string ($conexion, $_POST["id_juego"]);
      $coordenadas_uno=mysqli_real_escape_string ($conexion, $_POST["coordenadas"]);
      $unoODos=mysqli_real_escape_string ($conexion, $_POST["unoODos"]);

    	if (!mysqli_connect_errno($conexion)){
        $resp = mysqli_query($conexion, "UPDATE partida_en_curso SET coordenadas_".$unoODos."='".$coordenadas_uno."' WHERE partida_en_curso.id_partida=".$id_juego.";");
      }
    }
    else
      echo "Falta info";

      mysqli_close($conexion);
?>