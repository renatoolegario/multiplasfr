<script>
  
    $(document).ready(function() {
  // Adiciona um evento de clique ao botão "cadastrar"
  $('#add_equipe_em_departamento').click(function() {
     
    // Armazena os valores das variáveis
    var nome_equipe_add_dp = document.getElementById("nome_equipe_add_dp").value;
    var nome_departamento_add_dp = document.getElementById("nome_departamento_add_dp").value;
   

// Inicializa a variável de validação como true
var valida = true;

  
    $('#loading').show(); 
    // Cria um objeto de dados para enviar para o servidor
    var data = {
      id_equipe: nome_equipe_add_dp,
      id_departamento: nome_departamento_add_dp
    };

    // Faz uma requisição Ajax para o servidor
    $.ajax({
      type: "POST",
      url: "modulos/ordem_de_servico/api/adicionar_equipe_em_departamento.php",
      data: data,
      success: function(response) {
          
          if(response == "Adicionado com sucesso."){
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