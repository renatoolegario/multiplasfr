<?php


include("../../../bibliotecas/00-Rotas/01-configuracoes_adm.php");

// Caminho para a pasta com os arquivos JSON
$caminho_pasta = '../banco_de_dados/nao_emitidas/';

// Loop para ler cada arquivo na pasta
foreach (glob($caminho_pasta . '*.json') as $arquivo) {

    // Ler o conteúdo do arquivo JSON
    $conteudo_arquivo = file_get_contents($arquivo);

    // Transformar o conteúdo em um array associativo
    $dados = json_decode($conteudo_arquivo, true);

    // Loop para verificar cada conjunto de dados no arquivo
    foreach ($dados as $conjunto_dados) {

        // Verificar se a data_cobranca é menor que o timestamp atual
        if ($conjunto_dados['data_cobranca'] < time()) {

            
            // Enviar sinal para a API X
            $url_api = $link_site.'/modulos/cobranca_ASAAS/api/api_emissao_cobranca.php';
            $dados_envio = array('cpf_cnpj_usuario' => $conjunto_dados['cpf_cnpj_usuario'], 'valor' => $conjunto_dados['valor'],'data_vencimento' => $conjunto_dados['data_vencimento'],'descricao'=> $conjunto_dados['descricao']);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url_api);
            curl_setopt($ch, CURLOPT_POST, 2);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($dados_envio));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $resposta_api = curl_exec($ch);
            curl_close($ch);

            if($resposta_api == 'realizado'){

                unlink($arquivo);
            
            }
            // Imprimir a resposta da API para fins de depuração
            echo ($resposta_api."-".date("d/m/Y H:i", time()));
        }
    }
}

?>
