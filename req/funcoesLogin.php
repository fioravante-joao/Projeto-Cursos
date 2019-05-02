<?php

    function cadastrarUsuario ($usuario){
        try {
            global $conexao;
            $query = $conexao->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)"); //Adciona usuarios

            $query->execute([
                ':nome' => $usuario['nome'],
                ':email' => $usuario['email'],
                ':senha' => $usuario['senha']
            ]);
    
            $usuario = $query->fetchAll(PDO::FETCH_ASSOC);
            
            $conexao = null;
    
        } catch ( PDOException $Exception ) {
            echo $Exception->getMessage();
        } 

        return true;
    }

        $nomeArquivo = "usuarios.json";

        function logarUsuario($email, $senha){
            global $nomeArquivo;
            $nomeLogado = "";
            //pegando o conteudondo arquivo usuarios.jjson
            $usuariosJson = file_get_contents($nomeArquivo);
            //transformando o json em array associativo
            $arrayUsuarios = json_decode($usuariosJson, true);
            //verificando de o usuario existe no arquivo usuarios.json
            foreach($arrayUsuarios["usuarios"] as $chave => $valor){
                //verificando se o e-mail digitado é igual ao e-mail do json
                if ($valor["email"] == $email && password_verify($senha, $valor["senha"])){
                $nomeLogado = $valor["nome"];
                break;
            }
        }
        return $nomeLogado;
    }
?>