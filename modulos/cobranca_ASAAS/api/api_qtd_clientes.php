
<?php
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://www.asaas.com/api/v3/customers?groupName=".$nome_plataforma_tratada);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "access_token: ".$token_asaas
));

$response = curl_exec($ch);

curl_close($ch);

$data = json_decode($response);
$totalCount = $data->totalCount;

echo $totalCount; // Saída: 60

?>