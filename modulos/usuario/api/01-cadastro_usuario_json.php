<?php

$pasta = "../banco_de_dados/";


if(empty($_POST['nome'])){}else{
    include("../../../bibliotecas/00-Rotas/01-configuracoes_adm.php");
    $cpf_cadastrado = false;
    $email_cadastrado = false;
    $nome           = $_POST['nome'];
    $telefone       = $_POST['telefone'];
    $cpf_cnpj       = $_POST['cnpj_cpf'];
    $email          = $_POST['email'];
    $senha          = $_POST['senha'];
    
    
    foreach (glob($pasta . "*.json") as $arquivo) {
        
       
        // Lê o conteúdo do arquivo e converte para um objeto JSON
        $json = file_get_contents($arquivo);
        $dados = json_decode($json, true);
        // Verifica se o CPF está cadastrado neste arquivo
        if ($dados['cnpj_cpf'] == $cpf_cnpj) {
            $cpf_cadastrado = true;
        }
    
        // Verifica se o e-mail está cadastrado neste arquivo
        if ($dados['email'] == $email) {
            $email_cadastrado = true;
        }
    
        // Se já encontramos o CPF e o e-mail cadastrado, podemos sair do loop
        if ($cpf_cadastrado || $email_cadastrado) {
            break;
        }
            
        
    }
    
    
 
    $erro = 0;
    
    if($cpf_cadastrado == true){ $erro = 1;     echo('Cnpj já cadastrado.');    }
    if($email_cadastrado == true){ $erro = 1;       echo('E-mail já cadastrado.');    }
    
    
    include("02-validar_cpf_cnpj.php");
    $valida_cpf_cnpj = validarCpfCnpj($cpf_cnpj);
    if($valida_cpf_cnpj > 0){ $erro = 1; echo('CPF ou CNPJ invalidos');}
    
    
    
    
    
 
    if($erro == 0){
    
    
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
        $id_usuario = generateRandomKey(7).time().generateRandomKey(7); 
        $chave_api = generateRandomKey(15); 
    
    
        $data = array(
            "nome" => $nome,
            "telefone" => $telefone,
            "cnpj_cpf" => $cpf_cnpj,
            "email" => $email,
            "senha" => $senha,
            "tipo_usuario" => "1",
            "cidade" => "",
            "cep" => "",
            "endereco" => "",
            "numero" => "",
            "complemento" => "",
            "recuperacao_senha" => "",
            "sessao" => "",
            "chave_api" => $chave_api,
            "chave" => $id_usuario,
            "chave_api_asaas" => ""
        );
    
    
        $json = json_encode($data);
        file_put_contents($pasta.$id_arquivo.'.json', $json);
    
       
        // chamar aqui a função do PHPMailer para enviar um e-mail para o usuário com sua nova credencial
      
        require_once("01-envio_email_cadastro.php");
        
        //CONSULTA ASAAS
      
        $url = $link_site."/modulos/cobranca_ASAAS/api/api_consulta_cliente.php";

        // Define os dados a serem enviados no corpo da requisição
        $dados = array(
            'acao' => 'novo_usuario',
            'cnpj_cpf' => $cpf_cnpj,
            'chave' => $id_usuario
        );
        
        // Inicializa o cURL
        $ch = curl_init();
        
        // Define as opções do cURL
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dados);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        // Executa a requisição e obtém a resposta
        $resposta = curl_exec($ch);
        
        // Encerra o cURL
        curl_close($ch);
        
      
      if($resposta == "Sem cadastro."){
          //cadastra ele no asaas
          
          $url = $link_site."/modulos/cobranca_ASAAS/api/api_cadastro_cliente.php";

        // Define os dados a serem enviados no corpo da requisição
        $dados = array(
            'nome' => $nome,
            'email' => $email,
            'telefone' => $telefone,
            'cpfCnpj' => $cpf_cnpj,
            'acao' => 'novo_usuario',
            'chave'=> ''
        );
        
        // Inicializa o cURL
        $ch = curl_init();
        
        // Define as opções do cURL
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dados);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        // Executa a requisição e obtém a resposta
        $resposta = curl_exec($ch);
        
        // Encerra o cURL
        curl_close($ch);
          
          
      }else{
          //não faz o cadastro apenas passa para próxima  etapa
      }
       
       // consulta o id do usuário que esta cadastrado no ASAAS
       // Gera um arquivo json com data de cobrança, data de vencimento,  chave do usuário , valor
       
       $caracteres = "abcdefghijklmnopqrstuvwxyz0123456789";
            $chave = "";
            for ($i = 0; $i < 19; $i++) {
                $chave .= $caracteres[rand(0, strlen($caracteres) - 1)];
            }
       $data_atual = time();
       
            $pasta_add = '../../../modulos/cobranca_ASAAS/banco_de_dados/nao_emitidas/'.$data_atual.$chave.'.json';
            $json = file_get_contents($pasta_add);
            $dados = json_decode($json, true);
            
            
            
            $data_vencimento = $data_atual + ($tempo_gratis * 86400);
            $data_cobranca = $data_atual + (($tempo_gratis * 86400) - (7 * 86400));
            
            $novo_array = array('cpf_cnpj_usuario' => $cpf_cnpj, 'valor'=> $valor_base,  'data_cadastro' => $data_atual, 'data_cobranca'=> $data_cobranca,'data_vencimento' => $data_vencimento,'descricao' => '1º boleto novo usuário - '.$nome_identificacao_asaas);

            // adicionar o novo array ao final do array existente
            $dados[] = $novo_array;
        
            // converter o array em JSON
            $json_novo = json_encode($dados);
        
            // escrever o conteúdo JSON de volta ao arquivo
            file_put_contents($pasta_add, $json_novo);
            
       
       
      
        
        
        
       echo('Cadastro realizado com sucesso!'.$resposta);    
    }
    

}

  
?>