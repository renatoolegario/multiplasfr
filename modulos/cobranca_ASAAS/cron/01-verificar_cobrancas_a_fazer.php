<?php
// Define a URL para enviar a solicitação

$nomePagina = $_SERVER['SCRIPT_FILENAME'];

$nomePagina = explode("domains/",$nomePagina);
$nomePagina = str_replace("public_html/","",$nomePagina[1]);

$url = 'https://www.'.str_replace(".php","_acao.php",$nomePagina);

// Cria um recurso de cURL
$ch = curl_init();

// Define as opções do cURL para enviar a solicitação POST
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('dados' => 'opcional')));

// Executa a solicitação cURL e retorna a resposta
$resposta = curl_exec($ch);

// Fecha o recurso de cURL
curl_close($ch);

// Exibe a resposta da solicitação
echo $resposta;


?>