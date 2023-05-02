<script>
  
    $(document).ready(function() {
  // Adiciona um evento de clique ao botão "cadastrar"
  $('#add_equipe').click(function() {
     
    // Armazena os valores das variáveis
    var nome_equipe = document.getElementById("nome_equipe").value;
   

// Inicializa a variável de validação como true
var valida = true;

  
    $('#loading').show(); 
    // Cria um objeto de dados para enviar para o servidor
    var data = {
      nome: nome_equipe
    };

    // Faz uma requisição Ajax para o servidor
    $.ajax({
      type: "POST",
      url: "modulos/ordem_de_servico/api/adicionar_equipes.php",
      data: data,
      success: function(response) {
          
          if(response == "Equipe registrada com sucesso."){
              location.reload();
          }else{
                document.getElementById("resposta_eq").innerText = response;
                document.getElementById("resposta_eq").className= "label label-danger";
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