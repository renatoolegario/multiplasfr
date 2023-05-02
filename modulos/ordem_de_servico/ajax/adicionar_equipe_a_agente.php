<script>
    
    function alt_equipe(id){
        
        var b = document.getElementById("add_equipe_"+id).value;
        
        $.post('modulos/ordem_de_servico/api/adicionar_equipe_a_agente.php', { id_usuario: id, id_equipe: b }, function(data) {
       //location.reload();
        
    });
  }
        
        
    
    
    
    
</script>