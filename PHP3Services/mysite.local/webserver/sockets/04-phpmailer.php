<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

//require 'phpmailer/PHPMailer.php';
require 'phpmailer/PHPMailerAutoload.php';

if (!empty($_POST['name'])) {

    $mail = new PHPMailer;
    $mail->isSMTP();

    $mail->SMTPDebug = 1;

    $mail->Host = 'smtp.mail.ru';

    $mail->SMTPAuth = true;
    $mail->Username = 'al...w@mail.ru'; // логин от вашей почты
    $mail->Password = '******'; // пароль от почтового ящика
    $mail->SMTPSecure = 'SSL';
    $mail->Port = '465';

    $mail->CharSet = 'UTF-8';
    $mail->From = 'noreply@rocky.beget.ru';  // адрес почты, с которой идет отправка
    $mail->FromName = 'Алексей'; // имя отправителя
    $mail->addAddress('al..w@yandex.ru', 'Alexey');

    $mail->isHTML(true);

    $mail->Subject = $_POST['subject'];
    $mail->Body = "Имя: {$_POST['name']}<br> Email: {$_POST['email']}<br> Сообщение: " . nl2br($_POST['body']);
    $mail->AltBody = "Имя: {$_POST['name']}\r\n Email: {$_POST['email']}\r\n Сообщение: {$_POST['body']}";

    //$mail->SMTPDebug = 1;

    if ($mail->send()) {
        $answer = '1';
    } else {
        $answer = '0';
        echo 'Письмо не может быть отправлено. ';
        echo 'Ошибка: ' . $mail->ErrorInfo;
    }
    die($answer);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Форма обратной связи!!!</title>
</head>
<body>

<form action="" method="post" id="contact">
    <p>
        <label for="name">Имя</label>
        <input type="text" name="name" id="name"><span></span>
    </p>
    <p>
        <label for="subject">Тема</label>
        <input type="text" name="subject" id="subject"><span></span>
    </p>
    <p>
        <label for="email">Email</label>
        <input type="text" name="email" id="email"><span></span>
    </p>
    <p>
        <label for="body">Сообщение</label>
        <textarea name="body" cols="30" rows="10" id="body"></textarea><span></span>
    </p>
    <p>
        <input id="submit" type="submit" name="submit" value="Отправить"><span></span>
    </p>
</form>

<script src="http://code.jquery.com/jquery-latest.js"></script>
<!--script>
$(function(){

  $('#contact').submit(function(){
    var errors = false;
    $(this).find('span').empty();

    $(this).find('input, textarea').each(function(){
      if( $.trim( $(this).val() ) == '' ) {
        errors = true;
        $(this).next().text( 'Не заполнено поле ' + $(this).prev().text() );
      }
    });

    if( !errors ){
      var data = $('#contact').serialize();
      $.ajax({
        url: 'index.php',
        type: 'POST',
        data: data,
        beforeSend: function(){
          $('#submit').next().text('Отправляю...');
        },
        success: function(res){
          if( res == 1 ){
            $('#contact').find('input:not(#submit), textarea').val('');
            $('#submit').next().empty();
            alert('Письмо отправлено');
          }else{
            $('#submit').next().empty();
            console.log('Ошибка отправки');
          }
        },
        error: function(){
          console.log('Ошибка!');
        }
      });
    }

    return false;
  });

});

</script-->

</body>
</html>