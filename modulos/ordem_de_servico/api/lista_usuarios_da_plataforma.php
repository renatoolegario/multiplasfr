<?php


$pasta = 'modulos/usuario/banco_de_dados/*.json';

$option_usuarios = '<option value=""> - </option>';

foreach (glob($pasta) as $arquivo) {
    // Lê o conteúdo do arquivo e converte para um objeto JSON
    $json = file_get_contents($arquivo);
    $dados = json_decode($json, true);
    
    $id = $dados["chave"];
    $nome = $dados["nome"];
    $email= $dados["email"];
    $nome_arquivo = basename($arquivo); // obtém o nome do arquivo sem o caminho
    
      $option_usuarios = $option_usuarios.'<option value="'.$id.'">'.$nome.' - '.$email.'</option>';
}

?>