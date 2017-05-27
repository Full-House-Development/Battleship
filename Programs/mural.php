<?php
	//$usu=$_SESSION['usuario'];
	$nomb="David Valencia";
	$usu="davidalencia";
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
        color:white;
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
<<<<<<< HEAD
	  nav
	  {
		position:fixed;
		z-index:10;
	  }
	  footer
	  {
		position:fixed;
	  }
=======
>>>>>>> master
      </style>
       <link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>
     </head>
     <body>
     <nav>
<<<<<<< HEAD
        <div class='nav-wrapper #e65100 orange darken-4'>
=======
         <div class='nav-wrapper #e65100 orange darken-4'>
>>>>>>> master
           <a href='#' class='brand-logo center'>Battle Ship</a>
           <ul id='nav-mobile' class='left hide-on-med-and-down'></ul>
		   <h1>".$nomb."</h1>
			<h1>".$usu."</h1>
         </div>
     </nav>
     <div id='todo'>
<<<<<<< HEAD
=======
       <!-- <ul class='collapsible' data-collapsible='accordion' >
	   
    <li>
      <div onclick='collapsible()' class='collapsible-header'><i class='material-icons'>filter_drama</i>First</div>
      <div class='collapsible-body'><span>Lorem ipsum dolor sit amet.</span></div>
    </li>
  </ul> -->
>>>>>>> master
            
          </div>
        </div>
      </div>
    </div>
      <div id='todo'>
<<<<<<< HEAD
	  </div>
      <footer class='page-footer #e65100 orange darken-4' id='foot' style='position:fixed;'>
		  <!--<div class='container'>
			 <div class='row'>
			   <div class='col l6 s12'>
				 <h5 class='white-text'>Just To Friends®</h5>
			   </div>
			 </div>
		   </div>
		   <div class='footer-copyright #bf360c deep-orange darken-4'>
			 <div class='container'>
			   © 2017 Copyright Text
			 </div>
		   </div>-->
=======

      </div>
      <footer class='page-footer #e65100 orange darken-4' id='foot'>
       <div class='container'>
         <div class='row'>
           <div class='col l6 s12'>
             <h5 class='white-text'>Just To Friends®</h5>
           </div>
         </div>
       </div>
       <div class='footer-copyright #bf360c deep-orange darken-4'>
         <div class='container'>
           © 2017 Copyright Text
         </div>
       </div>
>>>>>>> master
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
<<<<<<< HEAD
            url:'../Programs/conmural.php',
=======
            url:'../Programs/mural.php',
>>>>>>> master
            type:'POST',
            data:
            {
              nombre:nom
            },
            success:function(nombre)
            {
              nomb=nombre;
              $(document).writeText(nomb);
            }
          });
           var aj='id';
             $.ajax(
               {
<<<<<<< HEAD
                   url:'../Programs/conmural.php',
=======
                   url:'../Programs/mural.php',
>>>>>>> master
                   type:'POST',
                   data:
                   {
                     usu:aj
                   },
                   success:function(dato)
                   {
<<<<<<< HEAD
                     $('#foot').before(dato);
=======
                     $('#todo').append(dato);
>>>>>>> master
                   }
               });
           // var com=$('#resol').attr();
           // alert(com);
             function collapsible()
             {
                 $('.collapsible').collapsible();
             }
            // $('#com').after('com');
            // $.ajax(
            //   {
            //       url:'publi.php',
            //       // data:
            //       // {
            //       //   mivari:x
            //       // },
            //       success:function(dato)
            //       {
            //         $('#conpub').html(dato);
            //       }
            //   });
       // var idusuj;
        // $.ajax(
        // {
        //   url:'publi.php',
        //   // data:
        //   // {
        //   //     idusu:idusuj
        //   // },
        //   sucess:function(dato)
        //   {
        //     $('#conpub').html(dato);
        //   }
        // });
     </script>
     </body>
   </html> ";
?>