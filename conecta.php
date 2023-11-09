<?php
$host       = 'localhost';
$user       = 'root';
$password   = '';
$db         = 'bd_suafesta';

$link = new Mysqli($host, $user, $password, $db);
if($link->connect_error)
	die('Erro de conexão');
?>