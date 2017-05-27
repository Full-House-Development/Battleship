<?php
//este archivo se manda desplegar cuando se desea conocer el perfil de otra persona
session_start();
  $idusu=(isset($_SESSION['id']))?$_SESSION['id']:"";//del perfil a consultar
  $nomusu=(isset($_POST['perfext']))?$_POST['perfext']:"";//del perfil a consultar
  if($idusu!="")
  {
?>
<!DOCTYPE html>
   <html lang="es">
     <head>
      <meta http-equiv="Content-type" content="text/html"; charset="UTF-8">
       <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
       <link type="text/css" rel="stylesheet" href="../Documents/css/materialize.min.css"  media="screen,projection"/>
       <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
       <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
       <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
       <script type="text/javascript" src="../Documents/js/materialize.min.js"></script>
       <style>
      .comentarios
      {
        position:relative;
        bottom:2px;
      }
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
        position:relative;
        bottom:300px;
        left:400px;
        font-size:40px;
      }
      </style>
       <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     </head>
     <body>
     <nav class='cyan darken-1' role='navigation'>
            <div class='nav-wrapper container'>
              <ul class='left hide-on-med-and-down'>
                    <li><a href='../Templates/close.php'><i class='material-icons'>power_settings_new</i></a></li>
                    <li><a href='../Templates/muro.php'><i class='material-icons'>web</i></a></li>
                    <li><a href='perfil.php'><i class='material-icons'>person_pin</i></a></li>
                    <li><a href='juego/index.php'><i class='material-icons'>games</i></a></li>
                    <li><a href='ranking.html'><i class='material-icons'>assessment</i></a></li>
              </ul>
              <a href='#!' class='brand-logo center'>B A T T L E S H I P</a>
              <div class='right nav-wrapper'>
                  <form method='POST' action='../Templates/otroperfil.php'>
                    <div class='input-field'>
                      <input type='search' name='perfext'/>
                    </div>
                  </form>
              </div>
            </div>
        </nav>
     <div id="todo">
      <div class="row">
        <div class="col s12 l8 offset-l2">
          <div class="card light-blue darken-1">
            <div class="card-content white-text">
<!-- Parte de arriba del card perfil donde aparece la foto y los botones de reportar y pedir ayuda -->
              <div class="row">

                  <div class="col  icon">
                    <i class="small material-icons">announcement</i>
                  </div>
                <?php
                  echo "<div class='col offset-l2'>
                <img class='circle responsive-img' src='../Resources/Avatar/".$_SESSION['foto'].".jpg'>";
                  ?>
                  </div>
                  <div class="col offset-l3 icon">
                    <i class="small material-icons sending">info_outline</i>
                  </div>
              </div>
              <div class="container">
              <div class="row">
<!-- Botones para mostrar los datos solicitados de nombre, correo y fecha de nacimiento -->
              <div class='center-align'>
                <div class="col offset-l1 offset-s1 icon">
                  <i id="nacimiento" class="medium material-icons lol">today</i>
                </div>
                <div class="col offset-l2 offset-s1 icon">
                  <i id="nombre" class="medium material-icons lol">contacts</i>
                </div>
                <div class="col offset-l2 offset-s1 icon">
                  <i id="correo" class="medium material-icons lol">email</i>
                </div>
              </div>
              </div>
            </div>
              <div class="row container">
<!-- Renglón donde aparece el nombre del usuario, así como su id del lado derecho -->
                <div class="center-align">
                  <h4 id="mostrar">mostrado</h4>
                </div>
                <div class="usuder">
                <!-- Aqui se inserta el id_usuario -->
                  <p id="mostrarusu"><p>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
    <div id="publicacion"class='row'>
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
<!-- Aqui se incluye todo lo sacado de ajaxperfil.php -->
      <div id="publics">

      </div>
<!-- Implementacion del footer de la página -->
      <footer class="page-footer #e65100 orange darken-4" id="foot">
       <div class="container">
         <div class="row">
           <div class="col l6 s12">
             <h5 class="white-text">BattleShip</h5>
           </div>
         </div>
       </div>
       <div class="footer-copyright #bf360c deep-orange darken-4">
         <div class="container">
           © 2017 Copyright Text
         </div>
       </div>
     </footer>
     <script>
     // var nombrem="";
     // var correom="";
     // var fecnam="";
//enviar lo que esta en el cuadro de busqueda y buscarlo     
     $('#enviar').click(function (){
        var bus=$('#buscar').val();
         $.ajax(
           {
             url:'../Programs/conbuscar.php',
             type:'POST',
             data:
             {
             busca:bus
             },
             success:function(busqueda)
             {
             if(busqueda!='no se encontraron resultados')
             {
              $('#perfext').attr('value',busqueda);
              $( '#rel').trigger('click');
             }
             }    
           });
      });
