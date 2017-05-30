<?php
    include "conexion.php";
		//Conexión a la base de datos
    if(isset($_POST["id_juego"])&&isset($_POST['unoODos'])&&isset($_POST['puntaje1'])&&isset($_POST['puntaje2']))
  	{
      $conexion = conectar();
      $id_juego=mysqli_real_escape_string ($conexion, $_POST["id_juego"]);
      $unoODos=mysqli_real_escape_string ($conexion, $_POST["unoODos"]);
      $puntaje1=mysqli_real_escape_string ($conexion, $_POST["puntaje1"]);
      $puntaje2=mysqli_real_escape_string ($conexion, $_POST["puntaje2"]);
    	if (!mysqli_connect_errno($conexion)){
        $todo=mysqli_query($conexion, 'SELECT id_usuario_uno,id_usuario_dos FROM partida_en_curso WHERE id_partida LIKE "'.$id_juego.'"');
        $fila=mysqli_fetch_assoc($todo);
        //genera la publicacion automática
        if($unoODos=='uno'){
            $resp = mysqli_query($conexion, 'INSERT INTO publicaciones (id_usuario,texto_publicacion) VALUES ("'.$fila["id_usuario_uno"].'","He ganado")');
             //guarda los datos en la tabla juego_terminado
            $registro= mysqli_query($conexion, 'INSERT INTO juego_terminado (id_usuario_ganador,id_usuario_perdedor,puntos_ganador,puntos_perdedor) VALUES ("'.$fila["id_usuario_uno"].'","'.$fila["id_usuario_dos"].'","'.$puntaje1.'","'.$puntaje2.'")');
        }
        else{
           $resp = mysqli_query($conexion, 'INSERT INTO publicaciones (id_usuario,texto_publicacion) VALUES ("'.$fila["id_usuario_dos"].'","He ganado")');
            //guarda los datos en la tabla juego_terminado
            $registro= mysqli_query($conexion, 'INSERT INTO juego_terminado (id_usuario_ganador,id_usuario_perdedor,puntos_ganador,puntos_perdedor) VALUES ("'.$fila["id_usuario_dos"].'","'.$fila["id_usuario_uno"].'","'.$puntaje2.'","'.$puntaje1.'")');
        }
        //borrar registro de partida_en_curso
          $borrar=mysqli_query($conexion, 'DELETE FROM partida_en_curso WHERE id_partida LIKE "'.$id_juego.'"');
        echo "juego terminado";
      }
    }
    else
      echo "Falta info";
?>
