<script>
    
    function alterar_email_departamento(id){
        
        var b = document.getElementById("nome_email_alterar_"+id).value;
       
        $.post('modulos/ordem_de_servico/api/alterar_email_departamento.php', { chave: id, chave_b: b }, function(data) {
       //location.reload();
        
    });
  }
        
        
    
    
    
    
</script>