// Ajax que guarda las publicaciones y las genera instantáneamente
//var d=new Date();^//Karla ya habia aislado esto para mostrar la fecha y hora actual
var n=0;
var d="2017-05-27 10:30";//^^ATENCION!!!!! Favor de sustituir este string por la fecha y hora actual de la publicacion como la arriba
     var usuario='<?php echo $idusu; ?>';
     var nombre='<?php echo $nomusu; ?>';
      $("#publicar").click(function(){
          var tex=$("textarea").val();
            $("#publicacion").after("<div class='row'>          <div class='col s12 l6 offset-l3 ' id='pub'>              <div class='card blue darken-1 z-depth-5'>                  <div class='card-content white-text'>                    <span class='card-title'>"+nombre+"<p>"+d+"</p></span>                    <p>"+tex+"</p>                  </div>                  <ul class='collapsible' data-collapsible='accordion' >    <li>      <div onclick='collapsible()' class='collapsible-header'><i class='material-icons'>comment</i>Comentarios</div>      <div class='collapsible-body'><h5 style='color:yellow; font-size:20px;'>Espere a que alguien más comente su reciente publicacion marinero "+nombre+"</h5>              </div>          </div>        </div>");
          $.ajax({
            url:"otroajaxperfil.php",
            type:"post",
            data:{
              texto:tex,
              perfex:perfil
            },
            success:function(resul){
             
              }
          });
          $("textarea").val("");
          $tex="";
    });
// Ajax que envía la informacion propia de un comentario para guardarla en la base de datos
        function sending(idtexto)
          {
            if(comentarionum==idtexto&&comentariocon!="")
            {
              var idcomentario="#"+idtexto;
              var numerocomentario="#numerocomentario"+idtexto;
              var textocomen=$(idcomentario).val();
              var ubicarcollapsible=$(numerocomentario);
              ubicarcollapsible.append("<div class='collapsible-body'><h1>"+nombre+":"+"</h1><span>"+comentariocon+"<p>"+d+"</p></span></div>");
              $.ajax(
              {
                url:"otroajaxperfil.php",
                type:"POST",
                data:
                {
                  id_publi:idtexto,
                  tex_com:comentariocon,
                  id_usu:perfil
                },
                success:function(quer)
                {
                  console.log(quer);
                }
              });
              $(idcomentario).val("");
              $(numerocomentario).attr("class","");
              $(".collapsible").collapsible();
              comentariocon="";
            }
          } 
// Ajax que saca toda las publicaciones de la base de datos y las inserta en div #publics
        var aj="id";
        $.ajax(
         {
             url:"otroajaxperfil.php",
             type:"POST",
             data:
             {
               usu:aj,
               perfext:perfil
             },
             success:function(dato)
             {
               $("#publics").append(dato);
             }
         });

// Declaracion del efecto collapsible necesaria para que se pueda ejecutar
    function collapsible()
             {
                 $(".collapsible").collapsible();
             }
    function buffer(idpub)
            {
              comentarionum=idpub;
              console.log(comentarionum);
              var ids="#"+idpub;
              comentariocon=$(ids).val();
              console.log(comentariocon);
            }
    
// Comienza la animacion de los ícones de nombre, correo y fecha de nacimiento por eventos js
     $("#mostrarusu").html(usuario);
     var comentarionum="";
     var comentariocon="";
            
          var den=$("#mostrar").html();
          console.log(den);
            // var muestri=nombrem;
            // console.log(muestri);
           $(".lol").on("mouseover", {
            est:"on"
           },mostrar);
           $(".lol").on("mouseout", {
            est:"off"
           },mostrar);
           $(".lol").on("click", {
            est:"pri"
           },mostrar);
    // Cambia el contenido en div #mostrar segun el ícono activado por el evento
           function mostrar( event ) 
            {
              // var tipo=event.data.tipo;
              var estado=event.data.est;
              var info=$(this).attr("id");
              // if(info=="nombre")
              // {
                if(estado=="on")
                {

                  $("#mostrar").html(info);
                }
                if(estado=="off")
                {
                  $("#mostrar").html(muestri);
                }
              // }
              if(estado=="pri")
              {
                muestri=$(this).attr("id");
                // $(this).attr("class","medium material-icons loilol");
                $(this).removeClass("lol")
                $(this).addClass("loilo")
                //activar evento desactivado removeClass(),addClass();
                $(this).off();

              }
            }      
     </script>
     </body>
   </html> 
<?php
  }
  else
    echo "No se ha accedido mediante un registro";
?>
