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

        //adicionando um novo usuario para op array
        array_push($arrayUsuarios["usuarios"], $usuario);

        //transformando o array em json
        $usuariosJson = json_encode($arrayUsuarios);

        //colocando o json devolta para o arquivo
        $cadastrou = file_put_contents($nomeArquivo, $usuariosJson);

        //retorno true se o usuario foi cadastrado ou false se o usuário não foi cadastrado
        return $cadastrou;
    }

?>