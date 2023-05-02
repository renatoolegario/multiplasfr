
<?php
// Caminho da pasta com os arquivos JSON
$pasta = 'modulos/ordem_de_servico/banco_de_dados/os/';
$email_sessao = $_SESSION['email'];

// Array para armazenar a contagem agrupada por status
$contagemPorStatus = [];

// Função para ler os arquivos JSON em uma pasta

    $arquivos = glob($pasta . '*.json'); // Obtém os nomes dos arquivos JSON na pasta

    

    foreach ($arquivos as $arquivo) {
        
        $json = file_get_contents($arquivo); // Lê o conteúdo do arquivo JSON
        $array = json_decode($json); // Decodifica o JSON em uma array

        // Verifica se a array possui o índice 'status'
        //aqui colocar a verificação se o email é igual a sessao['email'] ou se o tipo_usuario = 3 , ou se a chave da equipe do atendente é a que esta vinculada no departamento do grupo da OS ou se o cargo do atendente possui o perfil MASTER se atender qualquer um destes faz a contagem o mesmo vale para parte a listagem e para liberar a OS para o usuário
        //Primeira verificação email da abertura = email logado ? $email_sessao == $array[0]->email
        //Segunda verificação tipo do usuário logado possui perfil administrativo ? $_SESSION['tipo_usuario'] == 3
        //Terceira verificação se o grupo da OS existe na sessão de liberação do usuário logado
        //Quarta verifica se a autorização do cargo do usuário logado é MASTER
        
        
        if (isset($array[0]->status_os) and ($email_sessao == $array[0]->email or $_SESSION['tipo_usuario'] == 3 or in_array($array[0]->grupo, $_SESSION['grupo_os']) or $_SESSION['autorizacao_cargo'] == 3  )) {
           
            $status = $array[0]->status_os;
            
            $contagemPorStatus[$status]++;
        }
    }


$nome_status[1] = 'Aberto';
$nome_status[2] = 'Finalizado completo';
$nome_status[3] = 'Em atendimento';
$nome_status[4] = 'Finalizado pelo atendente';

$status_number = count($nome_status);


for ($i = 1; $i <= $status_number; $i++){
    
    $qtd = $contagemPorStatus[$i];
    
    if($qtd == ''){$qtd = 0;}
    
      echo('
    <div class="col-xl-3 col-sm-6 mb-xl-0">
          <div class="card border shadow-xs mb-4">
            <div class="card-body text-start p-3 w-100">
              
              <div class="row">
                <div class="col-12">
                  <div class="w-100">
                    <p class="text-sm text-secondary mb-1">'.$nome_status[$i].'</p>
                    <h4 class="mb-2 font-weight-bold"><a href="?bt=os&status='.$i.'">'.$qtd.'</a></h4>
                    <div class="d-flex align-items-center">
                     
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    
    
    ');
    
    
}

?>

