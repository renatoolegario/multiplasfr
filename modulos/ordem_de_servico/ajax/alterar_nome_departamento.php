<script>
    
    function alterar_nome_departamento(id){
        
        var b = document.getElementById("nome_departamento_alterar_"+id).value;
       
        $.post('modulos/ordem_de_servico/api/alterar_nome_departamento.php', { chave: id, chave_b: b }, function(data) {
       //location.reload();
        
    });
  }
        
        
    
    
    
    
</script>