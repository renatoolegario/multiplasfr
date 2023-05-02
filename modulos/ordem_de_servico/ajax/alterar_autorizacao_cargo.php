<script>
    
    function alterar_autorizacao_cargo(id){
        
        var b = document.getElementById("alterar_autorizacao_cargo_"+id).value;
        
     
        $.post('modulos/ordem_de_servico/api/alterar_autorizacao_cargo.php', { chave: id, chave_b: b }, function(data) {
       //location.reload();
        
    });
  }
        
        
    
    
    
    
</script>