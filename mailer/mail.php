<?php 

$name = $_POST['name'];
$review = $_POST['review'];

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication                              // Enable SMTP authentication
$mail->Username = 'lenya-ivanov-91@bk.ru';                 // Наш логин
$mail->Password = 'web$krut789';                           // Наш пароль от ящика
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to
 
$mail->setFrom('lenya-ivanov-91@bk.ru', 'Леня Иванов');   // От кого письмо 
$mail->addAddress('regina-saifieva@mail.ru');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Заявка на звонок';
$mail->Body    = '
	Пользователь оставил отзыв <br> 
	Имя: ' . $name . ' <br>
	Отзыв: ' . $review . '';
$mail->AltBody = 'Это альтернативный текст';

if(!$mail->send()) {
    echo 'error';
} else {
    header('location: ../thankyoureview.html');
}

?>