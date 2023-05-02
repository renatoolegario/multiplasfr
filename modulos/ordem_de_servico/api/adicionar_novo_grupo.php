<?php


if(empty($_POST['nome_grupo'])){}else{
    
    
    $nome = $_POST['nome_grupo'];
    
    $pasta_add = '../banco_de_dados/grupo_os.json';
    $json = file_get_contents($pasta_add);
    $dados = json_decode($json, true);
   
    $caracteres = "abcdefghijklmnopqrstuvwxyz0123456789";
    $chave = "";
    for ($i = 0; $i < 15; $i++) {
        $chave .= $caracteres[rand(0, strlen($caracteres) - 1)];
    }
   
    
        // definir os valores para o novo array
        $novo_array = array('nome' =>  ucfirst($nome),'email' =>'', 'chave_departamento' => $grupo_departamento, 'chave' => $chave);
    
        // adicionar o novo array ao final do array existente
        $dados[] = $novo_array;
    
        // converter o array em JSON
        $json_novo = json_encode($dados);
    
        // escrever o conteúdo JSON de volta ao arquivo
        file_put_contents($pasta_add, $json_novo);
    
        echo("Grupo registrado com sucesso.");
    
    
    
    
    
    
}


?>




