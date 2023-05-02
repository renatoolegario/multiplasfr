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
        <div class="col-lg-12 col-md-6">
          <div class="card shadow-xs border">
            <div class="card-header border-bottom pb-0">
              <div class="d-sm-flex align-items-center mb-3">
                <div>
                  <h6 class="font-weight-semibold text-lg mb-0">Dados do sistema</h6>
                  <p class="text-sm mb-sm-0 mb-2">Configure abaixo os dados do sistema</p>
                  <span id="resposta"></span>
                </div>
                <div class="ms-auto d-flex">
              
                
                </div>
              </div>
            </div>
            <div class="card-body px-0 py-0">
              <div class="table-responsive p-0">
                  
                <table class="table align-items-center justify-content-center mb-0">
                  <thead class="bg-gray-900">
                    <tr>
                      <th class="text-light text-xs font-weight-semibold opacity-7" >Descrição</th>
                      <th class="text-light text-xs font-weight-semibold opacity-7">Alterações</th>
                      <th class="text-light text-xs font-weight-semibold opacity-7">Ação</th>
                  </thead>
                  <tbody>
                      <tr>
                          <td class="bg-gray-900"><span class="text-light text-xs font-weight-semibold opacity-7">Nome do sistema</span></td>
                          <td class="bg-gray-900">
                              <input type="text" class="form-control" value="<?php echo($nome_site); ?>" id="nome_sistema">
                          </td>
                           <td class="bg-gray-900"><button onclick="alt_dados('nome_sistema');">Alterar</button></td>
                      </tr>
                       <tr>
                          <td class="bg-gray-900"><span class="text-light text-xs font-weight-semibold opacity-7">Link do sistema</span></td>
                          <td class="bg-gray-900">
                           <input type="text" class="form-control" value="<?php echo($link_site); ?>"  id="link_sistema">
                          </td>
                          <td class="bg-gray-900"><button onclick="alt_dados('link_sistema');">Alterar</button></td>
                      </tr>
                  </tbody>
                  
                </table>
                <hr>
                <p class="text-sm mb-sm-0 mb-2">Configure abaixo os dados do e-mail principal</p>
                
                <table class="table align-items-center justify-content-center mb-0">
                  <thead class="bg-gray-900">
                    <tr>
                      <th class="text-light text-xs font-weight-semibold opacity-7" >Descrição</th>
                      <th class="text-light text-xs font-weight-semibold opacity-7">Alterações</th>
                      <th class="text-light text-xs font-weight-semibold opacity-7">Ação</th>
                  </thead>
                  <tbody>
                      <tr>
                          <td class="bg-gray-900"><span class="text-light text-xs font-weight-semibold opacity-7" >Host do servidor web</span></td>
                          <td class="bg-gray-900">
                              <input type="text" class="form-control" value="<?php echo($host_email); ?>" id="host_email">
                          </td>
                           <td class="bg-gray-900"><button onclick="alt_dados('host_email');">Alterar</button></td>
                      </tr>
                      
                      <tr>
                          <td class="bg-gray-900"><span class="text-light text-xs font-weight-semibold opacity-7" >Porta servidor web</span></td>
                          <td class="bg-gray-900">
                              <input type="text" class="form-control" value="<?php echo($porta_smtp); ?>" id="porta_host">
                          </td>
                           <td class="bg-gray-900"><button onclick="alt_dados('porta_host');">Alterar</button></td>
                      </tr>
                      
                       <tr>
                          <td class="bg-gray-900"><span class="text-light text-xs font-weight-semibold opacity-7" >Rementente</span></td>
                          <td class="bg-gray-900">
                           <input type="text" class="form-control" value="<?php echo($remetente_do_email); ?>" id="remetente_email">
                          </td>
                           <td class="bg-gray-900"><button onclick="alt_dados('remetente_email');">Alterar</button></td>
                      </tr>
                      
                      <tr>
                          <td class="bg-gray-900"><span class="text-light text-xs font-weight-semibold opacity-7" >E-mail</span></td>
                          <td class="bg-gray-900">
                           <input type="text" class="form-control" value="<?php echo($username); ?>" id="email_envio">
                          </td>
                           <td class="bg-gray-900"><button onclick="alt_dados('email_envio');">Alterar</button></td>
                      </tr>
                      
                      
                       <tr>
                          <td class="bg-gray-900"><span class="text-light text-xs font-weight-semibold opacity-7">Senha</span></td>
                          <td class="bg-gray-900">
                           <input type="text" class="form-control" value="<?php echo($password); ?>"  id="senha_email">
                          </td>
                           <td class="bg-gray-900"><button onclick="alt_dados('senha_email');">Alterar</button></td>
                      </tr>
                      
                      
                       <tr>
                          <td class="bg-gray-900"><span class="text-light text-xs font-weight-semibold opacity-7">Enviar e-mail de teste</span></td>
                          <td class="bg-gray-900">
                           <input type="text" class="form-control"  id="email_teste">
                          </td>
                           <td class="bg-gray-900"><button onclick="teste_de_email();">Enviar</button></td>
                      </tr>
                      
                      
                  </tbody>
                  
                </table>
                
                <hr>
                <p class="text-sm mb-sm-0 mb-2">Configure abaixo os dados para os novos cadastros</p>
                
                <table class="table align-items-center justify-content-center mb-0">
                  <thead class="bg-gray-900">
                    <tr>
                      <th class="text-light text-xs font-weight-semibold opacity-7" >Descrição</th>
                      <th class="text-light text-xs font-weight-semibold opacity-7">Alterações</th>
                      <th class="text-light text-xs font-weight-semibold opacity-7">Ação</th>
                  </thead>
                  <tbody>
                      <tr>
                          <td class="bg-gray-900"><span class="text-light text-xs font-weight-semibold opacity-7">Valor mensal padrão</span></td>
                          <td class="bg-gray-900">
                              <input type="number" class="form-control" value="<?php echo($valor_base); ?>"  id="valor_base">
                          </td>
                           <td class="bg-gray-900"><button onclick="alt_dados('valor_base');">Alterar</button></td>
                      </tr>
                   
                   
                    <tr>
                          <td class="bg-gray-900"><span class="text-light text-xs font-weight-semibold opacity-7">Tempo gratuito para teste</span></td>
                          <td class="bg-gray-900">
                             <input type="number" class="form-control" value="<?php echo($tempo_gratis); ?>"  id="tempo_gratis">
                          </td>
                           <td class="bg-gray-900"><button onclick="alt_dados('tempo_gratis');">Alterar</button></td>
                      </tr>
                  
                   
                  </tbody>
                  
                </table>
                
                
                <hr>
                <p class="text-sm mb-sm-0 mb-2">Configure abaixo os dados da API do ASAAS</p>
                
                <table class="table align-items-center justify-content-center mb-0">
                  <thead class="bg-gray-900">
                    <tr>
                      <th class="text-light text-xs font-weight-semibold opacity-7" >Descrição</th>
                      <th class="text-light text-xs font-weight-semibold opacity-7">Alterações</th>
                      <th class="text-light text-xs font-weight-semibold opacity-7">Ação</th>
                  </thead>
                  <tbody>
                      <tr>
                          <td class="bg-gray-900"><span class="text-light text-xs font-weight-semibold opacity-7">Chave da API</span></td>
                          <td class="bg-gray-900">
                              <textarea class="form-control" id="api_asaas"><?php echo($api_key_asaas); ?></textarea>
                          </td>
                           <td class="bg-gray-900"><button onclick="alt_dados('api_asaas');">Alterar</button></td>
                      </tr>
                   
                    <tr>
                          <td class="bg-gray-900" colspan="2"><span class="text-light text-xs font-weight-semibold opacity-7">Teste chave API</span></td>
                          
                           <td class="bg-gray-900"><button onclick="api_asaas();">Testar API</button></td>
                      </tr>
                   
                  </tbody>
                  
                </table>
                
                
              </div>
            </div>
          </div>
        </div>
      </div>
      
      
      <?php include("modulos/painel_controle/ajax/alterar_dados.php"); ?>
      <?php include("modulos/painel_controle/ajax/teste_de_envio_email.php"); ?>
      <?php include("modulos/painel_controle/ajax/teste_api_asaas.php"); ?>
      
      
      