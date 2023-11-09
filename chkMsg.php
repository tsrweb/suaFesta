<?php

// identifica as mensagens atribuidas ao usuário logado e a quantidade delas

$verifyMsg = $link->query("SELECT * FROM tb_usuario WHERE nm_usuario = '$logado' ");

    while($verMsg = $verifyMsg->fetch_array()){
        $tpUserMsg = $verMsg['tp_user'];
        $nmEmpresaMsg = $verMsg['nm_empresa'];
    };

if ($tpUserChat = "fornecedor") {
    
    $conMsg = $link->query("SELECT DISTINCT id_chat FROM tb_msg WHERE te_msgDe = '$nmEmpresaMsg' || te_msgPara = '$nmEmpresaMsg' || te_msgDe = '$logado' || te_msgPara = '$logado' ");

}else{

$conMsg = $link->query("SELECT DISTINCT id_chat FROM tb_msg WHERE te_msgDe = '$logado' || te_msgPara = '$logado' ");

};

    $quant = $conMsg->num_rows; /* Verifica a quantidade de mensagens */

?>