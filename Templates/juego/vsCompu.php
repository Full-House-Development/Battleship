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
    var puntaje=100;
    var barcos=0;
    var valor
    var compu=[];
    var tuya=[];
    var orientacion;
    var tiro=1;
    var contador=1;
    var contadorCompu=0;
    var medida=["pequeño","mediano","mediano 2","grande","extragrande"];
    $("#ptj").html("Puntaje:"+puntaje);
    //funcion para disparar a tu oponente 
    function matris(vart){
      for (var i =0; i<10; i++) {
        vart[i]=[];
      }
    }
    function disparaYo(donde,  x, y) {
      var id='#'+donde+x+y;
      if (donde=='s'){//su
        //colorea la casilla en rojo 
        if(barcos>4){
          if(compu[x][y]==2){
             cot=$(id).html().indexOf("byd.svg");
              if(cot!=-1){
                swal("Ya tiraste ahí, tira de nuevo");
                puntaje=puntaje-10;
              }
              else{
                tiro=1;
                $(id).empty();
                $(id).append($('<img srcset="../../Resources/Images/byd.svg"/>'));
                puntaje=puntaje-10;
              }
          }
          else{
            $(id).empty();
            $(id).append($('<img srcset="../../Resources/Images/pulsado.svg"/>'));
             tiro=2;
          }
       }  
      }
      return 0;
    }
    function disparaCompu(donde,  x, y){
      var id='#'+donde+y+x;
      if (donde =='m'){ //mio
          if(compu[y][x]==2){
                $(id).empty();
                $(id).append($('<img srcset="../../Resources/Images/byd.svg"/>'));
          }
          else{
            $(id).empty();
            $(id).append($('<img srcset="../../Resources/Images/pulsado.svg"/>'));
             
          }
        tiro=1;
      }
      console.log(id);
      console.log(compu[y][x]);
    }
    //pone los círculos verdes de los barcos
    function barco(id){
          $(id).empty();
          $(id).append($('<img srcset="../../Resources/Images/barco.svg"/>'));
    }
    function acomoda(donde, x, y,orientacion){
       var id='#'+donde+y+x;
       var eq=[2,3,3,4,5];
       var n=0;
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
                  barco(id,1);
                  tuya[y][x]=2;
                  //aparecen los barcos
                  for(var i=1;i<eq[barcos];i++){
                      if(orientacion=="vertical"){
                        y=y-1;
                      }
                      else{
                        x=x-1;
                      }
                      barco(('#'+donde+y+x),1);
                      tuya[y][x]=2;
                  }
                  //La computadora acomoda su barco
                  do{
                    var aleatorioUno = Math.round(Math.random()*9);//vertical
                    var aleatorioDos = Math.round(Math.random()*9);//horizontal
                    orientacion=Math.round(Math.random())==0?'vertical':'horizontal';
                  }
                  while(orientacion=="vertical" && aleatorioUno-eq[barcos]<=-1 || orientacion=="horizontal" && aleatorioDos-eq[barcos]<=-1);
                   for(var i=1;i<=eq[barcos];i++){
                      if(orientacion=="vertical"){
                        aleatorioUno=aleatorioUno-1;
                      }
                      else{
                        aleatorioDos=aleatorioDos-1;
                      }
                      barco(('#s'+aleatorioUno+aleatorioDos));
                      compu[aleatorioDos][aleatorioUno]=2;
                  }
                  contadorCompu++;
                  barcos++;
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
    matris(tuya);
    matris(compu);
    //se generan las casillas azules
    for (var alfa = 0; alfa < 10; alfa++){
        if(alfa==0)
          swal("Para empezar","acomoda tus barcos","success");
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
            tuya[alfa][beta]=1;
            columna.attr('class', 'miMesa');
            $('#m'+alfa).append(columna);
            $('#m'+alfa+beta).on('click', function(e){
              id=this.id;
              swal("Te toca tirar");
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
                console.log(tuya);
                console.log(compu);
                swal("Ya acomodaste tus barcos");
              }
            });
            columna =$('<td></td>');
            columna.append($('<img srcset="../../Resources/Images/normal.svg"/>'));
            columna.attr('id', 's'+alfa+beta);
            columna.attr('class', 'miMesa');
            compu[alfa][beta]=1;
            $('#s'+alfa).append(columna);
            $('#s'+alfa+beta).on('click', function(e){
              id=this.id;
              if(tiro==1){
                disparaYo(id[0],id[1],id[2]);
                console.log(id);
              }
              else{
                swal("Es turno de la computadora");
                var n1=Math.round(Math.random()*9);
                var n2=Math.round(Math.random()*9);
                 disparaCompu("m",n1,n2);
              }
            });
        }
    }
    </script>
</body>
</html>