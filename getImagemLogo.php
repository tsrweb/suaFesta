<?php

	require "conecta.php";

	$idUsuario = $_GET["idUsuario"];

	$result = $link->query("SELECT * FROM tb_usuario WHERE id_usuario = '$idUsuario'");
	$row=$result->fetch_object(); 
	Header( "Content-type: image/gif"); 
	echo $row->img_logo; 
?>