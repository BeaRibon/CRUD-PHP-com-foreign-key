
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
              
              <form class="login" method="post" name="login" action="cad.php" >
                <h1><i class="icon icon-key-1"></i> Cadastro</h1>
                <div class="padding">
                  <label>
                    <input type="text" class="campos" placeholder="Nome" name="nome" required>
                    <input type="text" class="campos" placeholder="Nome de usuário"  name="user"  required >
                  </label>
                  <label>
                    <input type="text" class="campos" placeholder="E-mail"  name="email" required >
                    <input type="text" class="campos" placeholder="Telefone"  name="tel"  required>
                  </label>
                  <label>
                    <input type="password" class="campos" placeholder="Password"  name="senha"  required>
                  </label>
                  <input type="text" class="campos" placeholder="CEP"  name="cep"  id="cep" required > 
                  <label> 
                  <input type="text" class="campos" placeholder="Endereço"  name="end" id="logradouro" required>
                  <input type="text" class="campos" placeholder="Número"  name="num" required>
                  <label>
                  <input type="text" class="campos" placeholder="Complemento"  name="compl" >
                  <input type="text" class="campos" placeholder="Bairro"  name="bairro" id="bairro" required >
                  </label>
                  <label> 
                  <input type="text" class="campos" placeholder="Cidade"  name="cid" id="cidade"  required>
                  <input type="text" class="campos" placeholder="UF"  name="uf" id="uf" required>
                  </label>
                  <center>
                  <input type="submit" class="btn fade_8S" name="login" value="Entrar" >
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