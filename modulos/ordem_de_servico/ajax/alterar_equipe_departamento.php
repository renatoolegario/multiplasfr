<script>
    
    function alterar_equipe_departamento(id){
        
        var b = document.getElementById("nome_equipe_alterar_"+id).value;
       
        $.post('modulos/ordem_de_servico/api/alterar_equipe_departamento.php', { chave: id, chave_b: b }, function(data) {
       //location.reload();
        
    });
  }
        
        
    
    
    
    
</script>