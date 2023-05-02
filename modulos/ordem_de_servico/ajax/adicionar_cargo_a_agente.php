<script>
    
    function alt_cargo(id){
        
        var b = document.getElementById("add_cargo_"+id).value;
        
        $.post('modulos/ordem_de_servico/api/adicionar_cargo_a_agente.php', { id_usuario: id, id_cargo: b }, function(data) {
       //location.reload();
        
    });
  }
        
        
    
    
    
    
</script>