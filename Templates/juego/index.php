<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <title>BattleShip</title>
  </head>
  <body>
      <table id="mesa">

      </table>
  </body>
</html>

<?php
$mapaEnemigo= array();
$mapaUsuario= array();
for ($alfa=0; $alfa <10 ; $alfa++) {
  echo "<script type='text/javascript'>$('#mesa').append($('<tr><td>Hola</td></tr>'))</script>";
  for ($beta=0; $beta <10 ; $beta++) {
    $mapaUsuario[$alfa][$beta]=1;
    $mapaEnemigo[$alfa][$beta]=1;
  }
}
?>



 <?php
 echo $mapaUsuario[3][3];

 ?>
