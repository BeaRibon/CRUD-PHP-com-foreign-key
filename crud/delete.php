<?php

include_once("conexao.php");


$sql = "DELETE FROM tb_cliente WHERE tb_cliente_id =".$_REQUEST["tb_cliente_id"];
$res = mysqli_query($conn, $sql);

$sqlend = "DELETE FROM tb_endereco WHERE tb_endereco_id =".$_REQUEST["tb_cliente_id_ende"];
$resend = mysqli_query($conn, $sqlend);

if($res == true && $resend == true ){
    print"<script>location.href='tabela.php';</script>";
}else{
    print"<script>alert('Não foi possível excluir');</script>";
}

?>