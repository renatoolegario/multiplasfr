<?php

if(empty($_POST['email'])){
    echo('E-mail em branco.');
    }else{
        
    $pasta = "../banco_de_dados/";
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $nome_arquivo = '';
    
   $login_valido = false;

    foreach (glob($pasta."*.json") as $arquivo) {
        // Lê o conteúdo do arquivo e converte para um objeto JSON
        $json = file_get_contents($arquivo);
        $dados = json_decode($json, true);
    
        // Verifica se o e-mail e a senha estão cadastrados neste arquivo
        if ($dados['email'] == $email && $dados['senha'] == $senha) {
            $login_valido = true;
            $nome_arquivo = basename($arquivo);
            break;
        }
    }
    
   
   
    if($login_valido == true){
                
                
            function gerar_codigo_aleatorio($tamanho = 5) {
                $codigo = "";
                $caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
            
                for ($i = 0; $i < $tamanho; $i++) {
                    $codigo .= $caracteres[rand(0, strlen($caracteres) - 1)];
                }
            
                    return $codigo;
            }
        
        $rand = gerar_codigo_aleatorio();
       
       
       
       
       // Lê o conteúdo do arquivo JSON em uma variável
        $json = file_get_contents($pasta.$nome_arquivo);
        
        // Converte o conteúdo do arquivo em um objeto PHP
        $objeto = json_decode($json, true);
        
        // Atualiza o valor da chave "sessao" do objeto
        $objeto['sessao'] = $rand;
        
        // Converte o objeto PHP atualizado de volta para JSON
        $json_atualizado = json_encode($objeto);
        
        // Escreve o JSON atualizado no arquivo
        file_put_contents($pasta.$nome_arquivo, $json_atualizado);

        echo("Ok-".$rand);
        
        
        
    }else{
        echo('Usuário ou senha errada.');
        
    }
    
    mysqli_close($sql);
    
}


?>