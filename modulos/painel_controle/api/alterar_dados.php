<?php

if(empty($_POST['dados'])){echo("eit");}else{
        
        $acao = $_POST['acao'];
        $nome = $_POST['dados'];
       
        if($acao == 'nome_sistema'){$acao = 'nome_site';}
        if($acao == 'link_sistema'){$acao = 'link_site';}
        if($acao == 'host_email'){$acao = 'host_email';}
        if($acao == 'remetente_email'){$acao = 'remetente_do_email';}
        if($acao == 'email_envio'){$acao = 'username';}
        if($acao == 'senha_email'){$acao = 'password';}
        if($acao == 'porta_host'){$acao = 'porta_smtp';}
        if($acao == 'api_asaas'){$acao = 'api_key_asaas';}
        if($acao == 'valor_base'){$acao = 'valor_base';$nome = str_replace(",", ".", $nome);}
        if($acao == 'tempo_gratis'){$acao = 'tempo_gratis';$nome = intval($nome);}
        
        
        
            $arquivo = '../../../bibliotecas/00-Rotas/01-conf.json';
            // Carrega o conteúdo do arquivo em uma variável
            $json = file_get_contents($arquivo);
            // Converte o JSON em um array PHP
            $array_dados = json_decode($json, true);
            $array_dados[$acao] = $nome;
                $json = json_encode($array_dados);
                 // Salva o JSON de volta no arquivo
                file_put_contents($arquivo, $json);
     
     
       
}

?>