<?php

if (!empty($_POST['chave'])) {
    
    $chave = $_POST['chave'];
    $autorizacao = $_POST['chave_b'];
    
    $pasta = '../banco_de_dados/cargo.json';
    $json = file_get_contents($pasta);

    $array = json_decode($json, true);

    // Percorre o array
    $i = 0;
    $array_m = 0;
    
    $cont = 0;
    $tamanho_array = count($array) -1;
    
    for ($i = 0; $i <= $tamanho_array; $i++) {
        if($array[$i]['chave'] == $chave){$array_m = $i;}
    }
   

    $array[$array_m]['id_autorizacao'] = $autorizacao;

    // Codifica o array de volta para JSON
    $json_atualizado = json_encode($array);

    // Escreve o conteúdo atualizado de volta para o arquivo JSON
    file_put_contents($pasta, $json_atualizado);

    echo $json_atualizado;
}


?>