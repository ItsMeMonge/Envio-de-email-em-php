<?php
    require_once('src/PHPMailer.php');
    require_once('src/SMTP.php');
    require_once('src/Exception.php');

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    $mail = new PHPMailer(true);

    try {
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'Seu email';
        $mail->Password = 'Sua senha';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('Seu email');
        $mail->addAddress('Qm vai receber');

        $mail->isHTML(true);
        $mail->Subject = 'Texto principal';
        $mail->Body = 'Corpo do texto';

        if($mail->send()){
            echo 'Email enviado com sucesso';
        } else {
            echo 'Email nao enviado';
        }


    } catch (Exception $e) {
        echo "Erro Ao enviar mensagem: {$mail->ErrorInfo}";
    }

?>