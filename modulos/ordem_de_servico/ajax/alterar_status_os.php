
<script>


  function alterar_status_os(os,status,u){
        
        $('#loading').show(); 
        
        $.post('modulos/ordem_de_servico/api/alterar_status_os.php', { os: os, status: status, u: u }, function(data) {
            $('#loading').hide();
            //alert(data);
            location.reload();
     });
  }
        
        
  
    
</script>