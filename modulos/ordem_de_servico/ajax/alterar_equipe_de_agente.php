<script>
    
    function alterar_equipe_de_agente(id){
        var b = document.getElementById("equipe_do_agente_"+id).value;
       
        
        $.post('modulos/ordem_de_servico/api/alterar_equipe_de_agente.php', { chave: id, chave_b: b }, function(data) {
       //location.reload();
        
    });
  }
        
        
    
    
    
    
</script>