<script>
    
    
    $('#alterar').on('click', function() {
    var senha = $('#senha').val();
    var validacao_con = $('#validacao_con').val();
    
    $('#loading').show(); 
    if (senha.length === 0) {senha = 1;}
    $.ajax({
        url: 'modulos/usuario/api/03-alterar_senha.php',
        method: 'POST',
        data: { senha: senha, validacao_con:validacao_con  },
        success: function(data) {
            
              if (data.trim() === "ok") {
                document.getElementById("senha_alterada").style.display = "block";
                document.getElementById("alterar_senha").style.display = "none";
            }else{
            
                document.getElementById("log_erro").innerText = data;
            }
            
            $('#loading').hide();
            // Faça o que precisar com o retorno aqui
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
});
    
    
</script>