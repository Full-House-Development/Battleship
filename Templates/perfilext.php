<?php

  SESSION_START()
  $retador=$_SESSION['id'];
	$form="<form action='../Templates/juego/index.php' method='post'></form>";
	$input_jugador="<input type='text' name='id_jugador' value=".$id."/>";
	$input_retador="<input type='text' name='retador' value=".$retador."/>";
	$input_sumbit="<input type='submit' id='botonIniciaPartida'>";

	$perfil=$_POST['perfext'];
	$numid = strpos($perfil,'+');
	$id=substr($perfil,0,$numid);
	//id
	$numfoto=strpos($perfil,'+',($numid+1));
	$foto=substr($perfil,($numid+1),($numfoto-$numid-1));
	//foto
	$numfecha=strpos($perfil,'+',($numfoto+1));
	$fecha=substr($perfil,($numfoto+1),($numfecha-$numfoto-1));
	//fecha
	$numcorreo=strpos($perfil,'+',($numfecha+1));
	$correo=substr($perfil,($numfecha+1),($numcorreo-$numfecha-1));
	//correo
	$numnom=strpos($perfil,'+',($numcorreo+1));
	$nombre=substr($perfil,($numcorreo+1),($numnom-$numcorreo-1));
	//nombre
	$numap=strpos($perfil,'+',($numnom+1));
	$apellido=substr($perfil,($numnom+1));
	//apellido


	//Inicio de sesión
	//$nomb= $_SESSION['nombre'];
	//$usu= $_SESSION['id'];

	echo "<!DOCTYPE html>
		   <html lang='es'>
			 <head>
			   <meta http-equiv='Content-type' content='text/html'; charset='UTF-8'>
			   <link href='http://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>
			   <link type='text/css' rel='stylesheet' href='../Documents/css/materialize.min.css'  media='screen,projection'/>
			   <script type='text/javascript' src='https://code.jquery.com/jquery-2.1.1.min.js'></script>
			   <script type='text/javascript' src='https://code.jquery.com/jquery-2.1.1.min.js'></script>
			   <meta name='viewport' content='width=device-width, initial-scale=1.0'/>
			   <script type='text/javascript' src='../Documents/js/materialize.min.js'></script>
			   <style>
				  div h1
				  {
					font-size:20px;
					display:inline;
					color:red;
				  }
				  div span
				  {
					display:inline;
				  }
				  #pub
				  {
					position:relative;
					top:40px;

				  }
				  #foot
				  {
					position:relative;
					top:100px;
				  }
				  span p
				  {
					position:absolute;
					left:350px;
					font-size:15px;
					display:inline;
				  }
				  .usuder
				  {
					position:absolute;
					top:200px;
					right:80px;
					font-size:20px;
				  }
				  .circle
				  {
					height:190px;
					width:190px;
				}
			  </style>
			   <link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>
			 </head>
			 <body>
				<nav class='cyan darken-1' role='navigation'>
						<div class='nav-wrapper container'>
							<ul class='left hide-on-med-and-down'>
										<li><a href='../Templates/close.php'><i class='material-icons'>power_settings_new</i></a></li>
										<li><a href='../Templates/muro.php'><i class='material-icons'>web</i></a></li>
										<li><a href='../Programs/perf.php'><i class='material-icons'>person_pin</i></a></li>
							</ul>
							<a href='#!' class='brand-logo center'>B A T T L E S H I P</a>
						</div>
				</nav>

			  <div class='container'>
				  <div class='card light-blue darken-1'>
					<div class='card-content white-text'>
					  <div class='center container'>
						  <div class='center container'>

							  <div class='right-align icon'>
								<i class='small material-icons'>announcement</i>
							  </div>

							  <div class='center-align'>
								<img class='circle responsive-img' src='../Resources/Avatar/'.$foto.'>
							  </div>

							  <div class='right-align icon'>
								<i class='small material-icons'>report_problem</i>
							  </div>

							  <div class='center card-action container'>
								  <div class='row'>
									<div class='col s4 icon'>
									  <i id='".$fecha."' class='medium material-icons lol'>today</i>
									</div>
									<div class='col s4 icon'>
									  <i id='".$nombre." '.$apellido.'' class='medium material-icons lol'>contacts</i>
									</div>
									<div class='col s4 icon'>
									  <i id='".$correo."' class='medium material-icons lol'>email</i>
									</div>
								  </div>
							  </div>

						  </div>
					  </div>
					  <div class='container'>
						<div class='center'>
						  <h4 id='mostrar'>".$nombre." ".$apellido."<h4>
						</div>
						<div class='card-content right-align col l3'>
							<button id='retar' class='btn-large waves-effect waves-light'>Retar</button>
						</div>
						<div class='card-content left-align col l3'>
							<button id='reportar' class='btn-large waves-effect waves-light'>Reportar</button>
						</div>
					  </div>
					</div>
				  </div>
			  </div>

			<div class='row'>
					<section>
						<div class='container'>
							<div class='card-content right-align col l3'>
								<font style='font-family:'Courier New''><h3>¿Publicar?</h3></font>
							</div>
							<div class='card-content center-align col l6'>
								<textarea cols='50' rows='5' placeholder='¿Qué hay de nuevo?' class='materialize-textarea'></textarea>
							</div>
							<div class='card-content left-align col l3'>
								<button id='publicar' class='btn-large waves-effect waves-light'>Publicar</button>
							</div>
						</div>
				  </section>
			</div>
			<button id='ayuda'/>

			  <div id='todo'>
			  </div>

			  <footer class='white page-footer' id='foot'>
					  <div class='footer-copyright teal'>
						<div class='container white-text'>
						© 2017 Copyright Text
						<a class='white-text right' href='http://www.prepa6.unam.mx'>Preparatoria 6 Antonio Caso</a>
						</div>
					  </div>
			 </footer>
			 <script>
				$('#ayuda').click(function (){
					var ayuda=prompt('Escribe en el siguiente recuadro tus preguntas y trataremos de responderte a la brevedad');
					$.ajax(
					{
						url:'../Programs/conayuda.php',
						type:'POST',
						data:
						{
						  aiuda:ayuda
						},
						success:function(res)
						{
						  alert(res);
						}
					});

				});


					var muestri='".$nombre.' '.$apellido."';
					   $('.lol').on('mouseover', {
						est:'on'
					   },mostrar);
					   $('.lol').on('mouseout', {
						est:'off'
					   },mostrar);
					   $('.lol').on('click', {
						est:'pri'
					   },mostrar);
					<!--Funcion muestra el ID de cada uno de los iconos dentro de la card del usuario-->
					function mostrar( event )
					{
						var estado = event.data.est;
						var info = $(this).attr('id');
						if(estado=='on')
						  $('#mostrar').html(info);
						if(estado=='off')
						  $('#mostrar').html(muestri);
						if(estado=='pri')
						  {
							muestri=$(this).attr('id');
							$(this).removeClass('lol')
							$(this).addClass('loilo')
							$(this).off();
							alert(info);
						  }
					}
				  var nomb='';
				  var corr='';
				  /*var nom='nom';
				  $.ajax(
				  {
					url:'../Programs/conperfilext.php',
					type:'POST',
					data:
					{
					  nombre:nom
					},
					success:function(nombre)
					{
					  nomb=nombre;
					  //$(document).writeText(nomb);
					}
				  });*/
				   var nom='$id';
					 $.ajax(
					   {
						   url:'../Programs/conperfilext.php',
						   type:'POST',
						   data:
						   {
							 usu:nom
						   },
						   success:function(dato)
						   {
							 $('#foot').before(dato);
						   }
					   });
					 function collapsible()
					 {
						 $('.collapsible').collapsible();
					 }
				var n=0;
				var i=0;
				var tex;
				var d=new Date();
				var hr;
				$('#publicar').click(function(){
							$('#publicaciones').empty();
							tex=$('textarea').val();
							if(n==0)
								$('#publicaciones').add('<h2>Publicaciones</h2>').appendTo(document.body);
							console.log(tex);
							//$('#foot').before('<div class='row'><div class='card orange darken-1 z-depth-5 col s12 l6 offset-l3'><div class='card-content white-text'><span class='card-title'>Usuario<p>+hr+>/p></span><p>+tex+</p></div><div class='material-icons'>thumb_up</div><span id='p'>like</span><br/><br/><font color='white'><div class='row'><label for='input_text'>Comentar</label><div class='input-field col s6'><input id='input_text' type='text'/><button class='comentar btn waves-effect waves-light' type='submit' name='action'/>Comentar<i class='material-icons right'>send</i></button></font></div></div></div></div>');


							$.ajax({
								url:'../Programs/publicaciones.php',
								type:'post',
								data:{
									tex:$('textarea').val(),
								},
								success:function(resul){
									console.log(resul);
									}
							});
						});

							n=1;
							i++;
							$('.comentar').click(function(){
									var com=this.previousSibling.value;
									var el=document.createElement('div');
									l=this.parentNode.insertBefore(el,this.previousSibling);
									l.innerHTML=('<p>'+d.getDate()+'/'+(d.getMonth()+1)+'/'+d.getFullYear()+'a las '+d.getHours()+':'+d.getMinutes()+'<br/>'+com+'</p>');
							});
							$('span').click(function(){
									$('#p').append('<li>like</li>');
									$('#p').append('<li>love</li>');
									$('#p').append('<li>risa</li>');
									$('#p').append('<li>enojo</li>');
									$('li').click(function(){
										var rec=this.innerHTML;
										$('#p').empty();
										//$('#p').append(rec+' <img src='../resources/images/'+rec+'.gif'/>');
									});
							});
							var reta='$id';
						$('#retar').click(function()
						{
							$.ajax(
						   {
							   url:'../Programs/creaPartida.php',
							   type:'POST',
							   data:
							   {
								 retado:reta
							   },
							   success:function(res)
							   {
									 form=$('".$form."');
									 idText='<input type=\'text\' name=\'id_juego\' value='+res+'/>';
									id=$(idText);
									form.append($('".$input_jugador."'));
									form.append($('".$input_retador."'));
									form.append($(id));
									form.append($('".$input_sumbit."'));
									$('body').append(form);
									$('#botonIniciaPartida').trigger('click');
							   }
						   });
						  });
						  var reta='$id';
						$('#reportar').click(function()
						{
							var hola=confirm('¿Estás seguro de que quieres reportar a esta persona?');
							if(hola==true)
							{
								$.ajax(
							   {
								   url:'../Programs/conreporte.php',
								   type:'POST',
								   data:
								   {
									 reportar:reta
								   },
								   success:function(res)
								   {
									 alert(res);
								   }
							   });
							}
						  });
					</script>
				</body>
		</html>";
?>
