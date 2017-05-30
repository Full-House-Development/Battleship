<?php
    include "conexion.php";
		//Conexión a la base de datos
    if(isset($_POST["id_juego"])&&isset($_POST['unoODos']))
  	{
      $conexion = conectar();
      $id_juego=mysqli_real_escape_string ($conexion, $_POST["id_juego"]);
      $unoODos=mysqli_real_escape_string ($conexion, $_POST["unoODos"]);
    	if (!mysqli_connect_errno($conexion)){
        //genera la publicacion automática
        if($unoODos=='uno'){
            $nom=mysqli_query($conexion, 'SELECT id_usuario_uno FROM partida_en_curso WHERE id_partida like"'.$id_juego.'"');
           $fila=mysqli_fetch_assoc($nom);
            $resp = mysqli_query($conexion, 'INSERT INTO publicaciones (id_usuario,texto_publicacion) VALUES ("'.$fila["id_usuario_uno"].'","He ganado")');
        }
        else{
           $nom=mysqli_query($conexion, 'SELECT id_usuario_dos FROM partida_en_curso WHERE id_partida like"'.$id_juego.'"');
           $fila=mysqli_fetch_assoc($nom);
           $resp = mysqli_query($conexion, 'INSERT INTO publicaciones (id_usuario,texto_publicacion) VALUES ("'.$fila["id_usuario_dos"].'","He ganado")');
        }
        //guarda los datos en la tabla juego_terminado
         $todo=mysqli_query($conexion, 'SELECT id_usuario_uno,id_usuario_dos FROM partida_en_curso WHERE id_partida LIKE "'.$id_juego.'"');
         if($unoODos=='uno')
             $registro= mysqli_query($conexion, 'INSERT INTO juego_terminado (id_usuario_ganador,id_usuario_perdedor) VALUES ("'.$fila["id_usuario_uno"].'","'.$fila["id_usuario_dos"].'")');
        else
            $registro= mysqli_query($conexion, 'INSERT INTO juego_terminado (id_usuario_ganador,id_usuario_perdedor) VALUES ("'.$fila["id_usuario_dos"].'","'.$fila["id_usuario_uno"].'")');
        //borrar registro de partida_en_curso
          $borrar=mysqli_query($conexion, 'DELETE FROM partida en curso WHERE id_partida LIKE "'.$id_juego.'"');
        echo "juego terminado";
      }
    }
    else
      echo "Falta info";
?>
