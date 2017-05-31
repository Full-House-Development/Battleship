<?php
	include('conection.php');
	SESSION_START();
	$usu=$_SESSION['id'];
	$cont=0;
	$query=mysqli_query(conection(),'SELECT * FROM apoyo WHERE respuesta_apoyo IS NOT NULL AND id_usuario = "'.$usu.'";');
	$fila=mysqli_fetch_assoc($query);
	$rell=" <div id='modal1' class='modal bottom-sheet'>
				<div class='modal-content'>";
	while($fila)
	{
		$cont=$cont+1;
		$rell=$rell."<h4>".$fila['texto_apoyo']."</h4>
					  <p>".$fila['respuesta_apoyo']."</p>
					  <li><div class='divider'></div></li>";					  
		$fila=mysqli_fetch_assoc($query);
	}
	if($cont!=0)
	{	
		$rell=$rell."</div>
					<div class='modal-footer'>
					  <a href='#!' class='modal-action modal-close waves-effect waves-green btn-flat'>Agree</a>
					</div>
				</div>
				<div class='collection'>
					<a href='#modal1' class='collection-item'><span class='new badge'>".$cont."</span>Nueva(s) notificacion(es)</a>
				  </div>
				  <script>
				   $(document).ready(function(){
					// the 'href' attribute of .modal-trigger must specify the modal ID that wants to be triggered
						$('.modal').modal();
					});
				  </script>";
	}
	else	
		$rell="";
	echo $rell;
	
?>