 
 <script>
     
     window.addEventListener('load', function() {
      testar_api_onload("<?php echo($_SESSION['chave'] ); ?>");
    });
     
     
 </script>
 
 
   <style>
                  .titulo_des{
                      font-size: 0.875rem !important;
                      color:#007aff;
                      font-weight: bold;
                  }
                  
                  .invisivel{
                      display: none;
                   }
                  
              </style>
 
 <div class="row">
        <div class="col-md-12">
          <div class="d-md-flex align-items-center mb-3 mx-2">
            <div class="mb-md-0 mb-3">
              <h3 class="font-weight-bold mb-0">Olá, <?php echo($_SESSION['nome'] ); ?></h3>
              <p class="mb-0">Bom sucesso!</p>
            </div>
            </div>
        </div>
      </div>
      
      <hr class="my-0">
      
      
      
      <div class="row my-4">
        <div class="col-lg-4 col-md-6 mb-md-0 mb-4">
          <div class="card shadow-xs border h-100">
            <div class="card-header pb-0">
              <h6 class="font-weight-semibold text-lg mb-0">Configurações</h6>
              <p class="text-sm">Cole sua chave de API do ASAAS abaixo</p>
             
              <span class="invisivel" id="errado">
                          <svg width="12" height="12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="me-1ca">
                            <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 6a.75.75 0 00-1.5 0v6c0 .414.336.75.75.75h4.5a.75.75 0 000-1.5h-3.75V6z" clip-rule="evenodd"></path>
                          </svg>
                          Chave incorreta, não vinculado
             </span>
             
             
             <span class="invisivel" id="correto">
                          <svg width="12" height="12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="me-1ca">
                            <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 6a.75.75 0 00-1.5 0v6c0 .414.336.75.75.75h4.5a.75.75 0 000-1.5h-3.75V6z" clip-rule="evenodd"></path>
                          </svg>
                          API conectada
             </span>
             
             
              <table>
                  <tr>
                      <td>
                         <input type="password" id="key_asaas" placeholder="Chave API ASAAS" class="form-control" value="" onBlur="testar_api('<?php echo($_SESSION['chave'] ); ?>');">
                      </td>
                      <td>
                      <button type="button" class="btn btn-sm btn-dark btn-icon d-flex align-items-center mb-0" onclick="alterar();">
                    <span class="btn-inner--icon">
                        
                        
                                 <svg height="16" width="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                              <path d="M4.5 3.75a3 3 0 00-3 3v.75h21v-.75a3 3 0 00-3-3h-15z"></path>
                              <path fill-rule="evenodd" d="M22.5 9.75h-21v7.5a3 3 0 003 3h15a3 3 0 003-3v-7.5zm-18 3.75a.75.75 0 01.75-.75h6a.75.75 0 010 1.5h-6a.75.75 0 01-.75-.75zm.75 2.25a.75.75 0 000 1.5h3a.75.75 0 000-1.5h-3z" clip-rule="evenodd"></path>
                            </svg>
                            
                            
                    </span>
                   
                  </button>
                      </td>
                  </tr>
              </table>
              
            
              
              <span id="resposta_api" class="text-sm mb-sm-0 mb-2"></span>
              
              
            </div>
           
          </div>
        </div>
        <div class="col-lg-8 col-md-6">
          <div class="card shadow-xs border">
            <div class="card-header border-bottom pb-0">
              <div class="d-sm-flex align-items-center mb-3">
                <div>
                  <h6 class="font-weight-semibold text-lg mb-0">Relatórios</h6>
                  <p class="text-sm mb-sm-0 mb-2">Veja os relatórios e emita cobranças</p>
                </div>
                
                <div class="ms-auto d-flex">
                  <a href="?bt=cobrancas&ac=clientes" class="btn btn-sm btn-white mb-0 me-2">
                    Clientes
                  </a>
                  <button type="button" class="btn btn-sm btn-dark btn-icon d-flex align-items-center mb-0">
                    <span class="btn-inner--icon">
                      <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="d-block me-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                      </svg>
                    </span>
                    <span class="btn-inner--text">Nova Cobrança</span>
                  </button>
                </div>
                
                
              </div>
              <div class="pb-3 d-sm-flex align-items-center">
                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                  <input type="radio" class="btn-check" name="btnradiotable" id="btnradiotable1" autocomplete="off" checked>
                  <label class="btn btn-white px-3 mb-0" for="btnradiotable1">Em aberto</label>
                  
                  <input type="radio" class="btn-check" name="btnradiotable" id="btnradiotable4" autocomplete="off">
                  <label class="btn btn-white px-3 mb-0" for="btnradiotable4">Recebidas</label>
                  
                  
                  <input type="radio" class="btn-check" name="btnradiotable" id="btnradiotable3" autocomplete="off">
                  <label class="btn btn-white px-3 mb-0" for="btnradiotable3">Atrasadas</label>
                </div>
               
              </div>
              
               <div class="input-group w-sm-100 ms-auto">
                  <span class="input-group-text text-body">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"></path>
                    </svg>
                  </span>
                  <input type="text" class="form-control" placeholder="Pesquisar">
                </div>
                
                
                
                
                
                <hr>
            </div>
          
          
          <!-- aqui fará os include de cada página -->
          
          <?php
          
            if($_GET['ac'] == "clientes"){include("clientes.php");}
          
          ?>
          
          
          </div>
        </div>
      </div>
      
      
      
      
      
      
      <?php
      
      include("modulos/cobranca_ASAAS/ajax/testar_api.php");
      include("modulos/cobranca_ASAAS/ajax/cadastro_de_novo_cliente.php");
      ?>
      
      