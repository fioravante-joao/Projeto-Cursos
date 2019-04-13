<?php
    require "rec/funcoesLogin.php";
    include "inc/head.php";

    if ($_REQUEST){
        $nome = $_REQUEST["nome"];  /* ou   $_post="nome"];*/
        $email = $_REQUEST["email"];
        $senha = $_REQUEST["senha"];
        $confirmarSenha = $_REQUEST["ConfirmarSenha"];

        //verifica se a senha é igual ao confirmar senha
        if ($senha == $confirmarSenha){

            //criando um novo usuario
            $novoUsuario = [
                "nome" => $nome,
                "email" => $email,
                "senha" => $senha,    //a virgula após cada elemento é opcional apenas no ultimo.
            
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
        <form action="cadastro.php" method="post" class="col-md-7">
            <div class="col-md-12">
                <label for="inputNome">Nome</label>
                <input type-"text" name="nome" class="form-control" id="inputNome">
            </div>
            <div class="col-md-12">
                <label for="inputEmail">E-Mail</label>
                <input type-"email" name="email" class="form-control" id="inputEmail">
            </div>
            <div class="col-md-12">
                <label for="inputSenha">Senha</label>
                <input type-"password" name="senha" class="form-control" id="inputSenha">
            </div>
            <div class="col-md-12">
                <label for="inputConfirmarSenha">Confirmar Senha</label>
                <input type-"password" name="ConfirmarSenha" class="form-control" id="inputConfirmarSenha">
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