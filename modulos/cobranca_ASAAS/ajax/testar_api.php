<script>
                  
                  
                  function alterar(){
                      
                        const input = document.getElementById("key_asaas");
                        
                          if (input.type === "password") {
                            input.type = "text";
                          } else {
                            input.type = "password";
                          }
                      
                  }
                  
                  function testar_api(acesso){
                      
                      var key = document.getElementById("key_asaas").value;
                      
                      
                      
                        if (key === '') {} else {
                                    document.getElementById("errado").className = "badge badge-sm border border-warning text-warning bg-warning";
                                    document.getElementById("correto").className = "invisivel";
                      
                                      
                                      
                                      $.post('modulos/cobranca_ASAAS/api/api_consulta_conta.php', { chave_api_asaas: key, chave_user: acesso  }, function(data) {
                                       
                                        const validJsonString = data.replace(/^[^{]*|[^}]*$/g, '');
                                        const response = JSON.parse(validJsonString);
                                        var html = '';
                                        html += '<span class="titulo_des">Status:</span> ' + response.status + '<br>';
                                        html += '<span class="titulo_des">Tipo de pessoa:</span> ' + response.personType + '<br>';
                                        html += '<span class="titulo_des">CPF/CNPJ:</span> ' + response.cpfCnpj + '<br>';
                                        html += '<span class="titulo_des">Nome:</span> ' + response.name + '<br>';
                                        html += '<span class="titulo_des">Data de nascimento:</span> ' + (response.birthDate ? response.birthDate : '-') + '<br>';
                                        html += '<span class="titulo_des">Razão social:</span> ' + response.companyName + '<br>';
                                        html += '<span class="titulo_des">Tipo de empresa: </span>' + response.companyType + '<br>';
                                        html += '<span class="titulo_des">E-mail:</span> ' + response.email + '<br>';
                                        html += '<span class="titulo_des">Telefone:</span> ' + (response.phone ? response.phone : '-') + '<br>';
                                        html += '<span class="titulo_des">Celular:</span> ' + response.mobilePhone + '<br>';
                                        html += '<span class="titulo_des">CEP:</span> ' + response.postalCode + '<br>';
                                        html += '<span class="titulo_des">Endereço:</span> ' + response.address + '<br>';
                                        html += '<span class="titulo_des">Número: </span>' + response.addressNumber + '<br>';
                                        html += '<span class="titulo_des">Complemento:</span> ' + (response.complement ? response.complement : '-') + '<br>';
                                        html += '<span class="titulo_des">Bairro:</span>' + response.city.district + '<br>';
                                        html += '<span class="titulo_des">Cidade: </span>' + response.city.name + '<br>';
                                        html += '<span class="titulo_des">Estado: </span>' + response.city.state + '<br>';
                                        html += '<span class="titulo_des">Nome fantasia:</span> ' + response.tradingName + '<br>';
                                        html += '<span class="titulo_des">Registro na receita: </span>' + (response.revenueServiceRegister.name ? response.revenueServiceRegister.name : '-') + '<br>';
                                        html += '<span class="titulo_des">Tipos de empresa: </span>' + response.revenueServiceRegister.companyTypeOptions.join(', ');
                                        document.getElementById("resposta_api").innerHTML = html;
                                        
                                         if(response.status == "APPROVED"){
                                            document.getElementById("correto").className = "badge badge-sm border border-success text-success bg-success";
                                            document.getElementById("errado").className = "invisivel";
                                           
                                            
                                        }else{
                                            document.getElementById("errado").className = "badge badge-sm border border-warning text-warning bg-warning";
                                            document.getElementById("correto").className = "invisivel";
                                        }
                                      });
                      
                        }
                    }
                    
                    
                    
                    function testar_api_onload(acesso){
                       
                       document.getElementById("errado").className = "badge badge-sm border border-warning text-warning bg-warning";
                       document.getElementById("correto").className = "invisivel";
                       
                      $.post('modulos/cobranca_ASAAS/api/api_consulta_conta.php', { chave_api_asaas: 'oi', chave_user: acesso }, function(data) {
                       
                     
                       
                        const validJsonString = data.replace(/^[^{]*|[^}]*$/g, '');
                        const response = JSON.parse(validJsonString);
                        var html = '';
                        html += '<span class="titulo_des">Status:</span> ' + response.status + '<br>';
                        html += '<span class="titulo_des">Tipo de pessoa:</span> ' + response.personType + '<br>';
                        html += '<span class="titulo_des">CPF/CNPJ:</span> ' + response.cpfCnpj + '<br>';
                        html += '<span class="titulo_des">Nome:</span> ' + response.name + '<br>';
                        html += '<span class="titulo_des">Data de nascimento:</span> ' + (response.birthDate ? response.birthDate : '-') + '<br>';
                        html += '<span class="titulo_des">Razão social:</span> ' + response.companyName + '<br>';
                        html += '<span class="titulo_des">Tipo de empresa: </span>' + response.companyType + '<br>';
                        html += '<span class="titulo_des">E-mail:</span> ' + response.email + '<br>';
                        html += '<span class="titulo_des">Telefone:</span> ' + (response.phone ? response.phone : '-') + '<br>';
                        html += '<span class="titulo_des">Celular:</span> ' + response.mobilePhone + '<br>';
                        html += '<span class="titulo_des">CEP:</span> ' + response.postalCode + '<br>';
                        html += '<span class="titulo_des">Endereço:</span> ' + response.address + '<br>';
                        html += '<span class="titulo_des">Número: </span>' + response.addressNumber + '<br>';
                        html += '<span class="titulo_des">Complemento:</span> ' + (response.complement ? response.complement : '-') + '<br>';
                        html += '<span class="titulo_des">Bairro:</span>' + response.city.district + '<br>';
                        html += '<span class="titulo_des">Cidade: </span>' + response.city.name + '<br>';
                        html += '<span class="titulo_des">Estado: </span>' + response.city.state + '<br>';
                        html += '<span class="titulo_des">Nome fantasia:</span> ' + response.tradingName + '<br>';
                        html += '<span class="titulo_des">Registro na receita: </span>' + (response.revenueServiceRegister.name ? response.revenueServiceRegister.name : '-') + '<br>';
                        html += '<span class="titulo_des">Tipos de empresa: </span>' + response.revenueServiceRegister.companyTypeOptions.join(', ');
                        document.getElementById("resposta_api").innerHTML = html;
                        
                       
                                         if(response.status == "APPROVED"){
                                            document.getElementById("correto").className = "badge badge-sm border border-success text-success bg-success";
                                            document.getElementById("errado").className = "invisivel";
                                            
                                        }else{
                                            document.getElementById("errado").className = "badge badge-sm border border-warning text-warning bg-warning";
                                            document.getElementById("correto").className = "invisivel";
                                        }
                      });
                      
                      
                      
                    }

                  
              </script>