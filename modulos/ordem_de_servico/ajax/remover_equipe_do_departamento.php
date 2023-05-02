<script>
function confirmDeletion(a, b) {
  if (confirm('Tem certeza que deseja desvincular esta equipe deste departamento ?')) {
    $.post('modulos/ordem_de_servico/api/remover_equipe_do_departamento.php', { variavel_1: a, variavel_2: b }, function(data) {
       location.reload();
      
    });
  }
}
</script>