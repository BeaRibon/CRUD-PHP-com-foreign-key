<?php

include_once("conexao.php");

$id = filter_input(INPUT_POST, 'id');
$nome = filter_input(INPUT_POST, 'nome');
$user = filter_input(INPUT_POST, 'user');
$email = filter_input(INPUT_POST, 'email');
$tele = filter_input(INPUT_POST, 'tel');
$idend - filter_input(INPUT_POST, 'idend');
$cep = filter_input(INPUT_POST, 'cep');
$end = filter_input(INPUT_POST, 'end');
$num= filter_input(INPUT_POST, 'num');
$compl = filter_input(INPUT_POST, 'compl');
$bairro = filter_input(INPUT_POST, 'bairro');
$cid = filter_input(INPUT_POST, 'cid');
$uf = filter_input(INPUT_POST, 'uf');



$sql = "UPDATE tb_cliente set 
            tb_cliente_nome='{$nome}',
            tb_cliente_nome_use='{$user}',
            tb_cliente_email ='{$email}',
            tb_cliente_telefone= '{$tele}'
            WHERE
            tb_cliente_id =".$_REQUEST['id'];

$res = mysqli_query($conn, $sql);


$sqlend = "UPDATE tb_endereco set
            tb_endereco_cep = '{$cep}',
            tb_endereco_end = '{$end}',
            tb_endereco_num = '{$num}',
            tb_endereco_comple = '{$compl}',
            tb_endereco_bairro = '{$bairro}',
            tb_endereco_cidade = '{$cid}',
            tb_endereco_estado = '{$uf}'
            WHERE
            tb_endereco_id=".$_REQUEST['idend'];

$resend = mysqli_query($conn, $sqlend);



if($res == true && $resend == true ){
    print"<script>location.href='tabela.php';</script>";
}else{
    print"<script>alert('Não foi possível editar');</script>";
}
?>