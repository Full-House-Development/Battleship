<?php
		//Conexión a la base de datos
    if(isset($_POST["id_juego"])&&isset($_POST['tiro'])&&isset($_POST['contador']))
  	{
      $conexion = mysqli_connect("localhost","root","","final");
      $id_juego=mysqli_real_escape_string ($conexion, $_POST["id_juego"]);
      $tiro=mysqli_real_escape_string ($conexion, $_POST["tiro"]);
      $contador=mysqli_real_escape_string ($conexion, $_POST["contador"]);
      $contador++;
    	if (!mysqli_connect_errno($conexion)){
        $resp = mysqli_query($conexion, "UPDATE partida_en_curso SET tiro='".$contador.$tiro."' WHERE partida_en_curso.id_partida=".$id_juego.";");
      }

      mysqli_close($conexion);
    }
    else
      echo "Falta info";


?>