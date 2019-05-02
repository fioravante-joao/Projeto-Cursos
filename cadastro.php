<?php
    require "req/database.php";
    require "req/funcoesLogin.php";
    include "inc/head.php";

    if ($_REQUEST){
        $nome = $_REQUEST["nome"];  /* ou   $_post="nome"];*/
        $email = $_REQUEST["email"];
        $senha = $_REQUEST["senha"];
        $confirmarSenha = $_REQUEST["ConfirmarSenha"];
        // usando criptografia md5.
        // $md5 = md5($senha);
        // echo $senha . "<br>";
        // echo $md5;

        // ou
        // $hash = password_hash($senha, PASSWORD_DEFAULT);
        // echo $hash;
        // exit;
        //verifica se a senha é igual ao confirmar senha
        if ($senha == $confirmarSenha){

            // criptografando a senha
            $senhaCrip = password_hash($senha, PASSWORD_DEFAULT);
            //criando um novo usuario
            $novoUsuario = [
                "nome" => $nome,
                "email" => $email,
                "senha" => $senhaCrip,    //a virgula após cada elemento é opcional apenas no ultimo.
            
            ];
            //cadastro meu usuario no json
            $cadastrou = cadastrarUsuario($novoUsuario);
        } else{
            $erro = "senhasincompatíveis";
        }
    }

?>
    <div class="page-center">
        <h2>Cadastre-se</h2>
        <!-- verifica se a variavel cadastrou foi definida -->
        <?php if (isset($cadastrou) && $cadastrou) : ?>
            <divclass="alert alert-sucess" role="alert">
                <span>Usuário cadastrado com sucesso.</span>
            </div>
        <?php elseif (isset($erro)) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $erro; ?>
            </div>
        <?php endif;?>
        <form action="cadastro.php" method="post" class="col-md-7">
            <div class="col-md-12">
                <label for="inputNome">Nome</label>
                <input type="text" name="nome" class="form-control" id="inputNome">
            </div>
            <div class="col-md-12">
                <label for="inputEmail">E-Mail</label>
                <input type="email" name="email" class="form-control" id="inputEmail">
            </div>
            <div class="col-md-12">
                <label for="inputSenha">Senha</label>
                <input type="password" name="senha" class="form-control" id="inputSenha">
            </div>
            <div class="col-md-12">
                <label for="inputConfirmarSenha">Confirmar Senha</label>
                <input type="password" name="ConfirmarSenha" class="form-control" id="inputConfirmarSenha">
            </div>
            <div class="col-md-12">
                <br/>
                <button class="btn btn-primary" type="submit">Cadastrar</button>
                <a href="login.php" class="col-md-offset-9">Fazer Login</a>
            </div>
        </form>
    </div>
<?php
    include "inc/footer.php";
?>