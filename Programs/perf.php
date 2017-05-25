<?php
	//$usu=$_SESSION['usuario'];
	$nomb="David Valencia";
	$usu="davidalencia";
	//si comentan la parte de publicacion es scrip funciona
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
      </style>
       <link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>
     </head>
     <body>
     <nav>
         <div class='nav-wrapper #e65100 orange darken-4'>
           <a href='#' class='brand-logo center'>Battle Ship</a>
           <ul id='nav-mobile' class='left hide-on-med-and-down'></ul>
         </div>
     </nav>
     <div id='todo'>
       <!-- <ul class='collapsible' data-collapsible='accordion' >
    <li>
      <div onclick='collapsible()' class='collapsible-header'><i class='material-icons'>filter_drama</i>First</div>
      <div class='collapsible-body'><span>Lorem ipsum dolor sit amet.</span></div>
    </li>
  </ul> -->
      <div class='row'>
        <div class='col s12 l10 offset-l1'>
          <div class='card blue darken-1'>
            <div class='card-content white-text'>
              <div class='row'>
                  <div class='col  icon'>
                    <i class='small material-icons'>announcement</i>
                  </div>
                
                  <div class='col offset-l4'>
                    <img class='circle responsive-img' src='../Resources/Images/73.jpg'>
                  
                  </div>
                  <div class='col offset-l4 icon'>
                    <i class='small material-icons'>report_problem</i>
                  </div>
              </div>
              <div class='row'>
                <div class='col offset-l4'>
                  <h4 id='mostrar'>".$nomb."<h4>
                </div>
                <div class='usuder'>
                  <p id='mostrar'>".$usu."<p>
                </div>
              </div>
              <!-- <span class='card-title'>Card Title</span>
              <p>I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p><i class='medium material-icons'>today</i>
                  <i class='medium material-icons'>email</i> -->
            </div>
            <div class='card-action '>
              <div class='row'>
                <div class='col offset-l2 icon'>
                  <i id='nacimiento' class='medium material-icons lol'>today</i>
                </div>
                <div class='col offset-l2 icon'>
                  <i id='nombre' class='medium material-icons lol'>contacts</i>
                </div>
                <div class='col offset-l2 icon'>
                  <i id='correo' class='medium material-icons lol'>email</i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
	<div class='row'>
			<section>
				<div class='card-content right-align col l4'>
						<font style='font-family:'Courier New''><h3>Publicar?</h3></font>
				</div>
				<div class='card-content center-align col l5'>
					<textarea cols='50' rows='5' placeholder='¿Qué hay de nuevo?'></textarea>
				</div>
				<div class='card-content left-align col l3'>
					<button id='publicar'>Publicar</button>
				</div>
		  </section>
	</div>
	
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
            var muestri='mostrado';
           $('.lol').on('mouseover', {
            est:'on'
           },mostrar);
           $('.lol').on('mouseout', {
            est:'off'
           },mostrar);
           $('.lol').on('click', {
            est:'pri'
           },mostrar);
           function mostrar( event ) 
            {
              // var tipo=event.data.tipo;
              var estado=event.data.est;
              var info=$(this).attr('id');
              // if(info=='nombre')
              // {
                if(estado=='on')
                {
                  
                  // alert(info);
                  $('#mostrar').html(info);
                }
                if(estado=='off')
                {
                  $('#mostrar').html(muestri);
                }
              // }
              if(estado=='pri')
              {
                muestri=$(this).attr('id');
                // $(this).attr('class','medium material-icons loilol');
                $(this).removeClass('lol')
                $(this).addClass('loilo')
                //activar evento desactivado removeClass(),addClass();
                $(this).off();
                alert(info);
              }
            }
          var nomb='';
          var corr='';
          var nom='nom';
          $.ajax(
          {
            url:'../Programs/conperfil.php',
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
          });
           var aj='id';
             $.ajax(
               {
                   url:'../Programs/conperfil.php',
                   type:'POST',
                   data:
                   {
                     usu:aj
                   },
                   success:function(dato)
                   {
                     $('#todo').append(dato);
                   }
               });
           // var com=$('#resol').attr();
           // alert(com);
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
			</script>
		</body>
	</html>";
?>