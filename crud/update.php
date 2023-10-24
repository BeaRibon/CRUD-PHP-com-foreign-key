<?php
    include_once("conexao.php");
    $sql = "SELECT tb_cliente.tb_cliente_id, tb_cliente.tb_cliente_nome, tb_cliente.tb_cliente_nome_use, tb_cliente.tb_cliente_email, tb_cliente.tb_cliente_telefone, tb_cliente.tb_cliente_id_ende, tb_endereco.tb_endereco_cep, tb_endereco.tb_endereco_end, tb_endereco.tb_endereco_num, tb_endereco.tb_endereco_comple, tb_endereco.tb_endereco_bairro, tb_endereco.tb_endereco_cidade, tb_endereco.tb_endereco_estado 
    FROM tb_cliente 
    INNER JOIN tb_endereco 
    ON tb_cliente_id_ende = tb_endereco_id WHERE tb_cliente_id=".$_REQUEST["tb_cliente_id"];
    $res = mysqli_query($conn, $sql);
    $row = $res -> fetch_object();

?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riuness</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
 <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <section class="boxLogin container">
        <div class="content">
              
              <form class="login" method="post" name="login" action="att.php" >
                <h1><i class="icon icon-key-1"></i> Editar  </h1>
                <div class="padding">
                <input type="text" class="campos" placeholder="ID" name="id"  value="<?php print $row->tb_cliente_id; ?>">
                  <label>
                    <input type="text" class="campos" placeholder="Nome" name="nome"  value="<?php print $row->tb_cliente_nome; ?>">
                    <input type="text" class="campos" placeholder="Nome de usuário"  name="user"  value="<?php print $row->tb_cliente_nome_use; ?>" >
                  </label>
                  <label>
                  <input type="text" class="campos" placeholder="E-mail"  name="email" value="<?php print $row->tb_cliente_email; ?>" >
                  <input type="text" class="campos" placeholder="Telefone"  name="tel"  value="<?php print $row->tb_cliente_telefone; ?>" >
                  <label>
                  <input type="text" class="campos" placeholder="Id endereço"  name="idend"  id="idend" value="<?php print $row->tb_cliente_id_ende; ?>">
                  <input type="text" class="campos" placeholder="CEP"  name="cep"  id="cep" value="<?php print $row->tb_endereco_cep; ?>"> 
                  </label>
                  <label> 
                  <input type="text" class="campos" placeholder="Endereço"  name="end" id="logradouro" value="<?php print $row->tb_endereco_end; ?>">
                  <input type="text" class="campos" placeholder="Número"  name="num"  value="<?php print $row->tb_endereco_num; ?>">
                  <label>
                  <input type="text" class="campos" placeholder="Complemento"  name="compl"  value="<?php print $row->tb_endereco_comple; ?>">
                  <input type="text" class="campos" placeholder="Bairro"  name="bairro" id="bairro" value="<?php print $row->tb_endereco_bairro; ?>" >
                  </label>
                  <label> 
                  <input type="text" class="campos" placeholder="Cidade"  name="cid" id="cidade" value="<?php print $row->tb_endereco_cidade; ?>" >
                  <input type="text" class="campos" placeholder="UF"  name="uf" id="uf"  value="<?php print $row->tb_endereco_estado; ?>">
                  </label>
                  <center>
                  <input type="submit" class="btn fade_8S" name="login" value="Atualizar" >
                 </center>
                </div>
                <div class="linksForm">
                  <a href="#" class="fade_4S" title="Sobre nós"><i class="icon icon-forward-1"></i>Sobre nós</a> 
                  <a href="#" class="fade_4S" title="Login"><i class="icon icon-user-add"></i>Login</a>
                </div>
              </form>
         </div>
         </section>

         <script type="text/javascript">
        $("#cep").focusout(function(){
           
            $.ajax({
                url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/',
                dataType: 'json',
                success: function(resposta){
                    $("#logradouro").val(resposta.logradouro);
                    $("#complemento").val(resposta.complemento);
                    $("#bairro").val(resposta.bairro);
                    $("#cidade").val(resposta.localidade);
                    $("#uf").val(resposta.uf);
                   
                }
            });
        });
    </script>
 
</body>
</html>