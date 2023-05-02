<?php

session_destroy();

?>

 <!-- End Navbar -->
  <div class="page-header section-dark" style="background-image: url('template/assets/img/antoine-barres.jpg')">
    <div class="filter"></div>
    <div class="content-center">
        
        
        <div class="row">
          <div class="col-lg-12 col-md-6 mx-auto"  >
            <div class="card card-register" style="background-color: rgba(20, 18, 18, 0.5);">
             
             <span id="log_erro"></span>
             
                <label>Email</label>
                <div class="input-group form-group-no-border">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="nc-icon nc-email-85"></i>
                    </span>
                  </div>
                  <input type="email" class="form-control" id="email" placeholder="Email">
                </div>
                <label>Senha</label>
                <div class="input-group form-group-no-border">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="nc-icon nc-key-25"></i>
                    </span>
                  </div>
                  <input type="password" class="form-control" id="senha" placeholder="Senha">
                </div>
                <button class="btn btn-danger btn-block btn-round" id="logar">Entrar</button>
              
              
               <a class="btn btn-warning btn-block btn-round" href="?bt=cadastro">Registrar</a>
              
              <div class="forgot">
                <a href="?bt=recuperacao" class="btn btn-link btn-danger">Esqueceu sua senha?</a>
              </div>
              
              
            </div>
            
          </div>
        </div>
     
     <!-- fim do login -->
     
     <?php include("modulos/usuario/ajax/02-validar_login.php"); ?>
        
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
  