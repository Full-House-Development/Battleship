<?php
	$pubcam=["nombre_usuario"];
	$cone=mysqli_connect("localhost","root","","final");
	echo "1";
	if(isset($_POST['usu']))
	{
		$usu=$_POST['usu'];
	}
	else
		$usu="";
	if($usu!="")
		{
			echo "2";
			$que="SELECT * FROM publicaciones;";
			//$que="SELECT usuario.nombre_usuario,publicaciones.texto_publicacion,publicaciones.id_publicaciones,publicaciones.tiempo_publicacion FROM publicaciones JOIN usuario ON usuario.id_usuario=publicaciones.id_usuario";
			$impor=mysqli_query($cone,$que);
			$fila=mysqli_fetch_assoc($impor);
			$rell="";
			while($fila)
			{
				echo "3";
				$rell=$rell."
				<div class='row'>
					<div class='col s12 l6 offset-l3 ' id='pub'>
						<div class='card orange darken-1 z-depth-5'>
							<div class='card-content white-text'>
								
								<p>".$fila['texto_publicacion']."</p>
							</div>
							<ul class='collapsible' data-collapsible='accordion' >
			<li>
			  <div onclick='collapsible()' class='collapsible-header'><i class='material-icons'>textsms</i>Comentarios</div>";
				$pub=$fila['id_publicaciones'];
					$quecom="SELECT * FROM comentario JOIN publicaciones ON publicaciones.id_publicaciones=comentario.id_publicacion";
					$imporcom=mysqli_query($cone,$quecom);
					$filacom=mysqli_fetch_assoc($imporcom);
					$rellcom="";
					echo "afuera";
					while($filacom)
					{
						echo "adentro";
						echo $filacom;
						$rellcom=$rellcom."<div class='collapsible-body'><span>".$filacom['texto_comentario']."<p>".$filacom['tiempo_comentario']."</p></span></div>";
						$filacom=mysqli_fetch_assoc($imporcom);
					}
		
					$rell=$rell.$rellcom."
				</li>
			  </ul>
				<div class='row'>
					<div class='row'>
					  <div class='input-field col s6'>
						<input id='".$filacom['id_comentario']."' name='com".$fila['id_publicaciones']."' type='text' data-length='30'>
						<label for='input_text'>Comentar</label>
						<input type='submit' class='dormir' value='comentario'/>
					  </div>
					</div>
					</div>
					</div>
				</div>";
		  
			$fila=mysqli_fetch_assoc($impor);
		}
	echo $rell;
	}
?>