<?php

$idFesta = $_GET['idFesta'];
$idFornecedor = $_GET['idFor'];

require "conecta.php";

$con = $link->query("INSERT INTO tb_festasServicos (id_usuario,id_festa) VALUES ('$idFornecedor','$idFesta')");

$link->close();

echo '<script type="text/javascript">alert("Fornecedor adicionado com Sucesso!");window.location=("suaFesta.php?idFesta='.$idFesta.'");</script>';

?>