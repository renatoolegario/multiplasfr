<script>
    
    function teste_de_email(){
    
        var resposta = confirm("Deseja enviar o e-mail de teste?");
        
        if (resposta == true) {
            var email = document.getElementById('email_teste').value;
            $.post('modulos/painel_controle/api/teste_de_envio_email.php', { email_enviar: email }, function(data) {
            //location.reload();
              alert(data); 
             });
    
        }
  }
     
    
</script>