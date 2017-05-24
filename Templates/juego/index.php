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
    function dispara(donde,  x, y) {
      var id='#'+donde+y+x;
      if (donde =='m'){ //mio
        $(id).empty();
         $(id).append($('<img srcset="../../Resources/Images/pulsado.svg"/>'));
      }
      else if (donde=='s'){//su
         id='#'+donde+x+y;
        $(id).empty();
         $(id).append($('<img srcset="../../Resources/Images/pulsado.svg"/>'));
      }
      els
      return 0;
    }
    for (var alfa = 0; alfa < 10; alfa++) {
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
              dispara(id[0],id[2],id[1] );
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