<?php
    include "conexion.php";
		//Conexión a la base de datos
    if(isset($_POST["id_juego"])&&iisset($_POST['unoODos']))
  	{
      $conexion = conectar();
      $id_juego=mysqli_real_escape_string ($conexion, $_POST["id_juego"]);
      $unoODos=mysqli_real_escape_string ($conexion, $_POST["unoODos"]);
    	if (!mysqli_connect_errno($conexion)){
        if($unoODos=='uno')
          $unoODos='id_usuario_uno';
        else
          $unoODos='id_usuario_dos';
        $nom=mysqli_query($conexion, 'SELECT '.$unoODos.' FROM partida_en_curso WHERE id_partida like"'.$id_juego.'"');
        $fila=mysqli_fetch_assoc($nom);
        $resp = mysqli_query($conexion, 'INSERT INTO publicaciones (id_usuario,texto_publicacion) VALUES ("'.$fila[$unoODos].'","He ganado")');
       
        echo $fila[$unoODos].$nom;
      }
    }
    else
      echo "Falta info";
?>