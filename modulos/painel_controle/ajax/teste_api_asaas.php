<script>
    
    function api_asaas(){
    
            
            $.post('modulos/painel_controle/api/teste_api_asaas.php', { email_enviar: 'a' }, function(data) {
            //location.reload();
              alert(data); 
             });
    
        
  }
     
    
</script>