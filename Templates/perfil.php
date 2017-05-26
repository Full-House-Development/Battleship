<?php
  $idusu=(isset($_POST['id_usuario']))?$_POST['id_usuario']:"BolárdenasMelón";
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
       <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     </head>
     <body>
     <nav>
         <div class="nav-wrapper #e65100 orange darken-4">
           <a href="#" class="brand-logo center">Battle Ship</a>
           <ul id="nav-mobile" class="left hide-on-med-and-down"></ul>
         </div>
     </nav>
     <div id="todo">
      <div class="row">
        <div class="col s12 l10 offset-l1">
          <div class="card blue darken-1">
            <div class="card-content white-text">
<!-- Parte de arriba del card perfil donde aparece la foto y los botones de reportar y pedir ayuda -->
              <div class="row">
                  <div class="col  icon">
                    <i class="small material-icons">announcement</i>
                  </div>
                
                  <div class="col offset-l4">
                    <img class="circle responsive-img" src="../Resources/Images/73.jpg">
                  
                  </div>
                  <div class="col offset-l4 icon">
                    <i class="small material-icons sending">report_problem</i>
                  </div>
              </div>
              <div class="row">
<!-- Renglón donde aparece el nombre del usuario, así como su id del lado derecho -->
                <div class="col offset-l4">
                  <h4 id="mostrar">mostrado<h4>
                </div>
                <div class="usuder">
                <!-- Aqui se inserta el id_usuario -->
                  <p id="mostrarusu"><p>
                </div>
              </div>
            </div>
            <div class="card-action ">
              <div class="row">
<!-- Botones para mostrar los datos solicitados de nombre, correo y fecha de nacimiento -->
                <div class="col offset-l2 icon">
                  <i id="nacimiento" class="medium material-icons lol">today</i>
                </div>
                <div class="col offset-l2 icon">
                  <i id="nombre" class="medium material-icons lol">contacts</i>
                </div>
                <div class="col offset-l2 icon">
                  <i id="correo" class="medium material-icons lol">email</i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
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
// Ajax que saca la informacion del usuario:de nombre, correo y fecha de nacimiento
     var usuario='<?php echo $idusu; ?>';
        $.ajax(
          {
            url:"ajaxperfil.php",
            type:"POST",
            data:
            {
              nombre:usuario
            },
            success:function(nombre)
            {
              var divnom=nombre.split(",");
              var longnom=divnom.length;
              $("#mostrar").html(divnom[0]);
              // nombrem=divnom[0];
              // correom=divnom[1];
              // fecnam=divnom[2]; 
            }
          });
              // var nombrem=divnom[0];
              // var correom=divnom[1];
              // var fecnam=divnom[2]; 
// Ajax que saca toda las publicaciones de la base de datos y las inserta en div #publics
        var aj="id";
        $.ajax(
         {
             url:"ajaxperfil.php",
             type:"POST",
             data:
             {
               usu:aj
             },
             success:function(dato)
             {
               $("#publics").append(dato);
             }
         });
// Ajax que envía la informacion propia de un comentario para guardarla en la base de datos
        function sending(iden)
          {
            if(comentarionum==iden&&comentariocon!="")
            {
              alert("se envio el comentario del id= "+iden);
              $.ajax(
              {
                url:"ajaxperfil.php",
                type:"POST",
                data:
                {
                  id_publi:iden,
                  tex_com:comentariocon,
                  id_usu:usuario
                },
                success:function(quer)
                {
                  alert("se guardo el comentario");
                  console.log(quer);
                  
                }
              });
            }
          } 
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
                  
                  // alert(info);
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
                alert(info);
              }
            }
          var nombre="";
          var correo="";
          var nacimiento="";
          
          // var datos=["nacimiento","correo","nombre","nombre"];
          

           
     </script>
     </body>
   </html> 
<?php
  }
  else
    echo "No se ha accedido mediante un registro";
?>
