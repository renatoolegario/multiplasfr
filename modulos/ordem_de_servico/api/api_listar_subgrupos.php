<?php

// pegar a chave do grupo e listar todos os subgrupos deste grupo, será incluso na respota do option 
if (!empty($_POST['chave'])) {
    
    $grupo = $_POST['chave'];
    
    $pasta = '../banco_de_dados/subgrupo_os.json';

    $json = file_get_contents($pasta);
    $dados_array = json_decode($json, true);
        
    $subgrupos = array(); // Array para armazenar os subgrupos
    foreach ($dados_array as $dados) {
        $nome = $dados['nome'];
        $chave = $dados['chave'];
        $chave_grupo = $dados['chave_grupo'];
                        
        if ($grupo == $chave_grupo) {
            $subgrupo = array(
                'chave' => $chave,
                'nome' => $nome
            );
            $subgrupos[] = $subgrupo; // Adiciona o subgrupo ao array de subgrupos
        }
    }

    $json_resultado = json_encode($subgrupos); // Converte o array de subgrupos para JSON
    echo $json_resultado;
}
?>
