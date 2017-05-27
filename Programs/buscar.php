<?php
echo "<!DOCTYPE html>
	<HTML>
		<HEAD>
			<meta http-equiv='Content-type' content='text/html'; charset='UTF-8'>
		    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
			<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
		</HEAD>
		<BODY>
		<form method='POST' action='../Templates/otroperfil.php'>
			<input type='text' id='perfext' name='perfext'/>
			<input type='submit' id='rel'/>
		</form>
		</BODY>
		<SCRIPT>
			$('#enviar').click(function (){
				var bus=$('#buscar').val();
				 $.ajax(
				   {
					   url:'../Programs/conbuscar.php',
					   type:'POST',
					   data:
					   {
						 busca:bus
					   },
					   success:function(busqueda)
					   {
						 alert(busqueda);
						 if(busqueda!='no se encontraron resultados')
						 {
							$('#perfext').attr('value',busqueda);
							$( '#rel').trigger('click');
						 }
					   }    
				   });
			});
		</SCRIPT>
	</HTML>";
?>
