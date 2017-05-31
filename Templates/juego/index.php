<?php
session_start();
$id_retador= (isset($_SESSION['id']))?$_SESSION['id']: "raul";
$id_retado=(isset($_GET["retado"]))? $_GET["retado"]: "ximena";
?>

<!DOCTYPE html>
<html>
  <head>
   <!--Etiquetas del tipo de alfabeto-->
    <meta charset="utf-8"/>

    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <!--Links de materialize y el css/less-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
    <link type="text/css" rel="stylesheet" href="../../Documents/css/materialize.css"  media="screen,projection"/>
    <link href="../../Documents/css/main.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link rel="stylesheet" type="text/css" href="../../Documents/lib/sweetalert.css">
  <!--Etiquetas referetes al encabezado de la página-->
    <title>Juego</title>
  <!--Opciones de icono-->
    <link rel="shortcut icon" href="../Sources/icono2.png" type="image/png"/>
  <!--Scripts que se necesitaran-->
    <script type="text/javascript" src="../../Documents/js/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="../../Documents/js/materialize.js"></script>
    <script type="text/javascript" src="../../Documents/js/main.js"></script>
    <script src="../../Documents/lib/sweetalert.min.js"></script>
  </head>
  <body>
      <!--Encabezado-->
      <nav>
        <div class="nav-wrapper cyan darken-1">
            <a href="#!" class="brand-logo center">B A T T L E S H I P</a>
            <p id="ptj">Puntaje:</p>
        </div>
      </nav>
      <!--SIndica que tablero es d equien-->
      <div class="row">
          <div class="col l6">
            <div class="card N/A transparent center-align">
              <span class="card-title">Contrincante</span>
             </div>
          </div>
          <div class="col l6">
            <div class="card N/A transparent center-align">
              <span class="card-title">Tu juego</span>

             </div>
          </div>
      </div>
      <!--crea las tablas-->
      <div class="row">
          <section>
             <div class="col l6">
                <table id="suMesa" style=" border-spacing:  0px 0px;"></table>
             </div>
             <div class="col l6">
                  <table id="miMesa"></table>
             </div>
          </section>
        </div>
      </div>
    <script type="text/javascript">
    //revisa si hay una partida creada
    var id_juego;
    var contador=1;
    var puntaje1=100;
    var puntaje2=100;
    var soloUnaVez=0;
    if ("<?php echo $_GET["retado"];  ?>"=="estonoesunaid") {
      $.ajax({
                url:"../../Programs/revisaPartida.php",
                type:"post",
                data:{
                  usuario: "<?php echo $id_retador; ?>",
                },
                success:function(resul){
                      id_juego=resul;
                  }
              });

    }
    //si la hay sigue o la crea depende de si reto a alguien o no
    if(id_juego!=""){
      var quien;
      $.ajax({
                url:"../../Programs/creaPartida.php",
                type:"post",
                data:{
                  usuario: "<?php echo $id_retador; ?>",
                  usuario_2: "<?php echo $_GET["retado"];  ?>"
                },
                success:function(resul){
                      id_juego=resul;
                      console.log(resul)
                  }
              });
       //timeout para darle tiempo al ajax
      window.setTimeout(function() {
        $.ajax({
                  url:"../../Programs/revisaQuien.php",
                  type:"post",
                  data:{
                    id_juego: id_juego,
                    retador: "<?php echo $id_retador; ?>"
                  },
                  success:function(resul){
                        quien=resul;
                    }
                });
        window.setTimeout(function() {
       //creo que seria mejor con un post o sessions
            var barcos=0;
            var tablero,valor;
            var orientacion;
            var tiro=1;
            var medida=["pequeño","mediano","mediano 2","grande","extragrande"];
            var tuya= "";
            var morados=0;
            var tabla=[];
              for (var i =0; i<10; i++) {
                tabla[i]=[];
              }
            //funcion para disparar a tu oponente
            function dispara(donde,  x, y) {
              var id='#'+donde+y+x;
                    console.log("id en funcion dispara es: "+id);
              if(morados>=17){
                  $.ajax({
                              url:"../../Programs/tiro.php",
                              type:"post",
                              data:{
                                id_juego: id_juego,
                                tiro:id,
                                contador:'*'
                              },
                              success:function(resul){  }
                            });
              }
              else if (donde =='m'){ //mio
                        id='#'+donde+y+x;
                        if(tabla[y][x]==2){
                              $(id).empty();
                              $(id).append($('<img srcset="../../Resources/Images/byd.svg"/>'));
                        }
                        else{
                          $(id).empty();
                          $(id).append($('<img srcset="../../Resources/Images/pulsado.svg"/>'));
                        }
                    }
                    else if (donde=='s'&&((contador%2!=0&&quien=="retado")||(contador%2==0&&quien=="retador"))){//su
                      //colorea la casilla en rojo
                      if(barcos>4){
                        id='#'+donde+x+y;
                        if(tuya[x][y]==2){
                              $(id).empty();
                              $(id).append($('<img srcset="../../Resources/Images/byd.svg"/>'));
                              morados++;
                        }
                        else{
                          $(id).empty();
                          $(id).append($('<img srcset="../../Resources/Images/pulsado.svg"/>'));
                          puntaje1--;
                 $.ajax({
                              url:"../../Programs/tiro.php",
                              type:"post",
                              data:{
                                id_juego: id_juego,
                                tiro:id,
                                contador:contador
                              },
                              success:function(resul){
                                contador=parseInt(resul);
                              }
                            });
               }
             }
               else
                  swal("Antes de disparar termina de acomodar tus barcos");
              }
              return 0;
            }
        //sacaCoordenadas
          function sacaCoor() {
              if(quien=="retador")
                $.ajax({
                  url:"../../Programs/sacaCoordenadas.php",
                  type:"post",
                  data:{
                    id_juego: id_juego,
                    unoODos: "dos"
                  },
                  success:function(resul){
                    console.log("resul de sacaCoor: "+resul);
                    tuya=resul.split("d");
                    tuya=tuya[2];
                    tuya=tuya.split(":");
                    for (var alfa = 0; alfa < 10; alfa++) {
                      tuya[alfa]=tuya[alfa].split(",");
                    }
                    }
                });
              else
              $.ajax({
                url:"../../Programs/sacaCoordenadas.php",
                type:"post",
                data:{
                  id_juego: id_juego,
                  unoODos: "uno"
                },
                success:function(resul){
                  tuya=resul.split("d");
                  tuya=tuya[2];
                  tuya=tuya.split(":");
                  for (var alfa = 0; alfa < 10; alfa++) {
                    tuya[alfa]=tuya[alfa].split(",");
                  }
                  }
              });
              return tuya;
          }
            //pone los círculos verdes de los barcos
            function barco(id){
               $(id).empty();
                $(id).append($('<img srcset="../../Resources/Images/barco.svg"/>'));
            }
             function mapa (){
              for(var barrery=0;barrery<10;barrery++){
                            for(var barrerx=0;barrerx<10;barrerx++){
                                valor=$("#m"+barrery+barrerx).html().indexOf("barco.svg");
                                if(valor!=-1){
                                  if(barrerx<9)
                                    tablero=tablero+"2,";
                                  else
                                    tablero=tablero+"2";
                                }
                                else{
                                   if(barrerx<9)
                                    tablero=tablero+"1,";
                                  else
                                    tablero=tablero+"1";
                                }
                            }
                            tablero=tablero+":";
                          }
                          barcos++;
            }
            function revisaDisparo(){
                 window.setInterval(function () {
                      $("#ptj").html("Puntaje:"+puntaje1);
                        $.ajax({
                                  url:"../../Programs/meDisparan.php",
                                  type:"post",
                                  data:{
                                    id_juego: id_juego
                                  },
                                  success:function(resul){
                                    if(resul[0]=='*' && morados<17){
                                      alert("has perdido")
                                      location.href='../perfil.php';
                                    }
                                    if(parseInt(resul[0])!=contador&&(typeof resul!=="undefined")){
                                        if(parseInt(resul[0])%2==0)
                                          puntaje1--;
                                        else
                                          puntaje2--;
                                    }
                                    if(resul[0]%2==0&&quien=="retador"){
                                      dispara("m",resul[4],resul[3]);
                                        console.log("antes: "+contador);
                                        contador=parseInt(resul[0]);
                                        console.log("despues: "+contador);
                                      }
                                      else if(resul[0]%2!=0&&quien=="retado"){
                                        dispara("m",resul[4],resul[3]);
                                            if(resul[0]==null)
                                              contador=2;
                                            else
                                              contador=parseInt(resul[0]);
                                        }

                                    console.log("resul de revisaDisparo: "+resul);
                                    }
                                });

                      }, 1000);
                  }
            function acomoda(donde, x, y,orientacion){
               var id='#'+donde+y+x;
               var eq=[2,3,3,4,5];
               var n=0;
               eq["extra"]=5;
              if (donde =='m'){ //mio
                      //verifica que el barco no salga del tablero de juego
                      if(orientacion=="vertical" && y-eq[barcos]>=-1 || orientacion=="horizontal" && x-eq[barcos]>=-1){
                        //verifica que las casillas no esten ocupadas por otro barco
                        for(var m=0;m<eq[barcos];m++){
                            if(orientacion=="vertical"){
                                cot=$("#"+donde+(y-m)+x).html().indexOf("barco.svg");
                                if(cot!=-1)
                                    n++;
                            }
                             if(orientacion=="horizontal"){
                                cot=$("#"+donde+y+(x-m)).html().indexOf("barco.svg");
                                if(cot!=-1)
                                    n++;
                            }
                        }
                        if(n==0){
                          barco(id);
                          tabla[y][x]=2;
                          //aparecen los barcos
                          for(var i=1;i<eq[barcos];i++){
                              if(orientacion=="vertical"){
                                y=y-1;
                              }
                              else{
                                x=x-1;
                              }
                              barco('#'+donde+y+x);
                              tabla[y][x]=2;
                          }
                          barcos++;
                          if(barcos==5){
                            mapa();
                            if(quien=="retador")
                              $.ajax({
                                url:"../../Programs/meteCoordenadas.php",
                                type:"post",
                                data:{
                                  coordenadas:tablero,
                                  id_juego: id_juego,
                                  unoODos: "uno"
                                },
                                success:function(resul){
                                  console.log(resul +"soy uno");
                                  }
                              });
                            else
                              $.ajax({
                                url:"../../Programs/meteCoordenadas.php",
                                type:"post",
                                data:{
                                  coordenadas:tablero,
                                  id_juego: id_juego,
                                  unoODos: "dos"
                                },
                                success:function(resul){
                                  console.log(resul+ "soy dos");
                                  }
                              });
                          }
                        }
                        else
                          swal("Algunas casillas ya estan ocupadas por otro barco");
                      }
                      else
                        swal("El barco no cabe ahí");
               }
              else if (donde=='s'){//su
                swal("Antes de tirar tienes que acomodar tus barcos");
              }
              return ;
            }
            //se generan las casillas azules
            for (var alfa = 0; alfa < 10; alfa++){
                if(alfa==0){
                  alert("acomoda tus barcos");
                  aviso=confirm("El orden para acomodar los barcos es pequeño,mediano,mediano,grande,extra)");
                }
                renglon =$('<tr></tr>');
                renglon.attr('id', 'm'+alfa);
                $('#miMesa').append(renglon);
                renglon =$('<tr></tr>');
                renglon.attr('id', 's'+alfa);
                $('#suMesa').append(renglon);
                for (var beta = 0; beta < 10; beta++) {
                    columna =$('<td></td>');
                    columna.append($('<img srcset="../../Resources/Images/normal.svg"/>'));
                    columna.attr('id', 'm'+alfa+beta);
                    columna.attr('class', 'miMesa');
                    $('#m'+alfa).append(columna);
                    $('#m'+alfa+beta).on('click', function(e){
                      id=this.id;
                      if(barcos<5){
                        //parte donde se acomodan los barcos
                          swal("El tamaño del barco a acomodar es:"+medida[barcos]);
                          swal({
                            title: "¿Cómo lo quieres?",
                            text: "horizontal o vertical",
                            type: "success",
                            showCancelButton: true,
                            confirmButtonText: "horizontal",
                            cancelButtonText: "vertical",
                            closeOnConfirm: false,
                            closeOnCancel: false
                          },
                          function(isConfirm) {
                            if (isConfirm) {
                               swal("Horizontal", "success");
                               orientacion="horizontal";
                                acomoda(id[0],id[2],id[1],orientacion);
                            } else {
                              swal("Vertical", "success");
                               orientacion="vertical";
                              acomoda(id[0],id[2],id[1],orientacion);
                            }
                          });
                      }
                      else{
                        //hace la accion de disparar
                        alert("ya acomodaste tus basrcos");
                      }
                    });
                    columna =$('<td></td>');
                    columna.append($('<img srcset="../../Resources/Images/normal.svg"/>'));
                    columna.attr('id', 's'+alfa+beta);
                    columna.attr('class', 'miMesa');
                    $('#s'+alfa).append(columna);
                    $('#s'+alfa+beta).on('click', function(e){
                      id=this.id;
                        if(morados!=17){
                          dispara(id[0],id[1],id[2]);
                        }
                        else{
                              if(quien=="retador")
                                  $.ajax({
                                    url:"../../Programs/autoPublicacion.php",
                                    type:"post",
                                    data:{
                                      id_juego:id_juego,
                                      puntaje1:puntaje1,
                                      puntaje2:puntaje2,
                                      unoODos: "uno"
                                    },
                                    success:function(resul){
                                      console.log("publicacion hecha");
                                      console.log(resul);
                                      }
                                  });
                                else
                                  $.ajax({
                                    url:"../../Programs/autoPublicacion.php",
                                    type:"post",
                                    data:{
                                      id_juego:id_juego,
                                      puntaje1:puntaje1,
                                      puntaje2:puntaje2,
                                      unoODos: "dos"
                                    },
                                    success:function(resul){
                                      console.log("publicacion hecha");
                                      console.log(resul);
                                      }
                                  });
                                alert("has ganado")
                                location.href='../perfil.php';
                        }

                    });
                }
            }
            var sacala =setInterval(function(){
                console.log("tuya: "+   sacaCoor());
                if((typeof tuya!== "undefined")&&tuya!="")
                  clearInterval(sacala);
              }, 3000);

              revisaDisparo();
        }, 1500);
      },1500);
    }
    </script>
</body>
</html>
