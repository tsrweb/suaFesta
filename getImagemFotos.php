<?php

	require "conecta.php";

	$idUsuario = $_GET["idUsuario"];
	$idFoto = $_GET['idFoto'];

	$result = $link->query("SELECT $idFoto FROM tb_usuario WHERE id_usuario = '$idUsuario' ");
	$row=$result->fetch_object(); 
	Header( "Content-type: image/gif"); 
	echo $row->$idFoto; 
	echo $result;
?>