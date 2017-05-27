<?php
	include("conection.php");
	session_start();
	$usuario = $_POST['perfext'];
	// $usuper=$_POST['usuper'];//se manda el id del usuario que se desee conocer
//guardar la publicacion hecha por el usuario
	$tex=(isset($_POST['texto']))?$_POST['texto']:"";
	if($tex!="")
	{
		$tex = mysqli_real_escape_string(conection(),$tex);
		if(conection())
		{
			$query=mysqli_query(conection(),'INSERT INTO publicaciones(id_usuario,texto_publicacion) VALUES("'.$usuario.'","'.$tex.'");');		
		}
		echo $tex;
	}

//---sacar datos del usuario:nombre,correo y fecha de nacimiento---
	$conj="";
	$nom=(isset($_POST['nombre']))?$_POST['nombre']:"";
	if($nom!="")
	{
		$qnomi="SELECT nombre_usuario FROM usuario WHERE id_usuario='".$nom."'";
		$impo=mysqli_query(conection(),$qnomi);
		$nomi=mysqli_fetch_assoc($impo);
		// echo $nomi['nombre_usuario'];
		$qnom="SELECT correo_usuario FROM usuario WHERE id_usuario='".$nom."'";
		$impo=mysqli_query(conection(),$qnom);
		$corri=mysqli_fetch_assoc($impo);
		// echo $corri['correo_usuario'];
		$qnom="SELECT nacimiento_usuario FROM usuario WHERE id_usuario='".$nom."'";
		$impo=mysqli_query(conection(),$qnom);
		$naci=mysqli_fetch_assoc($impo);

		$conj=$nomi['nombre_usuario'].",".$corri['correo_usuario'].",".$naci['nacimiento_usuario'];
		echo $conj;
	}
	$idpubli=(isset($_POST['id_publi']))?$_POST['id_publi']:"";
	if($idpubli!="")
	{
		$qcomi="INSERT INTO comentario(id_usuario,id_publicacion,texto_comentario) VALUES ('".$_POST['id_usu']."','".$_POST['id_publi']."','".$_POST['tex_com']."')";
		$impo=mysqli_query(conection(),$qcomi);
		echo $qcomi;

	}
//---sacar todas las publicaciones---
	$usu=(isset($_POST['usu']))?$_POST['usu']:"";
	if($usu!="")
	{
		$que="SELECT usuario.nombre_usuario,publicaciones.texto_publicacion,publicaciones.id_publicaciones,publicaciones.tiempo_publicacion FROM publicaciones JOIN usuario ON usuario.id_usuario=publicaciones.id_usuario WHERE usuario.id_usuario='".$usuario."' ORDER BY publicaciones.tiempo_publicacion DESC";
		$impor=mysqli_query(conection(),$que);
		$fila=mysqli_fetch_assoc($impor);
		$rell="";
		while($fila)
		{
			$rell=$rell."
			<div class='row'>
	        	<div class='col s12 l6 offset-l3 ' id='pub'>
	            	<div class='card blue darken-1 z-depth-5'>
	              		<div class='card-content white-text'>
			                <span class='card-title'>".$fila['nombre_usuario']."<p>".$fila['tiempo_publicacion']."</p></span>
			                <p>".$fila['texto_publicacion']."</p>
	              		</div>

		              			<a class='col l6 waves-effect waves-light red darken-1 btn' onclick='like(".$fila['id_publicaciones'].")'><i class='material-icons left'>thumb_down</i>ME DISGUSTA</a>
		              	
		              		
		              			<a class='col l6 waves-effect waves-light green darken-1 btn' onclick='dislike(".$fila['id_publicaciones'].")'><i class='material-icons right'>thumb_up</i>ME GUSTA</a>
		              	

	                 	<ul class='collapsible' data-collapsible='accordion' >
	    					<li id='numerocomentario".$fila['id_publicaciones']."'>
	      						<div onclick='collapsible()' class='collapsible-header'><i class='material-icons'>comment</i>Comentarios
	      						</div>";
	      	$pub=$fila['id_publicaciones'];
      		// if($pub>0)
      		// {
      			$quecom="SELECT comentario.texto_comentario,comentario.tiempo_comentario,comentario.id_usuario FROM comentario JOIN publicaciones ON publicaciones.id_publicaciones=comentario.id_publicacion WHERE comentario.id_publicacion='".$pub."'"; 
      		// }
			$imporcom=mysqli_query(conection(),$quecom);
			$filacom=mysqli_fetch_assoc($imporcom);
			$rellcom="";
			// if(!$filacom)
			// {
			// 	$rellcom="<div class='collapsible-body'><h6>No hay comentarios</h6></div>";
			// }
			while($filacom)
			{
				$idus=$filacom['id_usuario'];
				$quecomu="SELECT nombre_usuario FROM usuario WHERE id_usuario='".$idus."'";
				
				$imporcomu=mysqli_query(conection(),$quecomu);
				$filacomu=mysqli_fetch_assoc($imporcomu);

				$rellcom=$rellcom."<div class='collapsible-body' ><h1>".$filacomu['nombre_usuario'].":"."</h1><span>".$filacom['texto_comentario']."<p>".$filacom['tiempo_comentario']."</p></span></div>";
        		$filacom=mysqli_fetch_assoc($imporcom);
			}
			$rell=$rell.$rellcom."
    					</li>
  					</ul>
              		<div class='row'>
        				<div class='row' >
          					<div class='input-field col s6 comentarios'>
            					<input placeholder='Comentar ...' onchange='buffer(".$fila['id_publicaciones'].")'class='comen' id='".$fila['id_publicaciones']."' type='text' data-length='30'/>
            					
          					</div>
          					<div class='col offset-l1 comentarios white-text'>
          						<i onclick=sending('".$fila['id_publicaciones']."') class='material-icons small'>textsms</i>
          					</div>
          					<div class='col offset-l1 white-text'>
			                    <i class='small material-icons'>report_problem</i>
			                </div>
			                <div class='col offset-l1 white-text'>
			                    <i class='small material-icons'>info_outline</i>
			                </div>
          					<div class=col offset-l3'> 
          						<a class='waves-effect waves-light red btn'><i class='material-icons right'>games</i>¤¤¤¤¤¤¤RETAR¤¤¤¤¤¤¤</a> 
          					</div>
          					
        				</div>
       				</div>
            	</div>
        	</div>
        </div>";
		$fila=mysqli_fetch_assoc($impor);
		// onblur='sendi(".$fila['id_publicaciones'].")'
		
	}
	echo $rell;
}
?>
