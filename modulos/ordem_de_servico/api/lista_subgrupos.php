
<?php


$pasta = 'modulos/ordem_de_servico/banco_de_dados/subgrupo_os.json';

$option_subgrupo = '<option value=""> - </option>';

$json = file_get_contents($pasta);
$dados_array = json_decode($json, true);

$cont = 0;
    foreach ($dados_array as $dados) {
        // Lê o conteúdo do arquivo e converte para um objeto JSON
        $cont++;
    
                // obtém as informações de cada array
                $nome = $dados['nome'];
                $chave = $dados['chave']; // chave da lista
                $chave_grupo = $dados['chave_grupo'];
                
                 $pasta = 'modulos/ordem_de_servico/banco_de_dados/grupo_os.json';
                $grupo_os = 'Sem grupo';
                
                
                        // Lê o conteúdo do arquivo e converte para um objeto JSON
                        $json = file_get_contents($pasta);
                        $dados_equipe_array = json_decode($json, true);
                        // Verifica se o CPF está cadastrado neste arquivo
                  
                   foreach ($dados_equipe_array as $dados_equipe) {      
                        if ($dados_equipe['chave'] == $chave_grupo) {
                            
                            $grupo_os = $dados_equipe['nome'];
                             break;
                        }
                    
                   }
                
                
                
                
                $option_subgrupo = $option_subgrupo.'<option value="'.$chave.'">'.$nome.'</option>';
            
            $tabela_sub_grupos_os = $tabela_sub_grupos_os.'<tr>
      
                      <td class="text-secondary text-xs font-weight-semibold opacity-7">'.$cont.'</td>
                      <td class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                      <input type="text" onBlur="alt_nome_subgrupo(\''.$chave.'\');" id="nome_subgrupo_alterar_'.$chave.'"
                      value="'.$nome.'">
                      </td>
                      <td class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                      '.$grupo_os.'</br>
                      
                      <select  onBlur="alt_grupo_subgrupo(\''.$chave.'\');" id="grupo_subgrupo_alterar'.$chave.'">
                      '.$option_grupo.'
                      </select></td>
                      <td class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Status</td>
      
      </tr>';
    
   
}

?>





