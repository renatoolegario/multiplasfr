<?php

if(!empty($_POST['os'])){
    
    $os              = $_POST['os'];
    $novo_status     = $_POST['status'];
    $usuario         = $_POST['u'];
    
    //verifica se o usuario é atendente ou o usuario que criou a OS
    
    //verifica se o status é 1, 2, 3 ou 4 se atender os 2 faça a alteração.
    
            
    
            $usuario_agente = $_SESSION['agente'] ;
            
            
            $caminho_pasta = '../../usuario/banco_de_dados/';
            $email_solicitante = 0;
                foreach (glob($caminho_pasta . '*.json') as $arquivo) {
                
                $json = file_get_contents($arquivo);
                $array = json_decode($json);
               
                        if ($array->chave == $usuario) {
                            $email_solicitante = $array->email; // Encontrou o usuário e guardou o email
                            break; // Pára o loop
                        }
                    
            
                }
        
            
     
            $caminho_pasta = '../banco_de_dados/os/'.$os.'.json';
            $json = file_get_contents($caminho_pasta);
            $array = json_decode($json, true);
            $array[0]['status_os'] = $novo_status;
            $jsonAtualizado = json_encode($array);
            
            if($usuario_agente == 1 or $array[0]['email'] == $email_solicitante){
           
                file_put_contents($caminho_pasta, $jsonAtualizado);
            
            }
    
    
    
    
    
}else{echo("erro");}




?>