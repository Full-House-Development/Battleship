<?php
<<<<<<< Updated upstream
    //Conexión a la base de datos
        include "conexion.php";
    if(isset($_POST["id_juego"])&&isset($_POST['tiro'])&&isset($_POST['contador']))
    {
=======
		//Conexión a la base de datos
        include "conexion.php";
    if(isset($_POST["id_juego"])&&isset($_POST['tiro'])&&isset($_POST['contador']))
  	{
>>>>>>> Stashed changes
      $conexion = conectar();
      $id_juego=mysqli_real_escape_string ($conexion, $_POST["id_juego"]);
      $tiro=mysqli_real_escape_string ($conexion, $_POST["tiro"]);
      $contador=mysqli_real_escape_string ($conexion, $_POST["contador"]);

<<<<<<< Updated upstream
      if (!mysqli_connect_errno($conexion)){
=======
    	if (!mysqli_connect_errno($conexion)){
>>>>>>> Stashed changes
        $resp = mysqli_query($conexion, "UPDATE partida_en_curso SET tiro='".$contador.$tiro."' WHERE partida_en_curso.id_partida=".$id_juego.";");
      }

      mysqli_close($conexion);
    }
    else
      echo "algo anda mal";


?>
