<script>
    
    function alterar_cargo_de_agente(id){
        var b = document.getElementById("cargo_do_agente_"+id).value;
       
        
        $.post('modulos/ordem_de_servico/api/alterar_cargo_de_agente.php', { chave: id, chave_b: b }, function(data) {
       //location.reload();
        
    });
  }
        
        
    
    
    
    
</script>