<?php

if(!empty($_POST['acao'])){
    

        if($_POST['acao'] == 'alt_dados'){
            
            $chave_api_asaas = $_POST['chave_api_asaas'];
            $chave_user      = $_POST['chave_user'];
            
              $pasta  = "../../../modulos/usuario/banco_de_dados/*.json";
   
            $arquivo_alt = '';
            foreach (glob($pasta) as $arquivo) {
                // Lê o conteúdo do arquivo e converte para um objeto JSON
                $json = file_get_contents($arquivo);
                $dados = json_decode($json, true);
          
                // Verifica se o e-mail e a senha correspondem aos dados do arquivo
                if ($dados['chave'] == $chave_user) {
                    $arquivo_alt = $arquivo;
                    break;
                }
            }
        
            // abre o arquivo e altera a key
        
        $json = file_get_contents($arquivo);
        
         $array = json_decode($json, true);
         
         $array['chave_api_asaas'] = $chave_api_asaas;

        // Codifica o array de volta para JSON
        $json_atualizado = json_encode($array);
    
        // Escreve o conteúdo atualizado de volta para o arquivo JSON
        file_put_contents($arquivo, $json_atualizado);
            
            
        }
        
}

?>