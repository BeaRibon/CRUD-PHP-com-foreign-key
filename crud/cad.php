<?php
 
 include_once("conexao.php");


$nome = filter_input(INPUT_POST, 'nome');
$user = filter_input(INPUT_POST, 'user');
$email = filter_input(INPUT_POST, 'email');
$tele = filter_input(INPUT_POST, 'tel');
$senha = md5(filter_input(INPUT_POST, 'senha'));
$cep = filter_input(INPUT_POST, 'cep');
$end = filter_input(INPUT_POST, 'end');
$num= filter_input(INPUT_POST, 'num');
$compl = filter_input(INPUT_POST, 'compl');
$bairro = filter_input(INPUT_POST, 'bairro');
$cid = filter_input(INPUT_POST, 'cid');
$uf = filter_input(INPUT_POST, 'uf');


$tbendere = "Insert into tb_endereco(tb_endereco_cep, tb_endereco_end, tb_endereco_num, tb_endereco_comple, tb_endereco_bairro, tb_endereco_cidade,tb_endereco_estado)
 VALUES ('$cep', '$end', '$num', '$compl', '$bairro', '$cid', '$uf')";
 $resultadoend = mysqli_query($conn, $tbendere);
 $cha = "SELECT MAX(tb_endereco_id) FROM tb_endereco";
 $conecha = mysqli_query($conn, $cha);
 $resultado_id_endereco = mysqli_fetch_assoc($conecha);
 $int_id_endereco = (int)$resultado_id_endereco["MAX(tb_endereco_id)"];
 $tbcliente = "Insert into tb_cliente(tb_cliente_nome, tb_cliente_nome_use, tb_cliente_email, tb_cliente_senha, tb_cliente_telefone, tb_cliente_id_ende)
 VALUES ('$nome', '$user', '$email', '$senha', '$tele', '$int_id_endereco')";
 $resultadocli = mysqli_query($conn, $tbcliente);


 if(mysqli_insert_id($conn)){
    header("Location: tabela.php");
 }else{
    header("Location: index.php");
 }

?>