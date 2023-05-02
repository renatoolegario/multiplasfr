  <div class="card-body px-0 py-0">
      
      <div style="margin:2%;">
          
          <script>
              
              function alt_inv(){
                  document.getElementById("table_add_clente").className = "a";
              }
              
          </script>
          
     <button class="btn btn-sm btn-warning btn-icon d-flex align-items-center mb-0" style="margin:2%;" onClick="alt_inv();">Novo Cliente</button>
     <table class="invisivel" style="width:70%;" id="table_add_clente" >
         <tr>
             <td>Nome *</td><td><input type="text" name="nome" class="form-control" id="nome"></td>
         </tr>
         <tr>
             <td>E-mail *</td><td><input type="text" name="email" class="form-control" id="email"></td>
         </tr>
        <tr>
            <td>Telefone *</td><td><input type="text" name="telefone" class="form-control" id="telefone"></td>
        </tr>
        <tr>
            <td>CPF/CNPJ * </td><td><input type="text" name="cpf" class="form-control" id="cpf"></td>
        </tr>
        <tr>
            <td>CEP</td><td><input type="text" name="cep" class="form-control" id="cep"></td>
        </tr>
        <tr>
            <td>Endereço</td><td><input type="text" name="endereco" class="form-control" id="endereco"></td>
        </tr>
        <tr>
            <td>Número</td><td><input type="text" name="numero" class="form-control" id="numero"></td>
        </tr>
        <tr>
            <td>Complemento</td><td><input type="text" name="complemento" class="form-control" id="complemento"></td>
        </tr>
        <tr>
            <td>Cidade</td><td><input type="text" name="cidade" class="form-control" id="cidade"></td>
        </tr>
        <tr>
           <td>Estado</td><td><input type="text" name="estado" class="form-control" id="estado"></td>   
        </tr> 
        <tr>
            <td colspan="2">
                 
     <button class="btn btn-sm btn-success btn-icon d-flex align-items-center mb-0" style="margin:2%;" onclick="cadastro_novo_cliente('<?php echo($_SESSION['chave'] ); ?>');">Cadastrar</button>
   
                
            </td>
        </tr>
            
         
     </table>
     
          
      </div>
      
    
      
      
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                  <thead class="bg-gray-100">
                    <tr>
                      <th class="text-secondary text-xs font-weight-semibold opacity-7">Transaction</th>
                      <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Amount</th>
                      <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Date</th>
                      <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Account</th>
                      <th class="text-center text-secondary text-xs font-weight-semibold opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <div class="d-flex px-2">
                          <div class="avatar avatar-sm rounded-circle bg-gray-100 me-2 my-2">
                            <img src="../assets/img/small-logos/logo-spotify.svg" class="w-80" alt="spotify">
                          </div>
                          <div class="my-auto">
                            <h6 class="mb-0 text-sm">Spotify</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-sm font-weight-normal mb-0">$2,500</p>
                      </td>
                      <td>
                        <span class="text-sm font-weight-normal">Wed 3:00pm</span>
                      </td>
                      <td class="align-middle">
                        <div class="d-flex">
                          <div class="border px-1 py-1 text-center d-flex align-items-center border-radius-sm my-auto">
                            <img src="../assets/img/logos/visa.png" class="w-90 mx-auto" alt="visa">
                          </div>
                          <div class="ms-2">
                            <p class="text-dark text-sm mb-0">Visa 1234</p>
                            <p class="text-secondary text-sm mb-0">Expiry 06/2026</p>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle">
                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-bs-toggle="tooltip" data-bs-title="Edit user">
                          <svg width="14" height="14" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.2201 2.02495C10.8292 1.63482 10.196 1.63545 9.80585 2.02636C9.41572 2.41727 9.41635 3.05044 9.80726 3.44057L11.2201 2.02495ZM12.5572 6.18502C12.9481 6.57516 13.5813 6.57453 13.9714 6.18362C14.3615 5.79271 14.3609 5.15954 13.97 4.7694L12.5572 6.18502ZM11.6803 1.56839L12.3867 2.2762L12.3867 2.27619L11.6803 1.56839ZM14.4302 4.31284L15.1367 5.02065L15.1367 5.02064L14.4302 4.31284ZM3.72198 15V16C3.98686 16 4.24091 15.8949 4.42839 15.7078L3.72198 15ZM0.999756 15H-0.000244141C-0.000244141 15.5523 0.447471 16 0.999756 16L0.999756 15ZM0.999756 12.2279L0.293346 11.5201C0.105383 11.7077 -0.000244141 11.9624 -0.000244141 12.2279H0.999756ZM9.80726 3.44057L12.5572 6.18502L13.97 4.7694L11.2201 2.02495L9.80726 3.44057ZM12.3867 2.27619C12.7557 1.90794 13.3549 1.90794 13.7238 2.27619L15.1367 0.860593C13.9869 -0.286864 12.1236 -0.286864 10.9739 0.860593L12.3867 2.27619ZM13.7238 2.27619C14.0917 2.64337 14.0917 3.23787 13.7238 3.60504L15.1367 5.02064C16.2875 3.8721 16.2875 2.00913 15.1367 0.860593L13.7238 2.27619ZM13.7238 3.60504L3.01557 14.2922L4.42839 15.7078L15.1367 5.02065L13.7238 3.60504ZM3.72198 14H0.999756V16H3.72198V14ZM1.99976 15V12.2279H-0.000244141V15H1.99976ZM1.70617 12.9357L12.3867 2.2762L10.9739 0.86059L0.293346 11.5201L1.70617 12.9357Z" fill="#64748B" />
                          </svg>
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex px-2">
                          <div class="avatar avatar-sm rounded-circle bg-gray-100 me-2 my-2">
                            <img src="../assets/img/small-logos/logo-invision.svg" class="w-80" alt="invision">
                          </div>
                          <div class="my-auto">
                            <h6 class="mb-0 text-sm">Invision</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-sm font-weight-normal mb-0">$5,000</p>
                      </td>
                      <td>
                        <span class="text-sm font-weight-normal">Wed 1:00pm</span>
                      </td>
                      <td class="align-middle">
                        <div class="d-flex">
                          <div class="border px-1 py-1 text-center d-flex align-items-center border-radius-sm my-auto">
                            <img src="../assets/img/logos/mastercard.png" class="w-90 mx-auto" alt="mastercard">
                          </div>
                          <div class="ms-2">
                            <p class="text-dark text-sm mb-0">Mastercard 1234</p>
                            <p class="text-secondary text-sm mb-0">Expiry 06/2026</p>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle">
                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-bs-toggle="tooltip" data-bs-title="Edit user">
                          <svg width="14" height="14" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.2201 2.02495C10.8292 1.63482 10.196 1.63545 9.80585 2.02636C9.41572 2.41727 9.41635 3.05044 9.80726 3.44057L11.2201 2.02495ZM12.5572 6.18502C12.9481 6.57516 13.5813 6.57453 13.9714 6.18362C14.3615 5.79271 14.3609 5.15954 13.97 4.7694L12.5572 6.18502ZM11.6803 1.56839L12.3867 2.2762L12.3867 2.27619L11.6803 1.56839ZM14.4302 4.31284L15.1367 5.02065L15.1367 5.02064L14.4302 4.31284ZM3.72198 15V16C3.98686 16 4.24091 15.8949 4.42839 15.7078L3.72198 15ZM0.999756 15H-0.000244141C-0.000244141 15.5523 0.447471 16 0.999756 16L0.999756 15ZM0.999756 12.2279L0.293346 11.5201C0.105383 11.7077 -0.000244141 11.9624 -0.000244141 12.2279H0.999756ZM9.80726 3.44057L12.5572 6.18502L13.97 4.7694L11.2201 2.02495L9.80726 3.44057ZM12.3867 2.27619C12.7557 1.90794 13.3549 1.90794 13.7238 2.27619L15.1367 0.860593C13.9869 -0.286864 12.1236 -0.286864 10.9739 0.860593L12.3867 2.27619ZM13.7238 2.27619C14.0917 2.64337 14.0917 3.23787 13.7238 3.60504L15.1367 5.02064C16.2875 3.8721 16.2875 2.00913 15.1367 0.860593L13.7238 2.27619ZM13.7238 3.60504L3.01557 14.2922L4.42839 15.7078L15.1367 5.02065L13.7238 3.60504ZM3.72198 14H0.999756V16H3.72198V14ZM1.99976 15V12.2279H-0.000244141V15H1.99976ZM1.70617 12.9357L12.3867 2.2762L10.9739 0.86059L0.293346 11.5201L1.70617 12.9357Z" fill="#64748B" />
                          </svg>
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex px-2">
                          <div class="avatar avatar-sm rounded-circle bg-gray-100 me-2 my-2">
                            <img src="../assets/img/small-logos/logo-jira.svg" class="w-80" alt="jira">
                          </div>
                          <div class="my-auto">
                            <h6 class="mb-0 text-sm">Jira</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-sm font-weight-normal mb-0">$3,400</p>
                      </td>
                      <td>
                        <span class="text-sm font-weight-normal">Mon 7:40pm</span>
                      </td>
                      <td class="align-middle">
                        <div class="d-flex">
                          <div class="border px-1 py-1 text-center d-flex align-items-center border-radius-sm my-auto">
                            <img src="../assets/img/logos/mastercard.png" class="w-90 mx-auto" alt="mastercard">
                          </div>
                          <div class="ms-2">
                            <p class="text-dark text-sm mb-0">Mastercard 1234</p>
                            <p class="text-secondary text-sm mb-0">Expiry 06/2026</p>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle">
                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-bs-toggle="tooltip" data-bs-title="Edit user">
                          <svg width="14" height="14" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.2201 2.02495C10.8292 1.63482 10.196 1.63545 9.80585 2.02636C9.41572 2.41727 9.41635 3.05044 9.80726 3.44057L11.2201 2.02495ZM12.5572 6.18502C12.9481 6.57516 13.5813 6.57453 13.9714 6.18362C14.3615 5.79271 14.3609 5.15954 13.97 4.7694L12.5572 6.18502ZM11.6803 1.56839L12.3867 2.2762L12.3867 2.27619L11.6803 1.56839ZM14.4302 4.31284L15.1367 5.02065L15.1367 5.02064L14.4302 4.31284ZM3.72198 15V16C3.98686 16 4.24091 15.8949 4.42839 15.7078L3.72198 15ZM0.999756 15H-0.000244141C-0.000244141 15.5523 0.447471 16 0.999756 16L0.999756 15ZM0.999756 12.2279L0.293346 11.5201C0.105383 11.7077 -0.000244141 11.9624 -0.000244141 12.2279H0.999756ZM9.80726 3.44057L12.5572 6.18502L13.97 4.7694L11.2201 2.02495L9.80726 3.44057ZM12.3867 2.27619C12.7557 1.90794 13.3549 1.90794 13.7238 2.27619L15.1367 0.860593C13.9869 -0.286864 12.1236 -0.286864 10.9739 0.860593L12.3867 2.27619ZM13.7238 2.27619C14.0917 2.64337 14.0917 3.23787 13.7238 3.60504L15.1367 5.02064C16.2875 3.8721 16.2875 2.00913 15.1367 0.860593L13.7238 2.27619ZM13.7238 3.60504L3.01557 14.2922L4.42839 15.7078L15.1367 5.02065L13.7238 3.60504ZM3.72198 14H0.999756V16H3.72198V14ZM1.99976 15V12.2279H-0.000244141V15H1.99976ZM1.70617 12.9357L12.3867 2.2762L10.9739 0.86059L0.293346 11.5201L1.70617 12.9357Z" fill="#64748B" />
                          </svg>
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex px-2">
                          <div class="avatar avatar-sm rounded-circle bg-gray-100 me-2 my-2">
                            <img src="../assets/img/small-logos/logo-slack.svg" class="w-80" alt="slack">
                          </div>
                          <div class="my-auto">
                            <h6 class="mb-0 text-sm">Slack</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-sm font-weight-normal mb-0">$1,000</p>
                      </td>
                      <td>
                        <span class="text-sm font-weight-normal">Wed 5:00pm</span>
                      </td>
                      <td class="align-middle">
                        <div class="d-flex">
                          <div class="border px-1 py-1 text-center d-flex align-items-center border-radius-sm my-auto">
                            <img src="../assets/img/logos/visa.png" class="w-90 mx-auto" alt="visa">
                          </div>
                          <div class="ms-2">
                            <p class="text-dark text-sm mb-0">Visa 1234</p>
                            <p class="text-secondary text-sm mb-0">Expiry 06/2026</p>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle">
                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-bs-toggle="tooltip" data-bs-title="Edit user">
                          <svg width="14" height="14" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.2201 2.02495C10.8292 1.63482 10.196 1.63545 9.80585 2.02636C9.41572 2.41727 9.41635 3.05044 9.80726 3.44057L11.2201 2.02495ZM12.5572 6.18502C12.9481 6.57516 13.5813 6.57453 13.9714 6.18362C14.3615 5.79271 14.3609 5.15954 13.97 4.7694L12.5572 6.18502ZM11.6803 1.56839L12.3867 2.2762L12.3867 2.27619L11.6803 1.56839ZM14.4302 4.31284L15.1367 5.02065L15.1367 5.02064L14.4302 4.31284ZM3.72198 15V16C3.98686 16 4.24091 15.8949 4.42839 15.7078L3.72198 15ZM0.999756 15H-0.000244141C-0.000244141 15.5523 0.447471 16 0.999756 16L0.999756 15ZM0.999756 12.2279L0.293346 11.5201C0.105383 11.7077 -0.000244141 11.9624 -0.000244141 12.2279H0.999756ZM9.80726 3.44057L12.5572 6.18502L13.97 4.7694L11.2201 2.02495L9.80726 3.44057ZM12.3867 2.27619C12.7557 1.90794 13.3549 1.90794 13.7238 2.27619L15.1367 0.860593C13.9869 -0.286864 12.1236 -0.286864 10.9739 0.860593L12.3867 2.27619ZM13.7238 2.27619C14.0917 2.64337 14.0917 3.23787 13.7238 3.60504L15.1367 5.02064C16.2875 3.8721 16.2875 2.00913 15.1367 0.860593L13.7238 2.27619ZM13.7238 3.60504L3.01557 14.2922L4.42839 15.7078L15.1367 5.02065L13.7238 3.60504ZM3.72198 14H0.999756V16H3.72198V14ZM1.99976 15V12.2279H-0.000244141V15H1.99976ZM1.70617 12.9357L12.3867 2.2762L10.9739 0.86059L0.293346 11.5201L1.70617 12.9357Z" fill="#64748B" />
                          </svg>
                        </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>