<?php


$pasta = 'modulos/ordem_de_servico/banco_de_dados/departamento.json';

$option_departamento = '<option value=""> - </option>';

$json = file_get_contents($pasta);
$dados_array = json_decode($json, true);


$cont = 0;
    foreach ($dados_array as $dados) {
        // Lê o conteúdo do arquivo e converte para um objeto JSON
        $cont++;
    
                // obtém as informações de cada array
                $nome = $dados['nome'];
                $email = $dados['email'];
                $chave = $dados['chave']; // chave que identifica o departamento
                $chave_equipe = $dados['equipe'];
                
                
                
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
                
                
              
                $option_departamento = $option_departamento.'<option value="'.$chave.'">'.$nome.'</option>';


             $tabela_departamentos = $tabela_departamentos.'<tr>
      
                      <td class="text-secondary text-xs font-weight-semibold opacity-7">'.$cont.'</td>
                      <td class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                        <input type="text" value="'.$nome.'" id="nome_departamento_alterar_'.$chave.'" onBlur="alterar_nome_departamento(\''.$chave.'\');">
                       </td>
                      
                      <td class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                      '.$equipe.'</br>
                      <select onChange="alterar_equipe_departamento(\''.$chave.'\');" id="nome_equipe_alterar_'.$chave.'">
                      '.$option_equipe.'
                      </select>
                      </td>
                      <td class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                      
                        <input type="text" value="'.$email.'" id="nome_email_alterar_'.$chave.'" onBlur="alterar_email_departamento(\''.$chave.'\');">
                      
                      </td>
                      <td class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Status</td>
      
      </tr>';
    
   
}

?>


