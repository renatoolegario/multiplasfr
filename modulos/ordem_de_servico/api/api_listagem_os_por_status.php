
<?php

$status = $_GET['status'];
$email_sessao = $_SESSION['email'];

$pasta = 'modulos/ordem_de_servico/banco_de_dados/os/';

// Obtém os nomes dos arquivos JSON na pasta
$arquivos = glob($pasta . '*.json');

echo '<table class="table align-items-center justify-content-center mb-0">';
echo '<tr>
        <th>OS</th>
        <th>Status</th>
        <th>Tipo</th>
        <th>Data de Abertura</th>
        <th>Data de Conclusão</th>
        <th>Grupo</th>
        <th>Nome</th>
    </tr>';

// Loop para ler e filtrar os arquivos
foreach ($arquivos as $arquivo) {
   
    $json = file_get_contents($arquivo); // Lê o conteúdo do arquivo JSON
   
    $array = json_decode($json); // Decodifica o JSON em uma array
  
    // Verifica se a array possui o índice 'status_os' e se o valor é igual ao status desejado
    if ($array[0]->status_os == $status) {
        
        // Captura todos os dados da array JSON
        $os = $array[0]->os;
        $status_os = $array[0]->status_os;
        $tipo = $array[0]->tipo;
        $data_abertura = date("d/m/Y",$array[0]->data_abertura);
        $data_conclusao = $array[0]->data_conclusao;
        
        if(empty($data_conclusao)){$data_conclusao = 'em aberto';}else{$data_conclusao = date("d/m/Y",$data_conclusao);}
        $grupo_dado = $array[0]->grupo;
        $grupo = $array[0]->grupo;
        
        $arquivoGrupos = 'modulos/ordem_de_servico/banco_de_dados/grupo_os.json';

        // Lê o conteúdo do arquivo JSON
        $jsonGrupos = file_get_contents($arquivoGrupos);
        
        // Decodifica o JSON em uma array
        $arrayGrupos = json_decode($jsonGrupos);
        
        $chaveDesejada = $grupo; // Chave desejada para buscar o nome
        
        // Percorre a array de grupos para encontrar o nome do grupo correspondente à chave desejada
        foreach ($arrayGrupos as $grupoLoop) {
            if ($grupoLoop->chave == $chaveDesejada) {
                $grupo = $grupoLoop->nome;
                break; // Interrompe o loop assim que o grupo for encontrado
            }
        }
        
        
        $subgrupo = $array[0]->subgrupo;
        
        $arquivoGrupos = 'modulos/ordem_de_servico/banco_de_dados/subgrupo_os.json';

        // Lê o conteúdo do arquivo JSON
        $jsonGrupos = file_get_contents($arquivoGrupos);
        
        // Decodifica o JSON em uma array
        $arrayGrupossub = json_decode($jsonGrupos);
        
        $chaveDesejada = $subgrupo; // Chave desejada para buscar o nome
        
        // Percorre a array de grupos para encontrar o nome do grupo correspondente à chave desejada
        foreach ($arrayGrupossub as $subgrupoLoop) {
            if ($subgrupoLoop->chave == $chaveDesejada) {
                $subgrupo = $subgrupoLoop->nome;
                break; // Interrompe o loop assim que o grupo for encontrado
            }
        }
        
        
        
        $nome = $array[0]->nome;
        $email = $array[0]->email;
        $telefone = $array[0]->telefone;

        // Aqui você pode utilizar os dados capturados para exibir na página ou realizar outras ações
        // Exemplo de exibição dos dados capturados4
        // in_array($grupo_dado, $_SESSION['grupo_os'])
       
       
            //só vai listar se atender as regras
            if($email_sessao == $array[0]->email or $_SESSION['tipo_usuario'] == 3 or in_array($grupo_dado, $_SESSION['grupo_os']) or $_SESSION['autorizacao_cargo'] == 3  ){
            echo '<tr>
                    <td><a href="?bt=os&os='.$os.'"><strong>' . $os . '</strong></a></td>
                    <td>' . $nome_status[$status_os] . '</td>
                    <td>' . $tipo . '</td>
                    <td>' . $data_abertura . '</td>
                    <td>' . $data_conclusao . '</td>
                    <td>' . $grupo . '</td>
                    <td>' . $nome . '</td>
                   
                </tr>';
            }
    }
}




// Fecha a tabela
echo '</table>';

?>