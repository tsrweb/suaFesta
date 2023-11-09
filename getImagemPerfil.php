<?php

	require "conecta.php";

	$idFesta = $_GET["idFesta"];

	$result = $link->query("SELECT * FROM tb_festa WHERE id_festa = '$idFesta'");
	$row=$result->fetch_object(); 
	Header( "Content-type: image/gif"); 
	echo $row->img_perfil; 
?>