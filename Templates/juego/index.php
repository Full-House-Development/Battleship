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
    //!--------esta variable debe ser cambiada
    var quien ="retador";//creo que seria mejor con un post o sessions
    var id_juego= 2;
    var puntaje=100;
    var barcos=0;
    var tablero,valor;
    var orientacion;
    var contador=1;
    var tiro=1;
    var medida=["pequeño","mediano","mediano 2","grande","extragrande"];
    var tuya= [];
    var tabla=[]
      for (var i =0; i<10; i++) {
        tabla[i]=[];
      }
    //funcion para disparar a tu oponente
    function dispara(donde,  x, y) {
      console.log(id +"dispara");
      var id='#'+donde+y+x;
      if (donde =='m'){ //mio
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
          }
          else{
            $(id).empty();
            $(id).append($('<img srcset="../../Resources/Images/pulsado.svg"/>'));
         $.ajax({
                      url:"../../Programs/tiro.php",
                      type:"post",
                      data:{
                        id_juego: id_juego,
                        tiro:id,
                        contador:contador
                      },
                      success:function(resul){  }
                    });
       }
      }
       else
          swal("Antes de disparar termina de acomodar tus barcos");

      }
      return 0;
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
                $.ajax({
                          url:"../../Programs/meDisparan.php",
                          type:"post",
                          data:{
                            id_juego: id_juego
                          },
                          success:function(resul){
                                if(resul[0]%2!=0&&quien=="retador"){
                                dispara("m",resul[4],resul[3]);
                                contador=resul[0];
                                contador++;
                              }
                              else if(resul[0]%2==0&&quien=="retado"){
                                      dispara("m",resul[4],resul[3]);
                                    if(resul[0]==null)
                                      contador=2;
                                    else
                                      contador=resul[0];
                                      contador++;
                                }
                            console.log(resul);

                            }
                        });
          //      $("#ptj").html("Puntaje:"+puntaje--);

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
                  tabla[y][x];
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

      return 0;
    }

    //se generan las casillas azules
    for (var alfa = 0; alfa < 10; alfa++){
        if(alfa==0)
          swal("Para empezar","acomoda tus barcos","success");
        renglon =$('<tr></tr>');
        renglon.attr('id', 'm'+alfa);
        $('#miMesa').append(renglon);
        tabla[alfa][beta]=1;
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
                if(tiro==1){
                  dispara(id[0],id[1],id[2]);
                }
                else{
                  swal("Es turno de la computadora");
                }
            });
        }
    }

    revisaDisparo();
    
    $.ajax({
      url:"../../Programs/sacaCoordenadas.php",
      type:"post",
      data:{
        id_juego: id_juego,
        unoODos: "dos"
      },
      success:function(resul){
        tuya=resul.split("d");
        tuya=tuya[2];
        tuya=tuya.split(":");
        for (var alfa = 0; alfa < 10; alfa++) {
          tuya[alfa]=tuya[alfa].split(",");
        }
        console.log(tuya);
        }
    });
    </script>
</body>
</html>