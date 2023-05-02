<?php

if(empty($_POST['nome']) or empty($_POST['email']) or empty($_POST['telefone']) or empty($_POST['cpf']) or empty($_POST['chave']) ){echo('Possui dados em branco.');}else{
    include("../../../bibliotecas/00-Rotas/01-configuracoes_adm.php");
    include("../../../modulos/usuario/api/02-validar_cpf_cnpj.php");

    
      $erro = false;
      $nome = $_POST["nome"];
      $email = $_POST["email"];
      $telefone = $_POST["telefone"];
      $cpf = $_POST["cpf"];
      $cep = $_POST["cep"];
      $endereco = $_POST["endereco"];
      $numero = $_POST["numero"];
      $complemento = $_POST["complemento"];
      $cidade = $_POST["cidade"];
      $estado = $_POST["estado"];
      $chave = $_POST['chave'];
      
      
    $valida_cpf_cnpj = validarCpfCnpj($cpf);
    if($valida_cpf_cnpj > 0){ $erro = true; }
    
    $caminho = '../../../modulos/cobranca_ASAAS/banco_de_dados/clientes/';
    $arquivo = $caminho . $chave.'.json';
    
    // Verifica se o arquivo existe, caso não exista, cria o arquivo
    if (!file_exists($arquivo)) {
      file_put_contents($arquivo, json_encode([]));
    }
    
    // Lê o conteúdo do arquivo e decodifica o JSON
    $clientes = json_decode(file_get_contents($arquivo), true);
    
    // Verifica se o CPF já existe no arquivo
    $cpfExiste = false;
    foreach ($clientes as $cliente) {
      if ($cliente['cpf'] == $cpf) {
        $cpfExiste = true;
        break;
      }
    }
    
    if ($cpfExiste or $erro) {
        if($erro){echo "CPF invalido."; }
        if($cpfExiste){echo "CPF já existe."; }
      // Log de erro caso o CPF já exista
    } else {
        
        $pasta  = "../../../modulos/usuario/banco_de_dados/*.json";
   
          foreach (glob($pasta) as $arquivo) {
                // Lê o conteúdo do arquivo e converte para um objeto JSON
                $json = file_get_contents($arquivo);
                $dados = json_decode($json, true);
          
                // Verifica se o e-mail e a senha correspondem aos dados do arquivo
                if ($dados['chave'] == $_POST['chave']) {
                    $chave_api_asaas = $dados['chave_api_asaas'];
                    break;
                }
            }
            
            
            //se não tiver chave cadastrada faça o cadastro apenas no servidor, depois teremos uma rotina de sincronização de dados
            // consulta a API $url = $link_site."/modulos/cobranca_ASAAS/api/api_consulta_cliente.php, envia acao = nada , chave_api_asaas, cnpj_cpf
            
            
            $url = $url = $link_site."/modulos/cobranca_ASAAS/api/api_consulta_cliente.php";
            
            
             // Define os dados a serem enviados no corpo da requisição
                    $dados = array(
                        'acao' => 'consulta_normal',
                        'chave_api_asaas' => $chave_api_asaas,//$chave_api_asaas,
                        'cnpj_cpf' => $cpf 
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
    
                    
                    if($resposta == 'Sem cadastro.'){
                        
                        $url = $url = $link_site."/modulos/cobranca_ASAAS/api/api_cadastro_cliente.php";
            
                     // Define os dados a serem enviados no corpo da requisição
                     
                                $dados = array(
                                'acao' => 'consulta_normal',
                                'email' => $email,
                                'nome' => $nome,
                                'telefone' => $telefone,
                                'chave' => $chave,
                                'postalCode' =>$cep,
                                'address' => $endereco,
                                'addressNumber' => $numero,
                                'complement' => $complemento,
                                'cidade' => $cidade,
                                'estado' => $estado,
                                'chave_api_asaas' => $chave_api_asaas,//$chave_api_asaas,
                                'cpfCnpj' => $cpf 
                            );
                            
                            // Inicializa o cURL
                            $ch = curl_init();
                            
                            // Define as opções do cURL
                            curl_setopt($ch, CURLOPT_URL, $url);
                            curl_setopt($ch, CURLOPT_POST, 1);
                            curl_setopt($ch, CURLOPT_POSTFIELDS, $dados);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            
                            // Executa a requisição e obtém a resposta
                            $resposta_final = curl_exec($ch);
                            
                            // Encerra o cURL
                            curl_close($ch);
            
                            // após fazer o cadastro pega a chave do usuário
                            
                            
                            $url = $url = $link_site."/modulos/cobranca_ASAAS/api/api_consulta_cliente.php";
            
            
                         // Define os dados a serem enviados no corpo da requisição
                                $dados = array(
                                    'acao' => 'consulta_normal',
                                    'chave_api_asaas' => $chave_api_asaas,//$chave_api_asaas,
                                    'cnpj_cpf' => $cpf 
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
                            
                            $id_user_asaas = $resposta;
                            
                    }else{
                        $id_user_asaas = $resposta;
                    }
                    
        
        
        
        $caminho = '../../../modulos/cobranca_ASAAS/banco_de_dados/clientes/';
        $arquivo = $caminho . $chave.'.json';
        
      // Faça a inclusão dos dados na última posição do array
      $novoCliente = [
        'nome' => $_POST['nome'],
        'email' => $_POST['email'],
        'telefone' => $_POST['telefone'],
        'cpf' => $cpf,
        'cep' => $_POST['cep'],
        'endereco' => $_POST['endereco'],
        'numero' => $_POST['numero'],
        'complemento' => $_POST['complemento'],
        'cidade' => $_POST['cidade'],
        'estado' => $_POST['estado'],
        'chave_asaas' => $id_user_asaas
      ];
      $clientes[] = $novoCliente;
    
      // Codifica o JSON novamente e salva no arquivo
      file_put_contents($arquivo, json_encode($clientes));
    
        
    
    
    
      echo "Dados adicionados com sucesso!"; // Mensagem de sucesso
    }
    
    
}


?>