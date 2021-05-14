<?php
	function conn(){
		return mysqli_connect('localhost','root','','basedatoscombi1');
	}
	$link = conn();
?>