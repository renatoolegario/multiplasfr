<?php

$pasta = "../banco_de_dados/";
if(empty($_POST['email'])){}else{


    $email_rec = $_POST['email'];
    $login_valido = false;
        function gerar_codigo_aleatorio($tamanho = 15) {
        $codigo = "";
        $caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    
        for ($i = 0; $i < $tamanho; $i++) {
            $codigo .= $caracteres[rand(0, strlen($caracteres) - 1)];
        }
    
        return $codigo;
        }
    
    $rand = gerar_codigo_aleatorio();
    
    //encontrar o e-mail e fazer o update
    
    foreach (glob($pasta."*.json") as $arquivo) {
        // Lê o conteúdo do arquivo e converte para um objeto JSON
        $json = file_get_contents($arquivo);
        $dados = json_decode($json, true);
    
        // Verifica se o e-mail e a senha estão cadastrados neste arquivo
        if ($dados['email'] == $email_rec) {
            $login_valido = true;
            $nome_arquivo = basename($arquivo);
            break;
        }
    }
    
    
    if($login_valido == true){
       
       // Lê o conteúdo do arquivo JSON em uma variável
        $json = file_get_contents($pasta.$nome_arquivo);
        
        // Converte o conteúdo do arquivo em um objeto PHP
        $objeto = json_decode($json, true);
        
        // Atualiza o valor da chave "sessao" do objeto
        $objeto['recuperacao_senha'] = $rand;
        
        // Converte o objeto PHP atualizado de volta para JSON
        $json_atualizado = json_encode($objeto);
        
        // Escreve o JSON atualizado no arquivo
        file_put_contents($pasta.$nome_arquivo, $json_atualizado);

        
        include("03-envio_email_recuperacao.php");
        
        echo('ok');
    }

}



?>