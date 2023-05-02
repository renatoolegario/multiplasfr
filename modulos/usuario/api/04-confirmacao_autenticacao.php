<?php
session_start();
$login_valido = false;
if(empty($_GET['bt'])){}else{
    if($_GET['bt'] == "sair"){
        
        session_destroy();
        HEADER("LOCATION: index.php");
        
    }
}

if (empty($_SESSION['sessao'])) {
    
    $pasta = "modulos/usuario/banco_de_dados/*.json";
   
   $ver = $_GET['ver'];
   
           $a = 1;
          foreach (glob($pasta) as $arquivo) {
                // Lê o conteúdo do arquivo e converte para um objeto JSON
                $json = file_get_contents($arquivo);
                $dados = json_decode($json, true);
            $a = 2;
            // Verifica se o e-mail e a senha correspondem aos dados do arquivo
            if ($dados['sessao'] == $ver) {
                $login_valido = true;
                $nome_arquivo = str_replace(".json","",basename($arquivo));
                $_SESSION['id']             = $nome_arquivo; // o ID SEMPRE VAI SER O NOME DO ARQUIVO
                $_SESSION['nome']           = ucfirst($dados['nome']);
                $_SESSION['telefone']       = $dados['telefone'];
                $_SESSION['cnpj_cpf']       = $dados['cnpj_cpf'];
                $_SESSION['email']          = $dados['email'];
                $_SESSION['senha']          = $dados['senha'];
                $_SESSION['tipo_usuario']   = $dados['tipo_usuario'];
                $_SESSION['cidade']         = $dados['cidade'];
                $_SESSION['cep']            = $dados['cep'];
                $_SESSION['endereco']       = $dados['endereco'];
                $_SESSION['numero']         = $dados['numero'];
                $_SESSION['complemento']    = $dados['complemento'];
                $_SESSION['sessao']         = $dados['sessao'];
                $_SESSION['chave']          = $dados['chave'];
                $_SESSION['chave_api_asaas']= $dados['chave_api_asaas'];
                
                
                
                //verifica o chave deste usuário se esta vinculada nos agentes.
                //verifica em qual equipe ele esta vinculado
                //verifica qual cargo ele esta vinculado
                
            $caminho_pasta = 'modulos/ordem_de_servico/banco_de_dados/agente.json';
            $json = file_get_contents($caminho_pasta);
            $array = json_decode($json);
            $_SESSION['agente'] = 0;
            $_SESSION['equipe'] = 0;
            $_SESSION['cargo'] = 0;
            $usuario = $_SESSION['chave'] ;
            $user_ver = "";
            
               for($i = 0; $i < count($array) ;$i++){
                    
                    $user_ver = $array[$i]->chave_usuario;
                    
                    
                
                    if ($user_ver == $usuario) {
                        
                        $_SESSION['agente'] = 1; // Encontrou o usuário
                        $_SESSION['equipe'] = $array[$i]->chave_equipe;
                        $_SESSION['cargo'] = $array[$i]->chave_cargo;
                    break;
                    }
                }
   
   
      
                    //verifica qual é a autorização do cargo vinculado
                    
                    $caminho = 'modulos/ordem_de_servico/banco_de_dados/cargo.json';
                    $json = file_get_contents($caminho);
                    $array = json_decode($json);
                    $_SESSION['autorizacao_cargo'] = 0;
                    
                    for($i = 0; $i < count($array);$i++){
                         $chave_cargo = $array[$i]->chave;
                         if($chave_cargo == $_SESSION['cargo']){
                             $_SESSION['autorizacao_cargo'] = $array[$i]->id_autorizacao;
                             break;
                         } 
                    
                    }
                    
                //buscar departamentos    
                    $caminho = 'modulos/ordem_de_servico/banco_de_dados/departamento.json';
                    $json = file_get_contents($caminho);
                    $array = json_decode($json);
                    $_SESSION['departamento'] = 0;
                    $array_dp = [];
                    
                     for($i = 0; $i < count($array);$i++){
                         $chave_equipe_dp = $array[$i]->equipe;
                         
                         if($chave_equipe_dp == $_SESSION['equipe']){
                           $array_dp[] = $array[$i]->chave;;  
                         }
                         
                     }
                     
                     $_SESSION['departamento'] = $array_dp;
                     
                    
                 //buscar grupos    
                    $caminho = 'modulos/ordem_de_servico/banco_de_dados/grupo_os.json';
                    $json = file_get_contents($caminho);
                    $array = json_decode($json);
                    $_SESSION['grupo_os'] = 0;
                    $array_grupo_os = [];
                    
                    foreach($_SESSION['departamento'] as $item){
                    
                         for($i = 0; $i < count($array);$i++){
                           
                            $chave_departamento_gupo = $array[$i]->chave_departamento;
                           if($chave_departamento_gupo == $item){
                              $array_grupo_os[] =   $array[$i]->chave; 
                           }
                             
                         }
                         
                    }
                     
                     $_SESSION['grupo_os'] = $array_grupo_os;
                         
                    
                  
            }     
   
        }
                
                if($login_valido == false){
                    // aqui manda para fora pq esta tentado invadir
                    session_destroy();
                    HEADER("LOCATION: index.php");
                }else{
                     // aqui libera o login 
                    //HEADER("LOCATION: app.php");
                }
    
} else {
    // aqui não faz nada somente deixa o usuário fazer oque quiser pois já esta autenticado.
       
}


?>