<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <script type="text/javascript" src="../../Documents/js/jquery-3.2.1.js"></script>

    <title>BattleShip</title>
  </head>
  <body>
      <table id="suMesa" style="position: absolute; top: 8px; padding-left: 40em;">

      </table>
            <table id="miMesa" style="position: absolute; top: 8px; padding-left: 2em;">

      </table>
    <script type="text/javascript">
    var puntaje=100;
    var barcos=0;
    var aviso=true;
    var medida=["pequeño","mediano","mediano 2","grande","extragrande"];
    //funcion para disparar a tu oponente 
    function dispara(donde,  x, y) {
      var id='#'+donde+y+x;
      if (donde =='m'){ //mio
        alert("no puedes dispararte a ti mismo");
      }
      else if (donde=='s'){//su
        if(barcos>4){
         id='#'+donde+x+y;
          $(id).empty();
         $(id).append($('<img srcset="../../Resources/Images/pulsado.svg"/>'));
       }
       else
           alert("Antes de disparar termina de acomodar tus barcos");
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
          //verifica que el usuario escriba vertical y horizantal 
            if(orientacion=="vertical" || orientacion=="horizontal"){
              //verifica que el barco no salga del tablero d ejuego 
              if(orientacion=="vertical" && y-eq[barcos]>=-1 || orientacion=="horizontal" && x-eq[barcos]>=-1){
                //verifica que las casillas no esten ocupadas por otro barco aun no funicona bien 
                for(var m=0;m<eq[barcos];m++){
                    if($("#"+donde+(y-1)+x).html().indexOf("barco.svg")!=-1 && orientacion=="vertical")
                        n++;
                    if($("#"+donde+y+(x-1)).html().indexOf("barco.svg")!=-1 && orientacion=="horizontal")
                        n++;
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
                  alert("Algunas casillas ya estan ocupadas por otro barco");
              }
              else
                alert("El barco no cabe ahí");
            }
            else 
              alert("datos invalidos");
       }
      else if (donde=='s'){//su
        alert("Antes de tirar tienes que acomodar tus barcos");
      }
      return 0;
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
                if(aviso==true){
                    alert("El tamaño del barco a acomodar es:"+medida[barcos]);
                    orientacion=prompt("horizontal o vertical");
                    acomoda(id[0],id[2],id[1],orientacion);
                }
                else{
                   aviso=confirm("Tienes que aceptar, para jugar, te divertirás, acepta por favor. El orden para acomodar los barcos es pequeño,mediano,mediano,grande,extra)");
                }
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