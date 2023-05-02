<script>
    
    $(document).ready(function() {
  // Adiciona um evento de clique ao botão "cadastrar"
  $('#btn-cadastrar').click(function() {
      
    // Armazena os valores das variáveis
    var nome = document.getElementById("nome").value;
    var telefone = document.getElementById("telefone").value;
    var cnpj_cpf = document.getElementById("cnpj").value;
    var email = document.getElementById("email").value;
    var senha = document.getElementById("senha").value;

// Inicializa a variável de validação como true
var valida = true;

// Validando campo Nome
if (nome.trim() == "") {
  document.getElementById("nome_e").innerText = "- Nome invalido.";
  document.getElementById("nome_e").className= "label label-danger";
  valida = false;
}else{
    document.getElementById("nome_e").innerText = "";
    document.getElementById("nome_e").className= "";
}

// Validando campo Telefone
if (telefone.trim().length < 10) {
  document.getElementById("telefone_e").innerText = "- Telefone invalido.";
  document.getElementById("telefone_e").className= "label label-danger";
  valida = false;
}else{
    document.getElementById("telefone_e").innerText = "";
    document.getElementById("telefone_e").className= "";
}

// Validando campo CNPJ/CPF
if (cnpj_cpf.trim().length != 11 && cnpj_cpf.trim().length != 14) {
  document.getElementById("cnpj_e").innerText = "- CPF/CNPJ invalido.";  
  document.getElementById("cnpj_e").className= "label label-danger";
  
  valida = false;
}else{
    document.getElementById("cnpj_e").innerText = "";
    document.getElementById("cnpj_e").className= "";
}

// Validando campo Email
if (!isValidEmail(email.trim())) {
  document.getElementById("email_e").innerText = "-Email invalido.";
  document.getElementById("email_e").className= "label label-danger";
  valida = false;
}else{
    document.getElementById("email_e").innerText = "";
    document.getElementById("email_e").className= "";
}

// Validando campo Senha
if (senha.trim().length < 5) {
  document.getElementById("senha_e").innerText = "- Minimo 5 caractereso.";
  document.getElementById("senha_e").className= "label label-danger";
  valida = false;
}else{
    document.getElementById("senha_e").innerText = "";
    document.getElementById("senha_e").className= "";
}

// Função para validar o formato do Email
function isValidEmail(email) {
  var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return regex.test(email);
}

// Verifica se todos os campos foram validados com sucesso
if (valida) {
  
    $('#loading').show(); 
    // Cria um objeto de dados para enviar para o servidor
    var data = {
      nome: nome,
      telefone: telefone,
      cnpj_cpf: cnpj_cpf,
      email: email,
      senha: senha
    };

    // Faz uma requisição Ajax para o servidor
    $.ajax({
      type: "POST",
      url: "modulos/usuario/api/01-cadastro_usuario_json.php",
      data: data,
      success: function(response) {
       
          document.getElementById("resposta").innerText = response;
          document.getElementById("resposta").className= "label label-danger";
          $('#loading').hide();
          
        },
      error: function(xhr, status, error) {
        // Trata o erro, caso ocorra
        console.log(xhr.responseText);
      }
    });
    
    }


  });
});
    
</script>