<script>
    
    
    function cadastro_novo_cliente(key){
        
        
        var nome = document.getElementById("nome").value;
        var email = document.getElementById("email").value;
        var telefone = document.getElementById("telefone").value;
        var cpf = document.getElementById("cpf").value;
        var cep = document.getElementById("cep").value;
        var endereco = document.getElementById("endereco").value;
        var numero = document.getElementById("numero").value;
        var complemento = document.getElementById("complemento").value;
        var cidade = document.getElementById("cidade").value;
        var estado = document.getElementById("estado").value;
        
        
        // Objeto com os dados a serem enviados
        var dados = {
          nome: nome,
          email: email,
          telefone: telefone,
          cpf: cpf,
          cep: cep,
          endereco: endereco,
          numero: numero,
          complemento: complemento,
          cidade: cidade,
          estado: estado,
          chave: key
        };
        // Faz a requisição POST usando $.post()
        $.post('modulos/cobranca_ASAAS/api/api_cadastro_cliente_interno.php', dados, function(data) {
          // Callback de sucesso - fazer algo com a resposta do servidor
          console.log(data);
          alert(data);
          
          document.getElementById("table_add_clente").className= "invisivel";
          
        }).fail(function(jqXHR, textStatus, errorThrown) {
          // Callback de erro - fazer algo em caso de erro na requisição
          console.error(textStatus + ": " + errorThrown);
          alert("Erro ao enviar os dados.");
        });
        
    }
    
</script>