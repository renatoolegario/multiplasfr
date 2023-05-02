 
   
  <?php include("modulos/ordem_de_servico/ajax/api_listar_subgrupos.php"); ?>
  <?php include("modulos/ordem_de_servico/api/cadastrar_nova_os.php"); ?>
 
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
 
  
        
     <?php include("modulos/ordem_de_servico/api/lista_grupos.php"); ?>  
     
   

             
              <form class="register-form" method="POST">
                   <label>Abrir chamado para:</label> <span id="nome_e"></span></br>
                  <select class="form-control" onBlur="procurar_subgrupos();" id="grupos" name="grupo" required>
                      <?php echo($option_grupo); ?>
                  </select>
                  </br>
                  
                  <!-- aqui fará a inclusão das opções dos grupos -->
                  
                  
                  
                  <select class="form-control" id="sub_grupos" name="subgrupo">
                      <?php echo($option_grupo); ?>
                  </select>
                  </br>
                  
                  
                  <!-- fim --> 
                 
                  
                  <label>Descrição da ordem de serviço</label> <span id="ordem_e"></span>
                <div class="input-group form-group-no-border">
                 
                  <textarea class="form-control" name="descricao" style="height: 150px;"></textarea>
                </div>
                  
               
                  <input type="hidden" name="nome" class="form-control" placeholder="Nome" id="nome" value="<?php echo($_SESSION['nome'] ); ?>">
                
                
               
                  <input type="hidden" name="telefone" class="form-control" placeholder="Telefone" id="telefone" value="<?php echo( $_SESSION['telefone']); ?>">
              
                
               
                  <input type="hidden" name="email" class="form-control" placeholder="Email" id="email" value="<?php echo( $_SESSION['email']); ?>">
                
                
                
            </br>
              
               <input type="submit" class="btn btn-warning btn-block btn-round" id="btn-cadastrar" value="Registrar">
          
              
                </form>
           

  
  