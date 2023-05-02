<?php


$pasta = 'modulos/ordem_de_servico/banco_de_dados/equipe.json';

$option_equipe = '<option value=""> - </option>';

$json = file_get_contents($pasta);
$dados_array_equipe = json_decode($json, true);

$cont = 0;
    foreach ($dados_array_equipe as $dados) {
        // Lê o conteúdo do arquivo e converte para um objeto JSON
        $cont++;
            
                // obtém as informações de cada array
                $nome = $dados['nome'];
                $chave = $dados['chave']; // chave que identifica o departamento
                
                $pasta = 'modulos/ordem_de_servico/banco_de_dados/agente.json';
                $json = file_get_contents($pasta);
                $dados_array_agentes = json_decode($json, true);
                $cont2 = 0;
                foreach ($dados_array_agentes as $dados_agente) {
                 
                 if($dados_agente["chave_equipe"] == $chave){$cont2++;}
                    
                }
                
                $option_equipe = $option_equipe.'<option value="'.$chave.'">'.$nome.'</option>';
                
                $tabela_equipes = $tabela_equipes.'<tr>
      
                      <td class="text-secondary text-xs font-weight-semibold opacity-7">'.$cont.'</td>
                      <td class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                      
                      <input type="text" value="'.$nome.'" id="nome_equipe_alterar_'.$chave.'" onBlur="alterar_nome_equipe(\''.$chave.'\');">
                      </td>
                      
                      <td class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">'.$cont2.'</td>
                      <td class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">status</td>
      
      </tr>';
    
   
}

?>




