<script>
  
    $(document).ready(function() {
  // Adiciona um evento de clique ao botão "cadastrar"
  $('#add_cargo').click(function() {
     
    // Armazena os valores das variáveis
    var nome_cargo = document.getElementById("nome_cargo").value;
    var id_autorizacao = document.getElementById("id_autorizacao").value;
   

// Inicializa a variável de validação como true
var valida = true;

  
    $('#loading').show(); 
    // Cria um objeto de dados para enviar para o servidor
    var data = {
      nome: nome_cargo,
      id_autorizacao: id_autorizacao
    };

    // Faz uma requisição Ajax para o servidor
    $.ajax({
      type: "POST",
      url: "modulos/ordem_de_servico/api/adicionar_cargos.php",
      data: data,
      success: function(response) {
          
          if(response == "Cargo registrado com sucesso."){
              location.reload();
          }else{
                document.getElementById("resposta_cargo").innerText = response;
                document.getElementById("resposta_cargo").className= "label label-danger";
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