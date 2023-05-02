<?php
if(!empty($_GET['os'])){
    
    $chave_usuario = $_SESSION['chave'] ;
    
    $os = $_GET['os'];
    $pasta = 'modulos/ordem_de_servico/banco_de_dados/os/'.$os.".json";

    $json = file_get_contents($pasta); // Lê o conteúdo do arquivo JSON
    $array = json_decode($json); // Decodifica o JSON em uma array

   
    
        $os = $array[0]->os;
        $status_os = $array[0]->status_os;
        $tipo = $array[0]->tipo;
        $data_abertura = date("d/m/Y",$array[0]->data_abertura);
        $data_conclusao = $array[0]->data_conclusao;
        if(empty($data_conclusao)){$data_conclusao = 'em aberto';}else{$data_conclusao = date("d/m/Y",$data_conclusao);}
        
        $grupo = $array[0]->grupo;
        
        $arquivoGrupos = 'modulos/ordem_de_servico/banco_de_dados/grupo_os.json';

        // Lê o conteúdo do arquivo JSON
        $jsonGrupos = file_get_contents($arquivoGrupos);
        
        // Decodifica o JSON em uma array
        $arrayGrupos = json_decode($jsonGrupos);
        
        $chaveDesejada = $grupo; // Chave desejada para buscar o nome
        
        // Percorre a array de grupos para encontrar o nome do grupo correspondente à chave desejada
        foreach ($arrayGrupos as $grupo) {
            if ($grupo->chave == $chaveDesejada) {
                $grupo = $grupo->nome;
                break; // Interrompe o loop assim que o grupo for encontrado
            }
        }
        
        
        $subgrupo = $array[0]->subgrupo;
        
        $arquivoGrupos = 'modulos/ordem_de_servico/banco_de_dados/subgrupo_os.json';

        // Lê o conteúdo do arquivo JSON
        $jsonGrupos = file_get_contents($arquivoGrupos);
        
        // Decodifica o JSON em uma array
        $arrayGrupos = json_decode($jsonGrupos);
        
        $chaveDesejada = $subgrupo; // Chave desejada para buscar o nome
        
        // Percorre a array de grupos para encontrar o nome do grupo correspondente à chave desejada
        foreach ($arrayGrupos as $subgrupo) {
            if ($subgrupo->chave == $chaveDesejada) {
                $subgrupo = $subgrupo->nome;
                break; // Interrompe o loop assim que o grupo for encontrado
            }
        }
        
        $nome = $array[0]->nome;
        $email = $array[0]->email;
        $telefone = $array[0]->telefone;
        
       echo '
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">Detalhes da Ordem de Serviço</div>
        
        ';
        
        
        if($status_os == 4 and $email == $_SESSION['email']){
            // se o atendente finalizou essa opção vai aparecer dando 2 opções, finalizar por completo ou reabrir
            echo('
            <table style="width:50%;">
            <tr>
                <td>
            <button onClick="alterar_status_os(\''.$os.'\',\'2\',\''.$chave_usuario.'\')" class="btn btn-sm btn-info btn-icon d-flex align-items-center mb-0 ms-md-auto mb-sm-0 mb-2 me-2"> Finalizar OS </button>
                </td>
                <td>
            <button onClick="alterar_status_os(\''.$os.'\',\'1\',\''.$chave_usuario.'\')" class="btn btn-sm btn-warning btn-icon d-flex align-items-center mb-0 ms-md-auto mb-sm-0 mb-2 me-2"> Reabrir OS </button>
                </td>
            </tr>
            </table>
            ');
        }
        
        if(($status_os == 1 or $status_os == 3) and $email <> $_SESSION['email']){
            // se o atendente finalizou essa opção vai aparecer dando 2 opções, finalizar por completo ou reabrir
            echo('
            <table style="width:50%;">
            <tr>
                <td>
            <button onClick="alterar_status_os(\''.$os.'\',\'4\',\''.$chave_usuario.'\')" class="btn btn-sm btn-info btn-icon d-flex align-items-center mb-0 ms-md-auto mb-sm-0 mb-2 me-2"> Finalizar OS </button>
                </td>
               
            </tr>
            </table>
            ');
        }
        
        
        echo'
        <div class="card-body">
          <p><strong>OS:</strong> ' . $os . '</p>
          <p><strong>Status OS:</strong> ' . $nome_status[$status_os] . '</p>
          <p><strong>Tipo:</strong> ' . $tipo . '</p>
          <p><strong>Data de Abertura:</strong> ' . $data_abertura . '</p>
          <p><strong>Data de Conclusão:</strong> ' . $data_conclusao . '</p>
          <p><strong>Grupo:</strong> ' . $grupo . '</p>
          <p><strong>Subgrupo:</strong> ' . $subgrupo . '</p>
          <p><strong>Nome:</strong> ' . $nome . '</p>
          <p><strong>Email:</strong> ' . $email . '</p>
          <p><strong>Telefone:</strong> ' . $telefone . '</p>
        </div>
      </div>
    </div>
    
    
     <div class="col-md-6">
      <div class="card">
        <div class="card-header">Descrição</div>
        <div class="card-body">
          ';
          
            $descricao = $array[0]->descricao;
           
                    $tamanho_array = count($descricao)-1;
                   
                   
                   
                    for($k = 0; $k<= $tamanho_array; $k++){
                        
                        $data = $descricao[$k]->data;
                        $data = date("d/m/Y",$data);
                          echo($descricao[$k]->tipo." - ".$data."</br>"); 
                          echo($descricao[$k]->mensagem."</br>");
                          echo("</br>");
                           
                    }
                    
                    echo('</br>');
                    
                    echo('<textarea id="nova_msg" class="form-control" ></textarea></br>');
                    echo('<button class="btn btn-info btn-block btn-round" onClick="add_msg(\''.$os.'\',600);">Enviar mensagem</button>');
          
         
          
          echo'
        </div>
      </div>
    </div>
    
  
</div>';

        
        
    
    
}

?>