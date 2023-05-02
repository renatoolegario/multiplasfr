<?php

$pasta = "../banco_de_dados/";
if(empty($_POST['senha']) or empty($_POST['validacao_con'])){
    echo('Ops! algo deu errado, tente novamente.');
}else{
    
    
    $senha = $_POST['senha'];
    $recu_valido = false;
    if (strlen($senha) > 5) {
    
            //$validacao = $_POST['validacao'];
            $validacao_con = $_POST['validacao_con'];
            
            foreach (glob($pasta."*.json") as $arquivo) {
                // Lê o conteúdo do arquivo e converte para um objeto JSON
                $json = file_get_contents($arquivo);
                $dados = json_decode($json, true);
            
                // Verifica se o e-mail e a senha estão cadastrados neste arquivo
                if ($dados['recuperacao_senha'] == $validacao_con) {
                    $recu_valido = true;
                    $nome_arquivo = basename($arquivo);
                    $email_rec = $dados['email'];
                    break;
                }
            }
            
            
            
           if($recu_valido == true){
             
              // Lê o conteúdo do arquivo JSON em uma variável
                $json = file_get_contents($pasta.$nome_arquivo);
                
                // Converte o conteúdo do arquivo em um objeto PHP
                $objeto = json_decode($json, true);
                
                // Atualiza o valor da chave "sessao" do objeto
                $objeto['senha'] = $senha;
                
                // Converte o objeto PHP atualizado de volta para JSON
                $json_atualizado = json_encode($objeto);
                
                // Escreve o JSON atualizado no arquivo
                file_put_contents($pasta.$nome_arquivo, $json_atualizado);
                
             
             
               include("03-envio_confirmacao_recuperacao.php");
               
               echo("ok");
               
           }else{
               echo("Código de validação inválido.");
           }
           
        mysqli_close($sql);
    } else {
        echo "A senha deve ter pelo menos 5 caracteres.";
    }
    
   
    

}



?>