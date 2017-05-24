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
    function acomoda(donde, x, y){
       var id='#'+donde+y+x;
      if (donde =='m'){ //mio
        if(barcos==0){
          $(id).empty();
          $(id).append($('<img srcset="../../Resources/Images/barco.svg"/>'));
          barcos+=1;
        }
        else{
          if($("#"+donde+(y-1)+x).html().indexOf("barco.svg")!=0){
             $(id).empty();
            $(id).append($('<img srcset="../../Resources/Images/barco.svg"/>'));
            barcos+=1;
          }
          else{
            if($("#"+donde+(y+1)+x).html().indexOf("barco.svg")!=0){
             $(id).empty();
            $(id).append($('<img srcset="../../Resources/Images/barco.svg"/>'));
            barcos+=1;
            }
            else{
              if($("#"+donde+y+(x+1)).html().indexOf("barco.svg")!=0){
                 $(id).empty();
                $(id).append($('<img srcset="../../Resources/Images/barco.svg"/>'));
                barcos+=1;
              }
              else{
                if($("#"+donde+y+(x-1)).html().indexOf("barco.svg")!=0){
                   $(id).empty();
                  $(id).append($('<img srcset="../../Resources/Images/barco.svg"/>'));
                  barcos+=1;
                }
              }
            }
          }
        } 
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
              if(barcos!=17){
                 acomoda(id[0],id[2],id[1]);
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