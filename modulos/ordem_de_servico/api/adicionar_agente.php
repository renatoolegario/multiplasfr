<?php

if (empty($_POST['id_us'])) {
    // sair se a chave API estiver em branco
    exit();
}

$key = $_POST['id_us'];

$autenticado = false; 
$nome_arquivo = "";
$pasta  = "../../../modulos/usuario/banco_de_dados/*.json";

 

//verifica se a api_key existe em algum arquivo e pega o nome do arquivo.
foreach (glob($pasta) as $arquivo) {
    // Lê o conteúdo do arquivo e converte para um objeto JSON
    $json = file_get_contents($arquivo);
    $dados = json_decode($json, true);

    // Verifica se o e-mail e a senha correspondem aos dados do arquivo
    if ($dados['chave'] == $key) {
        $autenticado = true;
        $nome_arquivo = basename($arquivo); // obtém o nome do arquivo sem o caminho
        break;
    }
}

if (!$autenticado) {
    // sair se a chave API não foi encontrada em nenhum arquivo
    exit();
}

$pasta_add_agente = '../banco_de_dados/agente.json';
$json = file_get_contents($pasta_add_agente);
$dados = json_decode($json, true);


// verificar se já existe um array com a mesma chave
$encontrado = false;
foreach ($dados as $agente) {
    if ($agente['chave_usuario'] == $key) {
        $encontrado = true;
        break;
    }
}

if ($encontrado) {
    echo "Este agente já esta cadastrado.";
} else {
    
    
    $caracteres = "abcdefghijklmnopqrstuvwxyz0123456789";
    $chave = "";
    for ($i = 0; $i < 15; $i++) {
        $chave .= $caracteres[rand(0, strlen($caracteres) - 1)];
    }
    
    // definir os valores para o novo array
    $novo_array = array('chave_usuario' => $key,'chave_equipe'=>'', 'chave' => $chave,'chave_cargo' => '');

    // adicionar o novo array ao final do array existente
    $dados[] = $novo_array;

    // converter o array em JSON
    $json_novo = json_encode($dados);

    // escrever o conteúdo JSON de volta ao arquivo
    file_put_contents($pasta_add_agente, $json_novo);

    echo "Usuário registrado como agente.";
}

?>
