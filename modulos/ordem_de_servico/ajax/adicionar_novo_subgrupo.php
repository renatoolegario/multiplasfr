<script>
  
    $(document).ready(function() {
  // Adiciona um evento de clique ao botão "cadastrar"
  $('#add_subgrupo_os').click(function() {
     
    // Armazena os valores das variáveis
    var nome_subgrupo = document.getElementById("nome_sub_grupo").value;

// Inicializa a variável de validação como true
var valida = true;

  
    $('#loading').show(); 
    // Cria um objeto de dados para enviar para o servidor
    var data = {
      nome_subgrupo: nome_subgrupo
    };

    // Faz uma requisição Ajax para o servidor
    $.ajax({
      type: "POST",
      url: "modulos/ordem_de_servico/api/adicionar_novo_subgrupo.php",
      data: data,
      success: function(response) {
          
          if(response == "Sub Grupo registrado com sucesso."){
            
              location.reload();
          }else{
                document.getElementById("resposta_subgrupo").innerText = response;
                document.getElementById("resposta_subgrupo").className= "label label-danger";
          }
          
        
          $('#loading').hide();
          
        },
      error: function(xhr, status, error) {
        // Trata o erro, caso ocorra
        console.log(xhr.responseText);
      }
    });
    
    


  });
});
    
</script>