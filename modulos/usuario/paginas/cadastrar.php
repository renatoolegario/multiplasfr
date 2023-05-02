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
 
  <div class="page-header section-dark" style="background-image: url('template/assets/img/antoine-barres.jpg')">
    <div class="filter"></div>
    <div class="content-center">
        
        
        
        
        <div class="row">
            
          <div class="col-lg-12 col-md-6 mx-auto"  >
            <div class="card card-register" style="background-color: rgba(20, 18, 18, 0.5);">
             
              <form class="register-form">
                  <span id="resposta"></span></br>
                  <label>Nome</label> <span id="nome_e"></span>
                <div class="input-group form-group-no-border">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="nc-icon nc-single-02"></i>
                    </span>
                  </div>
                  <input type="text" name="nome" class="form-control" placeholder="Nome" id="nome">
                </div>
                
                <label>Telefone</label> <span id="telefone_e" ></span>
                <div class="input-group form-group-no-border">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="nc-icon nc-mobile"></i>
                    </span>
                  </div>
                  <input type="text" name="telefone" class="form-control" placeholder="Telefone" id="telefone">
                </div>
                
                    <label>CNPJ</label> <span id="cnpj_e"></span>
                <div class="input-group form-group-no-border">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="nc-icon nc-credit-card"></i>
                    </span>
                  </div>
                  <input type="number" name="cnpj_cpf" class="form-control" placeholder="CNPJ ou CPF" id="cnpj">
                </div>
                  
                <label>Email</label> <span id="email_e"></span>
                <div class="input-group form-group-no-border">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="nc-icon nc-email-85"></i>
                    </span>
                  </div>
                  <input type="email" name="email" class="form-control" placeholder="Email" id="email">
                </div>
                
                <label>Senha</label> <span id="senha_e"></span>
                <div class="input-group form-group-no-border">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="nc-icon nc-key-25"></i>
                    </span>
                  </div>
                  <input type="password" name="senha" class="form-control" placeholder="Senha" id="senha">
                </div>
                
              </form>
              
               <button class="btn btn-warning btn-block btn-round" id="btn-cadastrar">Registrar</button>
          
              
              
            </div>
            
          </div>
        </div>
     
     <!-- fim do login -->
     
     
        
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
    <!--<h6 class="category category-absolute">Projetado e codificado por MultiplasFR-->
    </h6>
  </div>
  
  <?php include("modulos/usuario/ajax/01-cadastro_usuario.php"); ?>
  