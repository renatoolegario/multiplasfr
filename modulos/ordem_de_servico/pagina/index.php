<?php 

    
    include("modulos/ordem_de_servico/api/lista_equipes.php");
    include("modulos/ordem_de_servico/api/lista_usuarios_da_plataforma.php"); 
    include("modulos/ordem_de_servico/api/lista_cargos.php");
    include("modulos/ordem_de_servico/api/lista_agentes.php");
    include("modulos/ordem_de_servico/api/lista_departamentos.php");
    include("modulos/ordem_de_servico/api/lista_grupos.php");
    include("modulos/ordem_de_servico/api/lista_subgrupos.php");
    
    


?>  
  
      <div class="row">
        <div class="col-md-12">
          <div class="d-md-flex align-items-center mb-3 mx-2">
            <div class="mb-md-0 mb-3">
              <h3 class="font-weight-bold mb-0">Olá, 
               <?php echo($_SESSION['nome'] ); ?>
              
              
              </h3>
              <p class="mb-0">Bom sucesso!</p>
            </div>
          
             <a href="?bt=os&acao=nova_os" class="btn btn-sm btn-white btn-icon d-flex align-items-center mb-0 ms-md-auto mb-sm-0 mb-2 me-2">
              <span class="btn-inner--icon">
                <span class="p-1 bg-success rounded-circle d-flex ms-auto me-2">
                  <span class="visually-hidden">New</span>
                </span>
              </span>
              <span class="btn-inner--text">Nova OS</span>
            </a>
            <!--
            <a href="?bt=os&acao=acompanhar_os" class="btn btn-sm btn-dark btn-icon d-flex align-items-center mb-0">
              <span class="btn-inner--icon">
                <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="d-block me-2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                </svg>
              </span>
              <span class="btn-inner--text">Acompanhar OS</span>
            </a>
            -->
            </div>
        </div>
      </div>
      
      <hr class="my-0">
     
     
     <div class="row">
         
        <?php include("acompanhar_os_atendente.php"); ?>
         
     </div>
     
    <div class="row">
        <div class="col-lg-12 col-md-6">
            

    <?php
    
    //aqui vai ser para criar uma nova OS 
    
    if(!empty($_GET['acao'])){
        
        if($_GET['acao'] == 'nova_os'){
            include("nova_os.php");
        }
        if($_GET['acao'] == 'acompanhar_os'){
            include("acompanhar_os.php");
        }
        
    }
    
   
   if(empty($_GET['status']) and empty($_GET['os']) and empty($_GET['acao']) and ($_SESSION['tipo_usuario'] == 3 or $_SESSION['autorizacao_cargo'] == 3 )){
        
        include("cadastrar_grupos_os.php");
        include("cadastrar_sub_grupos.php");
        include("cadastrar_departamentos.php");
        include("autorizacao.php");
        include("cadastrar_cargos.php");
        include("cadastrar_equipes.php");
        include("cadastrar_agentes.php");
   }
   
   if(!empty($_GET['os'])){
        echo('<div class="card shadow-xs border">');
        include("dados_da_os.php");
        echo('</div>');
   }
   
   if(!empty($_GET['status'])){
        echo('<div class="card shadow-xs border">');
        include("listagem_os_por_status.php");
        echo('</div>');
       
   }
    
    
 
    ?>
        
    </div>
</div>