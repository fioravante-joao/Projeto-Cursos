<?php
    require "rec/funcoesLogin.php";
    include "inc/head.php";
   
    if ($_REQUEST){
        // pegando os valores dos inputs
        $email = $_REQUEST["email"];
        $senha = $_REQUEST["senha"];
        //verificando se o usuario esta llogado através da função
        $estaLogado = logarusuario($email, $senha);

        if ($estaLogado == true){
            header("location: index.php");
        } else{
            $erro = "Usuário ou senha não encontrados!";
        }
    }
?>
    <div class="page-center">
        <h2>Login</h2>
        <!-- mostra a mensagem de erro caso a váriavel $erro esteja definida -->
        <?php if (isset($erro)) : ?>
            <div class="alert alert-danger">
                <span><?php echo $erro; ?></span>
            </div>
        <?php endif; ?>
        <form action="login.php" method="post" class="col-md-7">
            <div class="col-md-12">
                <label for="inputEmail">Email</label>
                <input type="email" name="email" class="form-control" id="inputEmail">
            </div>
            <div class="col-md-12">
                <label for="inputSenha">Senha</label>
                <input type="password" name="senha" class="form-control" id="inputSenha">
            </div>
            <div class="col-md-12">
                <br/>
                <button class="btn btn-primary" type="submit">Logar</button>
                <a href="cadastro.php" class="col-md-offset-9">Fazer Cadastro</a>
            </div>
        </form>
    </div>

<?php
    include "inc/footer.php";
?>