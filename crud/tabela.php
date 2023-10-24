<?php
    include_once("conexao.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riuness</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    


<center><h1> Lista de usuários </h1></center>

<?php
        $sqlcli = "SELECT tb_cliente.tb_cliente_id, tb_cliente.tb_cliente_nome, tb_cliente.tb_cliente_nome_use, tb_cliente.tb_cliente_email, tb_cliente.tb_cliente_senha, tb_cliente.tb_cliente_telefone, tb_cliente.tb_cliente_id_ende, tb_endereco.tb_endereco_id, tb_endereco.tb_endereco_cep, tb_endereco.tb_endereco_end, tb_endereco.tb_endereco_num, tb_endereco.tb_endereco_comple, tb_endereco.tb_endereco_bairro, tb_endereco.tb_endereco_cidade, tb_endereco.tb_endereco_estado 
        FROM tb_cliente 
        INNER JOIN tb_endereco 
        ON tb_cliente_id_ende = tb_endereco_id;";
        $res = mysqli_query($conn, $sqlcli);
        $qtd = $res -> num_rows;

        if($qtd > 0){
            print "<table class='table table-striped table-hover table-bordered'>";
                print"<tr>";
                print"<th>#</th>";
                print"<th>Nome</th>";
                print"<th>User</th>";
                print"<th>E-mail</th>";
                print"<th>Tel</th>";
                print"<th>CEP</th>";
                print"<th>Logradouro</th>";
                print"<th>Número</th>";
                print"<th>Compl</th>";
                print"<th>Número</th>";
                print"<th>Bairro</th>";
                print"<th>UF</th>";
                print"<th>Ações</th>";

               while($row = $res -> fetch_object()){
                print"<tr>";
                print "<td>".$row -> tb_cliente_id."</td>";
                print "<td>".$row -> tb_cliente_nome."</td>";
                print "<td>".$row -> tb_cliente_nome_use."</td>";
                print "<td>".$row -> tb_cliente_email."</td>";
                print "<td>".$row -> tb_cliente_telefone."</td>";
                print "<td>".$row->  tb_endereco_cep."</td>";
                print "<td>".$row->  tb_endereco_end."</td>"; 
                print "<td>".$row -> tb_endereco_num."</td>";
                print "<td>".$row->  tb_endereco_comple."</td>";
                print "<td>".$row -> tb_endereco_bairro."</td>";
                print "<td>".$row -> tb_endereco_cidade."</td>";
                print "<td>".$row -> tb_endereco_estado."</td>";
                print "<td>

                <button  onclick=\"location.href='update.php?tb_cliente_id=".$row -> tb_cliente_id."';\" class='btn btn-success'> Editar </button> 
                   
                    <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='delete.php?tb_cliente_id=".$row -> tb_cliente_id."&tb_cliente_id_ende=".$row -> tb_cliente_id_ende."';}else{false;}\" class='btn btn-danger'> Deletar </button>
                </td>";
                print"</tr>";
              }
           print"</table>";
        }else{
            print"<p class='alert alert-danger'> Não encontrou resultados</p>";
        }
?>

</body>
</html>