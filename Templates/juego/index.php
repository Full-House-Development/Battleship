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
    function dispara(donde,  x, y) {
      var id='#'+donde+y+x;
      if (donde =='m'){ //mio
        alert("no puedes dispararte a ti mismo");
      }
      else if (donde=='s'){//su
         id='#'+donde+x+y;
        $(id).empty();
         $(id).append($('<img srcset="../../Resources/Images/pulsado.svg"/>'));
      }
      return 0;
    }
    //esta funcion de acomoda aun no sirve,  si pone los circulos verdes pero aun no checa que esten juntos
    function barco(id){
       $(id).empty();
        $(id).append($('<img srcset="../../Resources/Images/barco.svg"/>'));
    }
    function acomoda(donde, x, y,tamanio,orientacion){
      console.log(donde);
       var id='#'+donde+y+x;
       var eq=new Array();
       eq["pequeño"]=2;
       eq["mediano"]=3;
       eq["grande"]=4;
       eq["extra"]=5;
      if (donde =='m'){ //mio
            alert(x+" "+y+" "+tamanio+" "+orientacion);
            barco(id);
            for(var i=1;i<eq[tamanio];i++){
                if(orientacion=="vertical"){
                  y=y-1;
                }
                else{
                  x=x-1;
                }
                console.log('#'+donde+y+x);
                barco('#'+donde+y+x);
            }
            barcos++;
       }
      else if (donde=='s'){//su
        alert("Antes de tirar tienes que acomodar tus barcos");
      }
      return 0;
    }
    for (var alfa = 0; alfa < 10; alfa++){
        if(alfa==0){
          alert("acomoda tus barcos");
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
              console.log(barcos)
              if(barcos<5){
                  tamanio=prompt("Tamaño del barco(pequeño,mediano,grande,extra)");
                  orientacion=prompt("Horizontal o vertical");
                  acomoda(id[0],id[2],id[1],tamanio,orientacion);
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