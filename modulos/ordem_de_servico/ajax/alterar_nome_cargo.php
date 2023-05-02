<script>
    
    function alterar_nome_cargo(id){
        
        var b = document.getElementById("nome_cargo_alterar_"+id).value;
     
        $.post('modulos/ordem_de_servico/api/alterar_nome_cargo.php', { chave: id, chave_b: b }, function(data) {
       //location.reload();
        
    });
  }
        
        
    
    
    
    
</script>