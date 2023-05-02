
<?php

if(!empty($_POST['chave_api_asaas'])){
    
include("../../../bibliotecas/00-Rotas/01-configuracoes_adm.php");

        $chave_api_asaas = $_POST['chave_api_asaas'];
    
        $libera_alt = 0;
    if($chave_api_asaas == 'oi'){
        
        // consulta a chave do bixo 
        
        $pasta  = "../../../modulos/usuario/banco_de_dados/*.json";
   
          foreach (glob($pasta) as $arquivo) {
                // Lê o conteúdo do arquivo e converte para um objeto JSON
                $json = file_get_contents($arquivo);
                $dados = json_decode($json, true);
          
            // Verifica se o e-mail e a senha correspondem aos dados do arquivo
            if ($dados['chave'] == $_POST['chave_user']) {
                $chave_api_asaas = $dados['chave_api_asaas'];
                break;
            }
        }
    }else{
       $libera_alt = 1;
    }
    $ch = curl_init();
    
    curl_setopt($ch, CURLOPT_URL, "https://www.asaas.com/api/v3/myAccount/commercialInfo");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      "Content-Type: application/json",
      "access_token: ".$chave_api_asaas
    ));
    
    $response = curl_exec($ch);
    curl_close($ch);
    
    
    
        if (property_exists($response, 'status')) {
           
        } else {
            $libera_alt = 1;
        }
    
    //tem que fazera verificação na response para ver se o status é valido se for faça abaixo
    
                if($libera_alt == 1 && $response){
                    //chama api para alterar os dados
                    $url = $link_site."/modulos/usuario/api/05-alterar_dados_usuario.php";
            
                    // Define os dados a serem enviados no corpo da requisição
                    $dados = array(
                        'acao' => 'alt_dados',
                        'chave_api_asaas' => $chave_api_asaas,//$chave_api_asaas,
                        'chave_user' => $_POST['chave_user'] 
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
                    
                    
                    
                }
    var_dump($response);

}

?>