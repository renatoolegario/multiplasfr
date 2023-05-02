<?php

// primeira coisa a se verificar, de onde esta vindo a solicitação ?
// se a solicitação for com o perfil administrativo a chave de autenticação e emissão vai ser pelo Multiplas.
// se a solicitação for com o perfil de usuário comum vai ser utilizado a chave de autenticação dele

if(empty($_POST['acao'])){}else{
    
    $acao = $_POST['acao'];
    $cnpj_cnpj_cliente = $_POST['cnpj_cpf'];
    $chave_usuario = $_POST['chave'];
    $chave_api_asaas = $_POST['chave_api_asaas'];
    
    //aqui faz a leitura do arquivo json do usuário pela sua $chave_usuario, e verifica o stauts do usuário se é comum ou adm
    
    
    if($acao == 'novo_usuario' or $status_usuario == 3 or $acao == 'consulta_simples'){
        // se for um novo usuário ou o status do usuário for 3 quer dizer que é para emitir a cobrança para a plataforma.
        include("../../../bibliotecas/00-Rotas/01-configuracoes_adm.php");
        $api_asaas = $api_key_asaas;
    }else{
        $api_asaas = $chave_api_asaas; // pegar a api do cliente (fazer esse teste depois);
    }
    
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL, "https://www.asaas.com/api/v3/customers?cpfCnpj=".$cnpj_cnpj_cliente);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          "Content-Type: application/json",
          "access_token: ".$api_asaas
        ));
        
        $response = curl_exec($ch);
        curl_close($ch);
        $objeto = json_decode($response);
        
        $id = $objeto->data[0]->id;
        
        if($id == ""){echo("Sem cadastro.");}else{echo($id);}
        

    
}




?>