<script>
    
    function alt_nome_grupo(id){
        
        var b = document.getElementById("nome_grupo_alterar_"+id).value;
       
        $.post('modulos/ordem_de_servico/api/alterar_nome_grupo_os.php', { chave: id, chave_b: b }, function(data) {
       //location.reload();
        
    });
  }
        
        
    
    
    
    
</script>