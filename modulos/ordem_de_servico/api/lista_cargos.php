<?php


$pasta = 'modulos/ordem_de_servico/banco_de_dados/cargo.json';

$option_cargo = '<option value=""> - </option>';

$json = file_get_contents($pasta);
$dados_array = json_decode($json, true);

    $cont = 0;
    foreach ($dados_array as $dados) {
        // Lê o conteúdo do arquivo e converte para um objeto JSON
        $cont++;
        
        $nome = $dados["nome"];
        $id_autorizacao= $dados["id_autorizacao"];
        $chave = $dados['chave']; // obtém o nome do arquivo sem o caminho
        
          $option_cargo = $option_cargo.'<option value="'.$chave.'">'.$nome.'</option>';
          $opt = '';
           $tabela_cargos = $tabela_cargos.'<tr>
          
                          <td class="text-secondary text-xs font-weight-semibold opacity-7">'.$cont.'</td>
                           <td class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                      
                              <input type="text" value="'.$nome.'" id="nome_cargo_alterar_'.$chave.'" onBlur="alterar_nome_cargo(\''.$chave.'\');">
                              </td>
                          <td class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                          <select onChange="alterar_autorizacao_cargo(\''.$chave.'\');" id="alterar_autorizacao_cargo_'.$chave.'">';
                            
                            
                            if($id_autorizacao == 1){$opt = $opt.'<option value="1" selected>Atendente 1 </option>';}else{$opt = $opt.'<option value="1">Atendente 1 </option>';}
                            
                            if($id_autorizacao == 2){$opt = $opt.'<option value="2" selected>Atendente 2 </option>';}else{$opt = $opt.'<option value="2">Atendente 2 </option>';}
                            
                            if($id_autorizacao == 3){$opt = $opt.'<option value="3" selected>Master</option>';}else{$opt = $opt.'<option value="3">Master</option>';}
                            
                            $tabela_cargos = $tabela_cargos.$opt.'
                          </select>
                          </td>
                          <td class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Status</td>
          
          </tr>';
          
          
    }

?>


