<script>
    
    
    $('#recuperar').on('click', function() {
    var email = $('#email').val();
    $('#loading').show(); 
    $.ajax({
        url: 'modulos/usuario/api/03-recuperacao_senha.php',
        method: 'POST',
        data: { email: email },
        success: function(data) {
            
            document.getElementById("enviado").style.display = "block";
            document.getElementById("recuperacao").style.display = "none";
            //document.getElementById("enviado_texto").className= "label label-warning";
            $('#loading').hide();
            // Faça o que precisar com o retorno aqui
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
});
    
    
</script>