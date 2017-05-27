<?php
    include "conexion.php";
		//Conexión a la base de datos
    $usu="uno";
    $id_juego="1";
    if(isset($id_juego)&&iisset($usu))
  	{
      $conexion = conectar();
      $id_juego=mysqli_real_escape_string ($conexion,$id_juego);
      $unoODos=mysqli_real_escape_string ($conexion, $usu);
    	if (!mysqli_connect_errno($conexion)){
      f($unoODos=='uno')
          $unoODos='id_usuario_uno';
        else
          $unoODos='id_usuario_dos';
        $nom=mysqli_query($conexion, 'SELECT '.$unoODos.' FROM partida_en_curso WHERE id_partida like"'.$id_juego.'"');
        $fila=mysqli_fetch_assoc($nom);
        $resp = mysqli_query($conexion, 'INSERT INTO publicaciones (id_usuario,texto_publicacion) VALUES ("'.$unoODos.'","He ganado")');
       
        echo $fila[$unoODos].$nom;
      }
    }
    else
      echo "Falta info";
?>