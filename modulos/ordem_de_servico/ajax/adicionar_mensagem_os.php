
<script>


  function add_msg(os,user){
        
         var msg = document.getElementById("nova_msg").value;
        $('#loading').show(); 
        
        $.post('modulos/ordem_de_servico/api/adicionar_mensagem_os.php', { os: os, mensagem: msg, usuario: user }, function(data) {
            //$('#loading').hide();
            //alert(data);
            location.reload();
     });
  }
        
        
  
    
</script>