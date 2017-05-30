<?php
	function conection()
	{
		$cone=mysqli_connect("132.248.96.53","battleship","sugardadies","final");
		mysqli_set_charset($cone,"utf8");
		return $cone;
	}
	
?>