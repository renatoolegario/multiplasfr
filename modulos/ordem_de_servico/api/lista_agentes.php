<?php


$pasta = 'modulos/ordem_de_servico/banco_de_dados/agente.json';


    
$option_agente = '<option value=""> - </option>';
$tabela_agentes = '';
$cont = 0;

$json = file_get_contents($pasta);
$dados_array = json_decode($json, true);


    

$cont = 0;
    foreach ($dados_array as $dados) {
        // Lê o conteúdo do arquivo e converte para um objeto JSON
        $cont++;
    // Lê o conteúdo do arquivo e converte para um objeto JSON
   
    
    $chave_usuario = $dados["chave_usuario"];
    $chave_cargo   = $dados["chave_cargo"];
    $chave_equipe  = $dados["chave_equipe"];
    
    $pasta = 'modulos/ordem_de_servico/banco_de_dados/cargo.json';
    $cargo = 'Sem cargo';
    
            // Lê o conteúdo do arquivo e converte para um objeto JSON
            $json = file_get_contents($pasta);
            $dados_cargo_array = json_decode($json, true);
            // Verifica se o CPF está cadastrado neste arquivo
        
        
     foreach ($dados_cargo_array as $dados_cargo) {
            
            if ($dados_cargo['chave'] == $chave_cargo) {
                
                $cargo = $dados_cargo['nome'];
                 break;
            }
     }
    
    $pasta = 'modulos/ordem_de_servico/banco_de_dados/equipe.json';
    $equipe = 'Sem equipe';
    
    
            // Lê o conteúdo do arquivo e converte para um objeto JSON
            $json = file_get_contents($pasta);
            $dados_equipe_array = json_decode($json, true);
            // Verifica se o CPF está cadastrado neste arquivo
      
       foreach ($dados_equipe_array as $dados_equipe) {      
            if ($dados_equipe['chave'] == $chave_equipe) {
                
                $equipe = $dados_equipe['nome'];
                 break;
            }
        
       }
        
    // aqui vai ler o arquivo banco de dados do usuário identificar qual é o usuário e guardar dentro da variavel nome
    
    $pasta = 'modulos/usuario/banco_de_dados/*.json';
    $arquivo = '';
    $nome = "";
        foreach (glob($pasta) as $arquivo) {
           
            // Lê o conteúdo do arquivo e converte para um objeto JSON
            $json = file_get_contents($arquivo);
            $dados_user = json_decode($json, true);
            // Verifica se o CPF está cadastrado neste arquivo
            
            if ($dados_user['chave'] == $chave_usuario) {
                
                $nome = $dados_user['nome'];
                $email_agente = $dados_user['email'];
                 break;
            }
        }
    
    
    
      $chave = $dados["chave"]; // chave da lista de agentes , OBS: não é ado agente a do agente é chave_usuario.
      $tabela_agentes = $tabela_agentes.'<tr>
      
                      <td class="text-secondary text-xs font-weight-semibold opacity-7">'.$cont.'</td>
                      <td class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">'.$nome.'</br>
                      '.$email_agente.'
                      </td>
                      <td class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                      '.$cargo.'</br>
                      <select id="cargo_do_agente_'.$chave.'" onChange="alterar_cargo_de_agente(\''.$chave.'\');">
                      '.$option_cargo.'
                      </select>
                      </td>
                      <td class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                      '.$equipe.'</br>
                      <select id="equipe_do_agente_'.$chave.'" onChange="alterar_equipe_de_agente(\''.$chave.'\');">
                           '.$option_equipe.'
                     </select>
                      
                      </td>
                      <td class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">QTD</td>
                      <td class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">QTD</td>
                      <td class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">QTD</td>
      
      </tr>';
}

?>
