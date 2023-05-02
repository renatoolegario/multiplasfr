<script>
    
    function alt_grupo_subgrupo(id){
        
        var b = document.getElementById("grupo_subgrupo_alterar"+id).value;
       
        $.post('modulos/ordem_de_servico/api/alterar_grupo_subgrupo.php', { chave: id, chave_b: b }, function(data) {
       //location.reload();
        
    });
  }
        
        
    
    
    
    
</script>