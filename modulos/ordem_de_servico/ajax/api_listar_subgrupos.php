

<script>       
         function procurar_subgrupos(){
             var a = document.getElementById("grupos").value;
             var select = document.getElementById('sub_grupos');
             $('#loading').show();
             select.innerHTML = '';
              
              $.post('modulos/ordem_de_servico/api/api_listar_subgrupos.php', { chave: a }, function(data) {
               //location.reload();
              $('#loading').hide();
              substituirOpcoes(data);
              
                
            });
            
             
             
         }
         
         
         // Função para substituir as opções no select
            function substituirOpcoes(subgrupos) {
              var select = document.getElementById('sub_grupos');
              
              // Limpar opções existentes
              select.innerHTML = '';
              
                 var subgruposObj = JSON.parse(subgrupos);
                  
                  // Adicionar as opções dinamicamente
                  for (var i = 0; i < subgruposObj.length; i++) {
                    var subgrupo = subgruposObj[i];
                    var option = document.createElement('option');
                    option.value = subgrupo.chave;
                    option.text = subgrupo.nome;
                    select.add(option);
                  }
            }
         
</script>