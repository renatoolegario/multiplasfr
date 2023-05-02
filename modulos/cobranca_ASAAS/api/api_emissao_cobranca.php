<?php

include("../../../bibliotecas/00-Rotas/01-configuracoes_adm.php");


if(empty($_POST['cpf_cnpj_usuario'])){}else{
    
    $cpf_cnpj_usuario = $_POST['cpf_cnpj_usuario'];
    $valor            = $_POST['valor'];
    $data_vencimento  = $_POST['data_vencimento'];
    $chave_api_asaas  = $_POST['chave_api_asaas'];
    $descricao        = $_POST['descricao'];
    
    if($chave_api_asaas == ""){
        $chave_api_asaas = $api_key_asaas; // pega a chave do adm
    }
    
    // identificar a chave do cnpj_cpf enviado, e ler na pasta "emitidas" o arquivo com essa chave, em seguida faz a inclusão de uma nova cobrança, com seu respectivo status.
    //historico modulos/cobranca_ASAAS/banco_de_dados/emitidas/
    
    $pasta_user = '../../usuario/banco_de_dados/';
    
    
    foreach (glob($pasta_user . "*.json") as $arquivo) {
        
        // Lê o conteúdo do arquivo e converte para um objeto JSON
        $json = file_get_contents($arquivo);
        $dados = json_decode($json, true);
        // Verifica se o CPF está cadastrado neste arquivo
        if ($dados['cnpj_cpf'] == $cpf_cnpj_usuario) {
            $cpf_cadastrado = $dados['cnpj_cpf'];
            $chave_usuario  = $dados['chave'];
            $telefone       = $dados['telefone'];
            break;
        }
    
            
        
    }
    
    
    //consulta id_user_asaas
    // ENVIAR AS VARIAVEIS ACAO, CNPJ_CPF 
    //modulos/cobranca_ASAAS/api/api_consulta_cliente.php
    
    $url = $link_site."/modulos/cobranca_ASAAS/api/api_consulta_cliente.php";

        // Define os dados a serem enviados no corpo da requisição
        $dados = array(
            'acao' => 'consulta_simples',
            'cnpj_cpf' => $cpf_cadastrado
        );
        
        // Inicializa o cURL
        $ch = curl_init();
        
        // Define as opções do cURL
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dados);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        // Executa a requisição e obtém a resposta
        $id_user_asaas = curl_exec($ch);
        
        // Encerra o cURL
        curl_close($ch);
    
    
    // Cria uma nova emissão
  
  
   $cpfCnpj = $cpfCnpj;
   $time = time();
   
   $vencimento = $data_vencimento; // 8 dias
   
   $vencimento = date("Y-m-d",$vencimento);


$customer_id = $id_user_asaas; // ID do cliente no ASAAS
$due_date = $vencimento; // Data de vencimento da cobrança
$value = $valor; // Valor da cobrança
$payment_method = "undefined"; // Método de pagamento (undefined, boleto, cartao_credito, cartao_debito)


$data = array(
    "customer" => $customer_id,
    "dueDate" => $due_date,
    "value" => $value,
    "billingType" => $payment_method,
    "description" => $descricao,
    
);

$url = "https://www.asaas.com/api/v3/payments";

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

curl_setopt($ch, CURLOPT_POST, TRUE);

curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Content-Type: application/json",
  "access_token: ".$chave_api_asaas
));

$response = curl_exec($ch);
curl_close($ch);


$obj = json_decode($response);

$object = $obj->object;
$id = $obj->id;
$dateCreated = $obj->dateCreated;
$customer = $obj->customer;
$value = $obj->value;
$netValue = $obj->netValue;
$originalValue = $obj->originalValue;
$interestValue = $obj->interestValue;
$description = $obj->description;
$billingType = $obj->billingType;
$pixTransaction = $obj->pixTransaction;
$status = $obj->status;
$dueDate = strtotime($obj->dueDate);
$originalDueDate = $obj->originalDueDate;
$paymentDate = $obj->paymentDate;
$clientPaymentDate = $obj->clientPaymentDate;
$installmentNumber = $obj->installmentNumber;
$invoiceUrl = $obj->invoiceUrl;
$invoiceNumber = $obj->invoiceNumber;
$externalReference = $obj->externalReference;
$deleted = $obj->deleted;
$anticipated = $obj->anticipated;
$anticipable = $obj->anticipable;
$creditDate = $obj->creditDate;
$estimatedCreditDate = $obj->estimatedCreditDate;
$transactionReceiptUrl = $obj->transactionReceiptUrl;
$nossoNumero = $obj->nossoNumero;
$bankSlipUrl = $obj->bankSlipUrl;
$lastInvoiceViewedDate = $obj->lastInvoiceViewedDate;
$lastBankSlipViewedDate = $obj->lastBankSlipViewedDate;
$discount = $obj->discount;
$fine = $obj->fine;
$interest = $obj->interest;
$postalService = $obj->postalService;
$refunds = $obj->refunds;




//FIM
    
    
    function generateRandomKey($qtd) {
          $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
          $key = '';
          for ($i = 0; $i < $qtd; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $key .= chr(ord($characters[$index]));
          }
          return $key;
        }
    
    $id_arquivo = generateRandomKey(5).time().generateRandomKey(5); 
        
    // Dados a serem salvos no arquivo JSON
        $dados = array(
            'cpf' => $cpf_cadastrado,
            'chave_usuario' => $chave_usuario,
            'telefone' => $telefone,
            'descricao' => $descricao,
            'id_user_asaas' => $id_user_asaas,
            'id_transacao_asaas' => $id,
            'data_emissao' => $dateCreated,
            'data_vencimento' => $dueDate,
            'status_emissao' => $status,
            'valor_emissao' => $valor,
            'chave_cobranca_interno' => $id_arquivo,
            'log' => $obj
            );
        
        // Converte o array em uma string JSON
        $json = json_encode($dados);
        
        // Salva a string JSON em um arquivo chamado "dados.json"
        $pasta = '../banco_de_dados/emitidas/';
        $arquivo = $pasta.$chave_usuario.'.json';
        
        // Carrega o conteúdo atual do arquivo JSON, ou cria um array vazio se o arquivo não existir
        if (file_exists($arquivo)) {
            $json_atual = json_decode(file_get_contents($arquivo), true);
        } else {
            $json_atual = array();
        }
        
        // Adiciona os novos dados ao final do array
        $json_atual[] = $dados;
        
        // Codifica o array atualizado em uma string JSON
        $json_atualizado = json_encode($json_atual);
        
        // Escreve o conteúdo atualizado de volta para o arquivo JSON
        file_put_contents($arquivo, $json_atualizado);

        echo('realizado');
    
}

?>