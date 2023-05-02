<?php

if (!empty($_POST['chave'])) {
    
    $chave_agente = $_POST['chave'];
    $chave_equipe = $_POST['chave_b'];
    
    $pasta_add_agente = '../banco_de_dados/agente.json';
    $json = file_get_contents($pasta_add_agente);

    $array = json_decode($json, true);

    // Percorre o array
    $i = 0;
    $array_m = 0;
    
    $cont = 0;
    $tamanho_array = count($array) -1;
    
    for ($i = 0; $i <= $tamanho_array; $i++) {
        if($array[$i]['chave'] == $chave_agente){$array_m = $i;}
    }
   

    $array[$array_m]['chave_equipe'] = $chave_equipe;

    // Codifica o array de volta para JSON
    $json_atualizado = json_encode($array);

    // Escreve o conteúdo atualizado de volta para o arquivo JSON
    file_put_contents($pasta_add_agente, $json_atualizado);

    echo $json_atualizado;
}


?>