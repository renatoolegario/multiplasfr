
<?php
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
	<title>Senha recuperada com sucesso -  '.$nome_site.'</title>
</head>
<body>
	<p>Olá,</p>
	<p>Sua senha foi alterada com sucesso!</p>
	<p><a href="'.$link_site.'/index.php">Acessar sistema</a></p>
	
	<p>Se você não solicitou essa redefinição de senha, ignore este e-mail.</p>
	<p>Atenciosamente,<br>A equipe de suporte da '.$nome_site.'</p>
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
    		$mail->addAddress($email_rec);
			$mail->isHTML(true);
            $mail->Subject = 'Senha recuperada com sucesso -  '.$nome_site.'.';  
            $mail->Body = $arquivo;
			
    	    $mail->isHTML(true);
    	    $mail->send(); 
		 
	    
	} catch (Exception $e) {
    echo "Erro ao enviar e-mail: {$mail->ErrorInfo}";
}
	



?>