<?php


if(!empty($_POST['nome'])){

include("../../../bibliotecas/00-Rotas/01-configuracoes_adm.php");

    $name  = $_POST['nome'];
    $email = $_POST['email'];
    $mobilePhone = $_POST['telefone'];
    $cnpj_cnpj_cliente = $_POST['cpfCnpj'];
    $acao = $_POST['acao'];
    $chave_usuario = $_POST['chave'];
    
    $postalCode = $_POST['postalCode'];
    $address    = $_POST['address'];
    $addressNumber = $_POST['addressNumber'];
    $complement     = $_POST['complement'];
    $province       = $_POST['cidade']; // cidade
    $externalReference = $_POST['estado'];
    $api_asaas         = $_POST['chave_api_asaas'];
    
    //aqui faz a leitura do arquivo json do usuário pela sua $chave_usuario, e verifica o stauts do usuário se é comum ou adm
    
    
    if($acao == 'novo_usuario' or $status_usuario == 3){
        // se for um novo usuário ou o status do usuário for 3 quer dizer que é para emitir a cobrança para a plataforma.
        $api_asaas = $api_key_asaas;
    }else{
        $api_asaas = $api_asaas; // pegar a api do cliente (fazer esse teste depois);
    }

    $data = array(
        'name' => $name,
        'email' => $email,
        'phone' => '',
        'mobilePhone' => $mobilePhone,
        'cpfCnpj' => $cnpj_cnpj_cliente,
        'postalCode' => $postalCode,
        'address' => $address,
        'addressNumber' => $addressNumber,
        'complement' => $complement,
        'province' => $province,
        'externalReference' => $externalReference,
        'notificationDisabled' => false,
        'additionalEmails' => '',
        'municipalInscription' => '',
        'stateInscription' => '',
        'observations' => '',
        'groupName' => $nome_identificacao_asaas
        );

    // Inicializa o CURL
    $ch = curl_init();

    // Configura as opções do CURL
    curl_setopt($ch, CURLOPT_URL, 'https://www.asaas.com/api/v3/customers');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'access_token: '.$api_asaas
    ));

    // Executa o CURL e armazena a resposta
    $response = curl_exec($ch);

    // Fecha a conexão CURL
    curl_close($ch);
    
    
    
} 

   
?>