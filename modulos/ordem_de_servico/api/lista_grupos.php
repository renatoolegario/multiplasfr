
<?php


$pasta = 'modulos/ordem_de_servico/banco_de_dados/grupo_os.json';

$option_grupo = '<option value=""> - </option>';

$json = file_get_contents($pasta);
$dados_array = json_decode($json, true);

$cont = 0;
    foreach ($dados_array as $dados) {
        // Lê o conteúdo do arquivo e converte para um objeto JSON
        $cont++;
    
                // obtém as informações de cada array
                $nome = $dados['nome'];
                $chave = $dados['chave']; // chave da lista
                $chave_departamento = $dados['chave_departamento'];
                $email = $dados['email'];
                
                
                 $pasta = 'modulos/ordem_de_servico/banco_de_dados/departamento.json';
                $departamento = 'Sem departamento';
                
                
                        // Lê o conteúdo do arquivo e converte para um objeto JSON
                        $json = file_get_contents($pasta);
                        $dados_equipe_array = json_decode($json, true);
                        // Verifica se o CPF está cadastrado neste arquivo
                  
                   foreach ($dados_equipe_array as $dados_equipe) {      
                        if ($dados_equipe['chave'] == $chave_departamento) {
                            
                            $departamento = $dados_equipe['nome'];
                             break;
                        }
                    
                   }
                
                
                
                
                $option_grupo = $option_grupo.'<option value="'.$chave.'">'.$nome.'</option>';
            
            $tabela_grupos_os = $tabela_grupos_os.'<tr>
      
                      <td class="text-secondary text-xs font-weight-semibold opacity-7">'.$cont.'</td>
                      <td class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                      <input type="text" onBlur="alt_nome_grupo(\''.$chave.'\');" id="nome_grupo_alterar_'.$chave.'"
                      value="'.$nome.'">
                      </td>
                      <td class="text-secondary text-xs font-weight-semibold opacity-7 ps-2"> QTD</td>
                      <td class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                      '.$departamento.'</br>
                      
                      <select  onBlur="alt_departamento_grupo(\''.$chave.'\');" id="nome_departamento_alterar_'.$chave.'">
                      '.$option_departamento.'
                      </select></td>
                      <td class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Status</td>
      
      </tr>';
    
   
}

?>





