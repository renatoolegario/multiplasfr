<script>
    
    function alterar_nome_equipe(id){
        
        var b = document.getElementById("nome_equipe_alterar_"+id).value;
       
       
        $.post('modulos/ordem_de_servico/api/alterar_nome_equipe.php', { chave: id, chave_b: b }, function(data) {
       //location.reload();
        
    });
  }
        
        
    
    
    
    
</script>