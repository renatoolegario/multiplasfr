
<?php


if(!empty($_POST['nome']) and !empty($_POST['email']) and !empty($_POST['senha'])){
    
    $nome = $_POST['nome'];
    $email= $_POST['email'];
    $senha= $_POST['senha'];
    
    
    $pasta = "modulos/usuario/banco_de_dados/";
    
    include("../bibliotecas/00-Rotas/01-configuracoes_adm.php");
    
    
    
     function generateRandomKey($qtd) {
          $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
          $key = '';
          for ($i = 0; $i < $qtd; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $key .= chr(ord($characters[$index]));
          }
          return $key;
        }
    
        $id_arquivo = generateRandomKey(5).time().generateRandomKey(5); 
        $id_usuario = generateRandomKey(7).time().generateRandomKey(7); 
        $chave_api = generateRandomKey(15); 
    
    
        $data = array(
           "nome" => $nome,
            "telefone" => "",
            "cnpj_cpf" => "",
            "email" => $email,
            "senha" => $senha,
            "tipo_usuario" => "3",
            "cidade" => "",
            "cep" => "",
            "endereco" => "",
            "numero" => "",
            "complemento" => "",
            "recuperacao_senha" => "",
            "sessao" => "",
            "chave_api" => "",
            "chave" => $id_usuario,
            "chave_api_asaas" => ""
        );
    
    
        $json = json_encode($data);
        file_put_contents($pasta.$id_arquivo.'.json', $json);
        
        
    HEADER("LOCATION: index.php");
    
}


$modules = [
  'modulos/cobranca_ASAAS',
  'modulos/moeda_forex',
  'modulos/ordem_de_servico',
  'modulos/painel_controle',
  'modulos/servicos_e_produtos',
  'modulos/usuario'
];

$libera = 0;
foreach ($modules as $module) {
  if (is_dir($module)) {
   echo('<span class="instalacao">Módulo será instalado: '.$module.'</span></br>');
   
   if($module == 'modulos/usuario'){$libera = 1;}
   
  } else {
   echo('<span class="inexistente">Módulo não será instalado: '.$module.'</span></br>');
  }
}

echo('-----</br>');

if(!$libera == 1){
    echo('ERRO: Reinstale a pasta <strong>modulos/usuario</strong> </br>');
}else{
    
    //verifica se existe usuário administrativo cadastrado.
    // Caminho para a pasta dos arquivos JSON
$caminho = 'modulos/usuario/banco_de_dados/*.json';

// Padrão de nomeação de arquivo
$padrao = '/tipo_usuario\":\"3\"/';

// Contador de usuários com "tipo_usuario" igual a 3
$contador = 0;

// Obter uma lista dos arquivos JSON na pasta especificada
$arquivos = glob($caminho);

// Percorrer cada arquivo e verificar o campo "tipo_usuario"
foreach ($arquivos as $arquivo) {
  $conteudo = file_get_contents($arquivo);

  if (preg_match($padrao, $conteudo)) {
    $contador++;
  }
}

    // Exibir o número de usuários com "tipo_usuario" igual a 3
    echo "Número de usuários com 'tipo_usuario' igual a 3: " . $contador."</br>";
    echo("----</br>");
    if($contador == 0){
        
        echo('
       
        <table>
            <tr>
                <td>Nome</td>
                <td>E-mail</td>
                <td>Senha</td>
            </tr>
             <tr>
                 <form action="#" method="POST">
                <td>
                    
                     <input type="text"  name="nome"     required></td>
                <td><input type="email" name="email"    required></td>
                <td><input type="text"  name="senha"    required></td>
               
            </tr>
            
             <tr>
                <td colspan="3"><input type="submit" value-"Finalizar cadastro"> </form></td>
             
            </tr>
        </table>
         
        ');
        
        
    }else{
        echo("CONFIGURAÇÃO COMPLETA: </BR>Já possui usúario administrativo cadastro, favor deletar a pasta <strong>configuracao</strong>.");
    }


}


?>