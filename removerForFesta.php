<?php

session_start();
$logado = $_SESSION['nome'];

$idFesta = $_GET['idFesta'];
$idFornecedor = $_GET['idFor'];


require "conecta.php";

$con = $link->query("DELETE FROM tb_festasServicos WHERE id_usuario = $idFornecedor AND id_festa = $idFesta");


$link->close();

echo '<script type="text/javascript">alert("Fornecedor removido com Sucesso!");window.location=("suaFesta.php?idFesta='.$idFesta.'");</script>';

?>