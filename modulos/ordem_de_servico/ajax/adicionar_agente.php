<script>
  
    $(document).ready(function() {
  // Adiciona um evento de clique ao botão "cadastrar"
  $('#add_agente').click(function() {
     
    // Armazena os valores das variáveis
    var id_agente = document.getElementById("novos_agentes").value;
   

// Inicializa a variável de validação como true
var valida = true;

  
    $('#loading').show(); 
    // Cria um objeto de dados para enviar para o servidor
    var data = {
      id_us: id_agente
    };

    // Faz uma requisição Ajax para o servidor
    $.ajax({
      type: "POST",
      url: "modulos/ordem_de_servico/api/adicionar_agente.php",
      data: data,
      success: function(response) {
          
          if(response == "Usuário registrado como agente."){
              location.reload();
          }else{
                document.getElementById("resposta").innerText = response;
                document.getElementById("resposta").className= "label label-danger";
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