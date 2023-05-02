 
   
  <?php include("modulos/ordem_de_servico/ajax/api_listar_subgrupos.php"); ?>
  <?php include("modulos/ordem_de_servico/api/cadastrar_nova_os.php"); ?>
  <?php include("modulos/ordem_de_servico/ajax/adicionar_mensagem_os.php");?>
  
 
 <!-- End Navbar -->
 
 <style>
     
     #loading {
  position: fixed;
  z-index: 9999;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5); /* fundo semi-transparente */
  display: flex;
  justify-content: center;
  align-items: center;
}

#loading img {
  width: 100px; /* ajuste o tamanho da imagem de acordo com sua necessidade */
}
     
     
 </style>
 
 <div id="loading" style=" display: none;  position: fixed;">
  <img src="imagem_site/Carregando.gif" alt="Carregando...">
</div>
 

              
               <?php 
         if(!empty($_GET['os_num']) or !empty($_GET['email'])){
         
            $os_ver = $_GET['os_num'];
             //verifica se a os é do e-mail se for libera
             $endereco_os = 'modulos/ordem_de_servico/banco_de_dados/os/'.$os_ver.'.json';
            $json_string = file_get_contents($endereco_os);
    
            // Decodifica o JSON em um objeto PHP
            $json_obj = json_decode($json_string);
            
            // Verifica se o e-mail é igual a "x"
            if ($json_obj[0]->email == $_GET['email']) {
               
               
               
               $array_os = json_decode($json_string, true);

                // Acessa os dados do array e armazena em variáveis PHP
                $os = $array_os[0]['os'];
                $tipo = $array_os[0]['tipo'];
                $data_abertura = date("d/m/Y",$array_os[0]['data_abertura']);
                $grupo = $array_os[0]['grupo'];
                $subgrupo = $array_os[0]['subgrupo'];
                $nome = $array_os[0]['nome'];
                $email = $array_os[0]['email'];
                $telefone = $array_os[0]['telefone'];
                
                $pasta_grupo = 'modulos/ordem_de_servico/banco_de_dados/grupo_os.json';
                $pasta_subgrupo = 'modulos/ordem_de_servico/banco_de_dados/subgrupo_os.json';
                
                
                $json = file_get_contents($pasta_grupo);
                $array = json_decode($json, true);
            
                $tamanho_array = count($array) -1;
                for ($i = 0; $i <= $tamanho_array; $i++) {
                    if($array[$i]['chave'] == $grupo){$grupo = $array[$i]['nome'];}
                }
                
                
                 $json = file_get_contents($pasta_subgrupo);
                $array = json_decode($json, true);
            
                $tamanho_array = count($array) -1;
                for ($i = 0; $i <= $tamanho_array; $i++) {
                    if($array[$i]['chave'] == $subgrupo){$subgrupo = $array[$i]['nome'];}
                }
                
                echo "<strong>Número da OS:</strong> " . $os . "<br>";
                echo "<strong>Data de Abertura:</strong> " . $data_abertura . "<br>";
                echo "<strong>Grupo:</strong> " . $grupo . "<br>";
                echo "<strong>Subgrupo:</strong> " . $subgrupo . "<br>";
                echo "<strong>Nome:</strong> " . $nome . "<br>";
                echo "<strong>E-mail:</strong> " . $email . "<br>";
                echo "<strong>Telefone:</strong> " . $telefone . "<br>";
               
               
                    $descricao = $array_os[0]['descricao'];
                    $tamanho = count($descricao)-1;
                   
                    for($i = 0; $i<= $tamanho; $i++){
                        $data = $descricao[$i]['data'];
                        $data = date("d/m/Y",$data);
                          echo($descricao[$i]['tipo']." - ".$data."</br>"); 
                          echo($descricao[$i]['mensagem']."</br>");
                          echo("</br>");
                           
                    }
                    
                    echo('</br>');
                    
                    echo('<textarea id="nova_msg" class="form-control" ></textarea></br>');
                    echo('<button class="btn btn-info btn-block btn-round" onClick="add_msg(\''.$os_ver.'\',50);">Enviar mensagem</button>');
                    
               
               
               
               
            } else {
                // Faça algo se o e-mail for diferente de "x"
                echo "Esta OS não pertence a este e-mail";
                echo(' <form class="register-form" method="GET">
              <label>Número da OS</label> 
                  <input type="text" name="os_num" class="form-control" placeholder="Ordem de serviço" id="os">
                <input type="hidden" name="bt" value="os">
                <input type="hidden" name="acao" value="acompanhar_os">
              
                  <input type="hidden" value="'.$_SESSION['email'].'" name="email" class="form-control" placeholder="E-mail" id="email">
                </br>
                 <input type="submit" class="btn btn-warning btn-block btn-round" id="btn-cadastrar" value="Acompanhar">
             
             
             </form>');
            }
         
         }else{
             
             echo(' <form class="register-form" method="GET">
              <label>Número da OS</label> 
                  <input type="text" name="os_num" class="form-control" placeholder="Ordem de serviço" id="os">
                  <input type="hidden" name="bt" value="os">
                <input type="hidden" name="acao" value="acompanhar_os">
              
                  <input type="hidden" value="'.$_SESSION['email'].'" name="email" class="form-control" placeholder="E-mail" id="email">
                </br>
                 <input type="submit" class="btn btn-warning btn-block btn-round" id="btn-cadastrar" value="Acompanhar">
             
             
             </form>');
             
         } 
     ?>
              
          