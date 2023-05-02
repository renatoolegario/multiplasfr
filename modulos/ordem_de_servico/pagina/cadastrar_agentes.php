
      
      <div class="row my-4">
        <div class="col-lg-12 col-md-6">
          <div class="card shadow-xs border">
            <div class="card-header border-bottom pb-0">
              <div class="d-sm-flex align-items-center mb-3">
                <div>
                  <h6 class="font-weight-semibold text-lg mb-0">Agentes</h6>
                  <p class="text-sm mb-sm-0 mb-2">Veja abaixo a listagem dos agentes</p>
                  <span id="resposta"></span>
                </div>
                <div class="ms-auto d-flex">
                </br>
                <table>
                    <tr>
                        <td colspan="2">Lista de usuários da plataforma</td>
                    </tr>
                    
                    <tr>
                        <td>
                            <select class="form-control" id="novos_agentes">
                              <?php echo($option_usuarios);?>
                            </select>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-dark btn-icon d-flex align-items-center mb-0" id="add_agente">Adicionar</button>
                        </td>
                    </tr>
                </table>
                
                
                
                  
                </div>
              </div>
            </div>
            <div class="card-body px-0 py-0">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                  <thead class="bg-gray-100">
                    <tr>
                      <th class="text-secondary text-xs font-weight-semibold opacity-7">#</th>
                      <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Atendente</th>
                      <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Cargo</th>
                      <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Equipe</th>
                      <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">OS atendidas</th>
                      <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">OS em aberto</th>
                      <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                     
                      <?php echo($tabela_agentes); ?>
                   
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      
   
      <?php include("modulos/ordem_de_servico/ajax/adicionar_agente.php"); ?>
      
      <?php include("modulos/ordem_de_servico/ajax/alterar_cargo_de_agente.php"); ?>
      
      
      <?php include("modulos/ordem_de_servico/ajax/alterar_equipe_de_agente.php"); ?>