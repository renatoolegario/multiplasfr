<?php

include("../../../bibliotecas/00-Rotas/01-configuracoes_adm.php");


$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://www.asaas.com/api/v3/finance/balance");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Content-Type: application/json",
  "access_token: ".$api_key_asaas
));

$response = curl_exec($ch);
curl_close($ch);

if($response == ""){echo("Chave invalida.");}else{echo("Chave correta!");}


?>