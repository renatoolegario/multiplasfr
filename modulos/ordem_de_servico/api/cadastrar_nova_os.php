<?php

if(!empty($_POST['nome'])){
    
    $grupo              = $_POST['grupo'];
    $subgrupo           = $_POST['subgrupo'];
    $descricao          = $_POST['descricao'];
    $nome               = $_POST['nome'];
    $telefone           = $_POST['telefone'];
    $email_abertura     = $_POST['email'];
    $agora = time();
    
    
    //criar a OS 
    
   $nome_arquivo = "AS".date("Y");
   $caminho_pasta = 'modulos/ordem_de_servico/banco_de_dados/os/';
   
   
   // Obtém uma lista de todos os arquivos e diretórios na pasta
    $lista_arquivos = scandir($caminho_pasta);
    
    // Inicializa o contador de arquivos encontrados
    $contagem_arquivos = 0;
    
    // Percorre a lista de arquivos e verifica se o nome do arquivo corresponde
    foreach ($lista_arquivos as $arquivo) {
        // Verifica se o arquivo tem o nome correspondente
        if (strpos($arquivo, $nome_arquivo) !== false) {
            $contagem_arquivos++;
        }
    }
   $contagem_arquivos++;
   
  
       // Quantidade de dígitos desejada
    $quantidade_digitos = 5;
    
    // Formata o número do arquivo com zeros à esquerda
    $numero_arquivo_formatado = str_pad($contagem_arquivos, $quantidade_digitos, "0", STR_PAD_LEFT);
    $nome_arquivo_gravar = $caminho_pasta.$nome_arquivo.'.'.$numero_arquivo_formatado.".json";
    $nome_arquivo_os = $nome_arquivo.'.'.$numero_arquivo_formatado;
   
    
    // Pega o e-mail do responsável do grupo e-mail para responsável
    // primeiro pega o ID do departamento do grupo
    // acessa o departamento e pega o e-mail
    
    
    $caminho_pasta = 'modulos/ordem_de_servico/banco_de_dados/grupo_os.json';
    $json = file_get_contents($caminho_pasta);
    $array = json_decode($json, true);

    // Percorre o array
    $i = 0;
    $array_m = 0;
    
    $cont = 0;
    $tamanho_array = count($array) -1;
    for ($i = 0; $i <= $tamanho_array; $i++) {
        if($array[$i]['chave'] == $grupo){$departamento = $array[$i]['chave_departamento'];}
    }
   
   // agora vai pegar o e-mail do departamento
   
    $caminho_pasta = 'modulos/ordem_de_servico/banco_de_dados/departamento.json';
    $json = file_get_contents($caminho_pasta);
    $array = json_decode($json, true);

    // Percorre o array
    $i = 0;
    $array_m = 0;
    
    $cont = 0;
    $tamanho_array = count($array) -1;
    for ($i = 0; $i <= $tamanho_array; $i++) {
        if($array[$i]['chave'] == $departamento){$email_suporte = $array[$i]['email'];}
    }
    
    
    $dados = [];
    // definir os valores para o novo array
        $novo_array = array('os'=> $nome_arquivo_os,'status_os' => 1,'tipo' => 'externo', 'data_abertura' => $agora,'data_conclusao'=>'', 'grupo' => $grupo, 'subgrupo' => $subgrupo, 'nome' =>  ucfirst($nome),'email' => $email_abertura, 'telefone' => $telefone, 'descricao' => array(['mensagem' => $descricao,'data' => $agora,'tipo' => 'solicitante']));
    
        // adicionar o novo array ao final do array existente
        $dados[] = $novo_array;
    
        // converter o array em JSON
        $json_novo = json_encode($dados);
    
        // escrever o conteúdo JSON de volta ao arquivo
        file_put_contents($nome_arquivo_gravar, $json_novo);
    
    
    //chama a API para envio de e-mail
    
     $url = $url = $link_site."/modulos/ordem_de_servico/api/envio_email_cadastro.php";
            
            
             // Define os dados a serem enviados no corpo da requisição
                    $dados = array(
                        'email_suporte' => $email_suporte,
                        'email_abertura' => $email_abertura,//$chave_api_asaas,
                        'numero_chamado' => $nome_arquivo_os,
                        'nome' => ucfirst($nome),
                        'link' => $link_site.'/app.php?bt=os&os_num='.$nome_arquivo_os.'&email='.$email_abertura.'&acao=acompanhar_os'
                    );
                    
                    // Inicializa o cURL
                    $ch = curl_init();
                    
                    // Define as opções do cURL
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $dados);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
                    
                    // Executa a requisição e obtém a resposta
                    $resposta = curl_exec($ch);
    
    
    
    echo('
    <script>
    
    var url = "'.$link_site.'/app.php?bt=os&os_num='.$nome_arquivo_os.'&email='.$email_abertura.'&acao=acompanhar_os";

    // Redireciona o usuário para a URL
    window.location.href = url;
    
    </script>
    ');
    
    
    
}



?>