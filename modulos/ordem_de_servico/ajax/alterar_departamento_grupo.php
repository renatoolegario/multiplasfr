<script>
    
    function alt_departamento_grupo(id){
      
        
        var b = document.getElementById("nome_departamento_alterar_"+id).value;
       
       
        $.post('modulos/ordem_de_servico/api/alterar_departamento_grupo_os.php', { chave: id, chave_b: b }, function(data) {
       //location.reload();
        
    });
  }
        
        
    
    
    
    
</script>