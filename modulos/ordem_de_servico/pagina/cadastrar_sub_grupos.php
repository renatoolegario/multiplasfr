   
      <div class="row my-4">
        <div class="col-lg-12 col-md-6">
          <div class="card shadow-xs border">
            <div class="card-header border-bottom pb-0">
              <div class="d-sm-flex align-items-center mb-3">
                <div>
                  <h6 class="font-weight-semibold text-lg mb-0">Sub Grupos</h6>
                  <p class="text-sm mb-sm-0 mb-2">Abaixos todos os grupos de Sub grupos</p>
                  <span id="resposta_subgrupo"></span>
                </div> 
                <div class="ms-auto d-flex">
              
              
                <table>
                        <tr>
                            <td>Nome do subgrupo</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>   
                                <input type="text" id="nome_sub_grupo" class="form-control"  placeholder="Digite aqui a descrição do sub grupo">
                            </td>
                            <td>
                                 <button class="btn btn-sm btn-dark btn-icon d-flex align-items-center mb-0" id="add_subgrupo_os">Adicionar</button>
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
                      <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Descrição</th>
                      
                      <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Grupo</th>
                      <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                      
                 
                       <?php echo($tabela_sub_grupos_os); ?>
                   
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      
   
      
      <?php include("modulos/ordem_de_servico/ajax/adicionar_novo_subgrupo.php"); ?>
      
      <?php include("modulos/ordem_de_servico/ajax/alterar_nome_subgrupo.php"); ?>
      
      <?php include("modulos/ordem_de_servico/ajax/alterar_grupo_subgrupo.php"); ?>
      