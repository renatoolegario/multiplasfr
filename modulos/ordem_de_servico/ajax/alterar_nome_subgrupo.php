<script>
    
    function alt_nome_subgrupo(id){
        
        var b = document.getElementById("nome_subgrupo_alterar_"+id).value;
       
        $.post('modulos/ordem_de_servico/api/alterar_nome_subgrupo.php', { chave: id, chave_b: b }, function(data) {
       //location.reload();
        
    });
  }
        
        
    
    
    
    
</script>