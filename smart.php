<?php 

$famil = $_POST['famil'];
$name = $_POST['name'];
$otchestvo = $_POST['otchestvo'];
$number = $_POST['number'];

$index = $_POST['index'];
$region = $_POST['region'];
$city = $_POST['city'];
$distr = $_POST['distr'];
$home = $_POST['home'];
$kvart = $_POST['kvart'];




require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'glass-gun@mail.ru';                 // Наш логин
$mail->Password = 'blackfriday';                           // Наш пароль от ящика
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to
 
$mail->setFrom('glass-gun@mail.ru', 'Пистолет 4D Var Park');   // От кого письмо 
$mail->addAddress('Zapp-Shop@yandex.ru');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Новый заказ!';
$mail->Body    = '
	Пользователь оставил свои данные <br><br> 
	Фамилия:  '.$famil.' <br>
	Имя: '.$name.' <br>
	Номер: '.$number.' <br>
	Отчество:  '.$otchestvo.' <br>
	Индекс:  '.$index.' <br>
	Регион:  '.$region.' <br>
	Населенный пункт:  '.$city.' <br>
	Район\мк-район:  '.$distr.' <br>
	Дом/корпус/строение:  '.$home.' <br>
	Квартира:  '.$kvart.' <br>';


$mail->AltBody = 'Это альтернативный текст';

if(!$mail->send()) {
    return false;
} else {
    return true;
}

?>