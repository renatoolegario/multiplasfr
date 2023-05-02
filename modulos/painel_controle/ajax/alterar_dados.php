<script>
    
    function alt_dados(acao){
    
        
        var resposta = confirm("Deseja fazer as alterações?");
        
        if (resposta == true) {
            var dados = document.getElementById(acao).value;
            $.post('modulos/painel_controle/api/alterar_dados.php', { acao: acao, dados: dados }, function(data) {
            location.reload();
               
             });
    
        }
  }
     
    
</script>