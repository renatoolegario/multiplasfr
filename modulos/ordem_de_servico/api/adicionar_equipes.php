<?php


if(empty($_POST['nome'])){}else{
    
    
    $nome = $_POST['nome'];
    
    $pasta_add = '../banco_de_dados/equipe.json';
    $json = file_get_contents($pasta_add);
    $dados = json_decode($json, true);
    
    
 $caracteres = "abcdefghijklmnopqrstuvwxyz0123456789";
    $chave = "";
    for ($i = 0; $i < 15; $i++) {
        $chave .= $caracteres[rand(0, strlen($caracteres) - 1)];
    }
   
    
    
    // verificar se já existe um array com a mesma chave
    $encontrado = false;
    foreach ($dados as $agente) {
        if ($agente['nome'] == ucfirst($nome)) {
            $encontrado = true;
            break;
        }
    }
    
    if ($encontrado) {
        echo "Esta equipe já esta cadastrada.";
    } else {
        // definir os valores para o novo array
        $novo_array = array('nome' =>  ucfirst($nome),'chave_departamento'=>'', 'chave' => $chave);
    
        // adicionar o novo array ao final do array existente
        $dados[] = $novo_array;
    
        // converter o array em JSON
        $json_novo = json_encode($dados);
    
        // escrever o conteúdo JSON de volta ao arquivo
        file_put_contents($pasta_add, $json_novo);
    
        echo("Equipe registrada com sucesso.");
    }
    
    
    
    
    
}


?>