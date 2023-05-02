<?php

$arquivo = '../../../bibliotecas/00-Rotas/01-conf.json';
if (file_exists($arquivo)) {} else {
    $arquivo = 'bibliotecas/00-Rotas/01-conf.json';
}
$json_data = file_get_contents($arquivo);

$config = json_decode($json_data, true);

$nome_site = $config['nome_site'];
$link_site = $config['link_site'];
$id_bd_administrador = $config['id_bd_administrador'];
$host_email = $config['host_email'];
$remetente_do_email = $config['remetente_do_email'];
$username = $config['username'];
$password = $config['password'];
$porta_smtp = $config['porta_smtp'];
$api_key_asaas = $config['api_key_asaas'];
$nome_identificacao_asaas = $config['nome_identificacao_asaas'];
$produto_base = $config['produto_base'];
$valor_base = $config['valor_base'];
$tempo_gratis = $config['tempo_gratis'];





?>