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
 
 <!-- End Navbar -->
  <div class="page-header section-dark" style="background-image: url('template/assets/img/antoine-barres.jpg')">
    <div class="filter"></div>
    <div class="content-center">
        
        <!-- aqui inicia-se o envio da recuperação (a primeira parte) -->
        <div class="row" id="enviado" style="display: none;">
          <div class="col-lg-12 col-md-6 mx-auto"  >
            <div class="card card-register" style="background-color: rgba(20, 18, 18, 0.5);">
             
                <span >
                   Agora verifique sua caixa de entrada no e-mail e clique no link de recuperação da senha.</br></br>
                   Caso não tenha recebido, verifique sua caixa de SPAM.
               </span>
               
               </br>
                
             
              <div class="forgot">
                <a href="?bt=login" class="btn btn-link btn-danger">Página de login</a>
              </div>
              
              
            </div>
            
          </div>
        </div>
        
        <div class="row" id="senha_alterada" style="display: none;">
          <div class="col-lg-12 col-md-6 mx-auto"  >
            <div class="card card-register" style="background-color: rgba(20, 18, 18, 0.5);">
             
                <span >
                   Senha alterada com sucesso!</br></br>
                   Faça o login no sistema utilizando o link abaixo.
               </span>
               
               </br>
                
             
              <div class="forgot">
                <a href="?bt=login" class="btn btn-link btn-danger">Página de login</a>
              </div>
              
              
            </div>
            
          </div>
        </div>
        
        <?php
        
        if(empty($_GET['rec'])){
            
            echo('
             <div class="row" id="recuperacao">
          <div class="col-lg-12 col-md-6 mx-auto"  >
            <div class="card card-register" style="background-color: rgba(20, 18, 18, 0.5);">
             
                
             
                <div>
                   Digite o endereço de e-mail da sua conta de usuário e enviaremos um link de redefinição de senha.
               </div></br>
                <div class="input-group form-group-no-border">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="nc-icon nc-email-85"></i>
                    </span>
                  </div>
                  <input type="email" class="form-control" id="email" placeholder="Qual o seu e-mail ?">
                </div>
               
              
               
                <button class="btn btn-danger btn-block btn-round" id="recuperar">Recuperar</button>
              
             
              <div class="forgot">
                <a href="?bt=login" class="btn btn-link btn-danger">Página de login</a>
              </div>
              
              
            </div>
            
          </div>
        </div>
            
            ');
            
        }else{
            
           $rec = $_GET['rec'];
           $recu_valido = false;
           $pasta = "modulos/usuario/banco_de_dados/";
         
            
              foreach (glob($pasta."*.json") as $arquivo) {
                // Lê o conteúdo do arquivo e converte para um objeto JSON
                $json = file_get_contents($arquivo);
                $dados = json_decode($json, true);
            
                // Verifica se o e-mail e a senha estão cadastrados neste arquivo
                if ($dados['recuperacao_senha'] == $rec) {
                    $recu_valido = true;
                    $nome_arquivo = basename($arquivo);
                    break;
                }
            }
    
            
            
           
            echo('
            
            <div class="row" id="alterar_senha">
          <div class="col-lg-12 col-md-6 mx-auto"  >
            <div class="card card-register" style="background-color: rgba(20, 18, 18, 0.5);">
             
               '); 
             
             if($recu_valido == true){
                 echo('
                <div>
                  Pronto, vamo para segunda etapa.</br>
                  Digite uma nova senha para acessar o sistema.
                  
               </div></br>
               
               <span id="log_erro"></span>
               
                <div class="input-group form-group-no-border">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="nc-icon nc-key-25"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control" id="senha" placeholder="Digite sua nova senha">
                  <input type="hidden" id="validacao_con" value="'.$rec.'">
                </div>
               
              
               
                <button class="btn btn-danger btn-block btn-round" id="alterar">Alterar senha</button>
              ');
             }else{
                 
                 echo('
                 
                  <div>
                         Seu código de recuperação expirou.</br>
                   </div>
                 
                 ');
                 
             }
             
              echo('
             
              <div class="forgot">
                <a href="?bt=login" class="btn btn-link btn-danger">Página de login</a>
              </div>
              
              
            </div>
            
          </div>
        </div>
            
            ');
            
        }
        
        ?>
        
       
     
        <!-- fim da primeira parte -->
        
        
        
        
     
     <!-- fim do login -->
     
     
        <?php include("modulos/usuario/ajax/03-recuperacao_senha.php"); ?>
        <?php include("modulos/usuario/ajax/03-alterar_senha.php"); ?>
     
        
      <div class="container"  >
        <div class="title-brand">
          <!--<h1 class="presentation-title"> <?php echo($nome_sistema); ?></h1> -->
          <div class="fog-low">
            <img src="template/assets/img/fog-low.png" alt="" >
          </div>
          <div class="fog-low right">
            <img src="template/assets/img/fog-low.png" alt="">
          </div>
        </div>
        <!-- <h2 class="presentation-subtitle text-center">Make your mark with a Free Bootstrap 4 UI Kit! </h2> -->
      </div>
    </div>
    <div class="moving-clouds" style="background-image: url('template/assets/img/clouds.png');z-index:-1; "  ></div>
    <h6 class="category category-absolute">Projetado e codificado por MultiplasFR
    </h6>
  </div>
  