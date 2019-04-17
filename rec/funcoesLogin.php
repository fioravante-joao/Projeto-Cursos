<?php
    //definindo o nome do arquivo json
    $nomeArquivo = "usuarios.json";

    function cadastrarUsuario ($usuario){

        //pegando a variável para dentro da funcao
        global $nomeArquivo;

        //pegando o conteudo do arquivo usuarios.json
        $usuariosJson = file_get_contents($nomeArquivo);

        //transforma o json em array associativo
        $arrayUsuarios = json_decode($usuariosJson, true);

        //adicionando um novo usuario para o array
        array_push($arrayUsuarios["usuarios"], $usuario);

        //transformando o array em json
        $usuariosJson = json_encode($arrayUsuarios);

        //colocando o json devolta para o arquivo
        $cadastrou = file_put_contents($nomeArquivo, $usuariosJson);

        //retorno true se o usuario foi cadastrado ou false se o usuário não foi cadastrado
        return $cadastrou;
    }

        $nomeArquivo = "usuarios.json";

        function logarUsuario($email, $senha){
            global $nomeArquivo;

            //pegando o conteudondo arquivo usuarios.jjson
            $usuariosJson = file_get_contents($nomeArquivo);
            //transformando o json em array associativo
            $arrayUsuarios = json_decode($usuariosJson, true);
            //verificando de o usuario existe no arquivo usuarios.json
            foreach($arrayUsuarios["usuarios"] as $chave => $valor){
                //verificando se o e-mail digitado é igual ao e-mail do json
                if ($valor["email"] == $email && password_verify($senha, $valor["senha"])){
                $logado = true;
                break;
            }
        }
        return $logado;
    }
?>