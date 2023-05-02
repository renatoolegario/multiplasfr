<script>
    
    
    $('#logar').on('click', function() {
    var email = $('#email').val();
    var senha = $('#senha').val();
    
    
    $('#loading').show(); 
    $.ajax({
        url: 'modulos/usuario/api/02-valida_login_json.php',
        method: 'POST',
        data: { email: email,senha:senha },
        success: function(data) {
          if (data.includes("-")) {
            // extrair o valor encontrado após o "-"
            let partes = data.split("-");
            if (partes.length > 1) {
              let valorEncontrado = partes[1];
        
              // construir a URL com a variável ver e o valor encontrado
              const url = `app.php?ver=${valorEncontrado}`;
        
              // redirecionar para a URL
              window.location.href = url;
            }
          }else{
            document.getElementById("log_erro").innerText = data;
          }
          $('#loading').hide();
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
});
    
    
</script>