<?php

if(!empty($_POST['os'])){
    
    $os              = $_POST['os'];
    $mensagem           = $_POST['mensagem'];
    $user          = $_POST['usuario'];
    $data               = time();
    
    
    if($user == 50 or $user == 600){
        
      
            
           $caminho_pasta = '../banco_de_dados/os/'.$os.'.json';
           
            $json = file_get_contents($caminho_pasta);
           
           $array = json_decode($json, true);
        
        
          if($user == 50){$user = 'solicitante';}
         if($user == 600){$user = 'atendente'; $array[0]['status_os'] = 3;}
        
        
        // Adiciona um novo dado na array 'descricao'
        $novoDado = array("mensagem" => $mensagem, "data" => time(), "tipo" => $user);
        $array[0]['descricao'][] = $novoDado;
        
        
        // Codifica o array de volta para JSON
        $jsonAtualizado = json_encode($array);
         file_put_contents($caminho_pasta, $jsonAtualizado);
    
        
        echo('atualizado');
    }else{
        echo('algo deu errado, tente novamente.');
    }
    
}else{
    echo('algo deu errado, tente novamente.');
}



?>