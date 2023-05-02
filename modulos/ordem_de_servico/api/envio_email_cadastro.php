
<?php


//if(!empty($_POST['email_suporte'])){
        
        include('../../../bibliotecas/00-Rotas/01-configuracoes_adm.php');
        require_once('../../../bibliotecas/01-PHPMailer/PHPMailer.php');
        require_once('../../../bibliotecas/01-PHPMailer/SMTP.php');
        require_once('../../../bibliotecas/01-PHPMailer/Exception.php');
        
        
        $email_suporte = $_POST['email_suporte'];
        $email_abertura= $_POST['email_abertura'];
        $numero_chamado= $_POST['numero_chamado'];
        $nome          = $_POST['nome'];
        $link_site     = $_POST['link'];
        
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
        	<title>Ordem '.$numero_chamado.' criada com sucesso!</title>
        	<meta charset="UTF-8">
        	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        </head>
        <body>
        	<p>Olá, <strong>'.$nome.'</strong>!</p>
        	<p>A ordem de serviço  <strong>'.$numero_chamado.'</strong>  foi criada com sucesso!</p>
        	<p>Você pode acompanhar através do link abaixo:</p>
        	<p><a href="'.$link_site.'">'.$numero_chamado.'</a></p>
        
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
            		$mail->addAddress($email_abertura);
            		$mail->addBCC($email_suporte); // adiciona o segundo destinatário como cópia oculta (BCC)
        			$mail->isHTML(true);
                    $mail->Subject = 'Ordem '.$numero_chamado.' criada com sucesso!';  
                    $mail->Body = $arquivo;
        			
            	    $mail->isHTML(true);
            	    $mail->send(); 
        		 
        	    
        	} catch (Exception $e) {
            echo "Erro ao enviar e-mail: {$mail->ErrorInfo}";
        }
        
        
        
        	
//}


?>