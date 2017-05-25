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
    <link rel="stylesheet" type="text/css" href="lib/sweetalert.css">
  <!--Etiquetas referetes al encabezado de la página-->
    <title>Juego</title>
  <!--Opciones de icono-->
    <link rel="shortcut icon" href="../Sources/icono2.png" type="image/png"/>
  <!--Scripts que se necesitaran-->
    <script type="text/javascript" src="../../Documents/js/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="../../Documents/js/materialize.js"></script>
    <script type="text/javascript" src="../../Documents/js/main.js"></script>
    <script src="lib/sweetalert.min.js"></script>
  </head>
  <body>
      <!--Encabezado-->
      <nav>
        <div class="nav-wrapper cyan darken-1">
            <a href="#!" class="brand-logo center">B A T T L E S H I P</a>
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
    var aviso=true;
    var orientacion;
    var medida=["pequeño","mediano","mediano 2","grande","extragrande"];
    //funcion para disparar a tu oponente 
    function dispara(donde,  x, y) {
      var id='#'+donde+y+x;
      if (donde =='m'){ //mio
        swal("no puedes dispararte a ti mismo");
      }
      else if (donde=='s'){//su
        //colorea la casilla en rojo 
        if(barcos>4){
         id='#'+donde+x+y;
          $(id).empty();
         $(id).append($('<img srcset="../../Resources/Images/pulsado.svg"/>'));
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
    function acomoda(donde, x, y,orientacion){
       var id='#'+donde+y+x;
       var eq=[2,3,3,4,5];
       var n=0;
       eq["extra"]=5;
      if (donde =='m'){ //mio
              //verifica que el barco no salga del tablero d ejuego 
              if(orientacion=="vertical" && y-eq[barcos]>=-1 || orientacion=="horizontal" && x-eq[barcos]>=-1){
                //verifica que las casillas no esten ocupadas por otro barco aun no funicona bien 
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
                console.log(n);
                if(n==0){
                  barco(id);
                  //aparecen los barcos
                  for(var i=1;i<eq[barcos];i++){
                      if(orientacion=="vertical"){
                        y=y-1;
                      }
                      else{
                        x=x-1;
                      }
                      barco('#'+donde+y+x);
                  }
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
              else
                dispara(id[0],id[2],id[1]);
            });
            columna =$('<td></td>');
            columna.append($('<img srcset="../../Resources/Images/normal.svg"/>'));
            columna.attr('id', 's'+alfa+beta);
            columna.attr('class', 'miMesa');
            $('#s'+alfa).append(columna);
            $('#s'+alfa+beta).on('click', function(e){
              id=this.id;
              dispara(id[0],id[1],id[2] );
            });
        }
    }
    </script>
</body>
</html>