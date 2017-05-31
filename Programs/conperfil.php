<?php
	//Inicio de sesión
	session_start();
	include('conection.php'):
	//Coneccion para publicaciones de perfil de usuario
	$usu = $_SESSION['id'];
	$cone = conection();
	mysqli_set_charset($cone,"utf8");
	$que="SELECT usuario.id_usuario,publicaciones.texto_publicacion,publicaciones.id_publicaciones,publicaciones.tiempo_publicacion FROM publicaciones JOIN usuario ON usuario.id_usuario=publicaciones.id_usuario";
	$impor= mysqli_query($cone,$que);
	$fila= mysqli_fetch_assoc($impor);
	$rell= "";
	while($fila)
	{
		$rell=$rell."
		<div class='row'>
        	<div class='col s12 l6 offset-l3 ' id='pub'>
            	<div class='card blue darken-1 z-depth-5'>
              		<div class='card-content white-text'>
		                <span class='card-title'>".$fila['id_usuario']."<p>".$fila['tiempo_publicacion']."</p></span>
		                <p>".$fila['texto_publicacion']."</p>
              		</div>
                 	<ul class='collapsible' data-collapsible='accordion' >
    <li>
      <div onclick='collapsible()' class='collapsible-header'><i class='material-icons'>textsms</i>Comentarios</div>";
      	$pub=$fila['id_publicaciones'];
      			$quecom="SELECT comentario.texto_comentario,comentario.tiempo_comentario,comentario.id_usuario FROM comentario JOIN publicaciones ON publicaciones.id_publicaciones=comentario.id_publicacion WHERE comentario.id_publicacion='".$pub."'"; 
			$imporcom=mysqli_query($cone,$quecom);
			$filacom=mysqli_fetch_assoc($imporcom);
			$rellcom="";
			while($filacom)
			{
				$idus=$filacom['id_usuario'];
				$quecomu="SELECT usuario.nombre_usuario FROM publicaciones JOIN usuario ON usuario.id_usuario=publicaciones.id_usuario WHERE usuario.id_usuario='".$idus."'";
				
				$imporcomu=mysqli_query($cone,$quecomu);
				$filacomu=mysqli_fetch_assoc($imporcomu);
				$rellcom=$rellcom."<div class='collapsible-body'><h1>".$filacomu['nombre_usuario'].":"."</h1><span>".$filacom['texto_comentario']."<p>".$filacom['tiempo_comentario']."</p></span></div>";
        		$filacom=mysqli_fetch_assoc($imporcom);
			}
			$rell=$rell.$rellcom."
    </li>
  </ul>
              	<div class='row'>
        <div class='row'>
          <div class='input-field col s6'>
            <input id='input_text' type='text' data-length='30' onblur='sendi(".$fila['id_publicaciones'].")'>
            <label for='input_text'>Comentar</label>
          </div>
        </div>
        </div>
            </div>
        </div>";
      
		$fila=mysqli_fetch_assoc($impor);
	}
	echo $rell;
?>
