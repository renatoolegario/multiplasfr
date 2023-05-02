
<?php

    $email = $_POST['email_enviar'];
    
    
    include("../../../bibliotecas/00-Rotas/01-configuracoes_adm.php");
    require_once('../../../bibliotecas/01-PHPMailer/PHPMailer.php');
    require_once('../../../bibliotecas/01-PHPMailer/SMTP.php');
    require_once('../../../bibliotecas/01-PHPMailer/Exception.php');
    
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    
    $mail = new PHPMailer(true);
    $mail->SetLanguage('br');
    $mail->CharSet='UTF=8';
    $arquivo = '
    <!DOCTYPE html>
    <html>
    <head>
    	<title>Confirmação de Cadastro na '.$nome_site.'</title>
    	<meta charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    	<p>Olá teste de e-mail</strong>!</p>
    	<p>Seu cadastro na '.$nome_site.' foi realizado com sucesso!</p>
    	<p>Agora você pode acessar a plataforma através do link abaixo:</p>
    	<p><a href="'.$link_site.'">'.$link_site.'</a></p>
    	<p>Utilize os seguintes dados para fazer login:</p>
    	<ul>
    		<li><strong>Usuário: Teste de email</strong></li>
    		<li><strong>Senha: Teste de email</strong></li>
    	</ul>
    	<p>Atenciosamente,</p>
    	<p>Equipe '.$nome_site.'</p>
    </body>
    </html>
    ';
    
       try {
    	    $mail->isSMTP();
    	    $mail->Host = $host_email;
    	    $mail->SMTPAuth = true;
    	    $mail->SMTPSecure = 'ssl';              // sets the prefix to the servier
    	    $mail->Username = $username;
    	    $mail->Password = $password;
    	    $mail->Port = $porta_smtp;
    		$mail->setFrom($username, $remetente_do_email);
    		$mail->addAddress($email);
			$mail->isHTML(true);
            $mail->Subject = 'Seja muito bem vindo(a) a '.$nome_site.'.';  
            $mail->Body = $arquivo;
			
    	    $mail->isHTML(true);
    	    $mail->send(); 
		 
	    
	} catch (Exception $e) {
    echo "Erro ao enviar e-mail: {$mail->ErrorInfo}";
}
    

?>