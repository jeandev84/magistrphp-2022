<?php
function get_data($smtp_conn)
{
  $data="";
  while($str = fgets($smtp_conn,515))
  {
    $data .= $str;
    if(substr($str,3,1) == " ") { break; }
  }
  return $data;
}

$header="Date: ".date("D, j M Y G:i:s")." +0700\r\n";
$header.="From: =?windows-1251?Q?".str_replace("+","_",str_replace("%","=",urlencode('ВашеИмя')))."?= <ВашаПочта@mail.ru>\r\n";
$header.="X-Mailer: The Bat! (v3.99.3) Professional\r\n";
$header.="Reply-To: =?windows-1251?Q?".str_replace("+","_",str_replace("%","=",urlencode('ВашеИмя')))."?= <ВашаПочта@mail.ru>\r\n";
$header.="X-Priority: 3 (Normal)\r\n";
$header.="Message-ID: <172562218.".date("YmjHis")."@mail.ru>\r\n";
$header.="To: =?windows-1251?Q?".str_replace("+","_",str_replace("%","=",urlencode('ИмяПолучателя')))."?= <АдресПолучателя@gmail.com>\r\n";
$header.="Subject: =?windows-1251?Q?".str_replace("+","_",str_replace("%","=",urlencode('проверка')))."?=\r\n";
$header.="MIME-Version: 1.0\r\n";
$header.="Content-Type: text/plain; charset=windows-1251\r\n";
$header.="Content-Transfer-Encoding: 8bit\r\n";


$text="привет, проверка связи.";

$smtp_conn = fsockopen("ssl://smtp.mail.ru", 465,$errno, $errstr, 10);
$data = get_data($smtp_conn);

$code = substr($data,0,3);
print 'Connection:'.$data;
print '<br>';

fputs($smtp_conn,"EHLO mail.ru\r\n");
$data = get_data($smtp_conn);

$test='qwe';

$code = substr($data,0,3);
echo 'EHLO:'.$data;
print '<br>';

fputs($smtp_conn,"AUTH LOGIN\r\n");
$data = get_data($smtp_conn);

$code = substr($data,0,3);
echo 'AUTH:'.$data;
print '<br>';

fputs($smtp_conn,base64_encode("ВашаПочта@mail.ru")."\r\n");
$data = get_data($smtp_conn);

$code = substr($data,0,3);
echo $data;
print '<br>';

fputs($smtp_conn,base64_encode("ВашПароль")."\r\n");
$data = get_data($smtp_conn);

$code = substr($data,0,3);
echo 'pass:'.$data;
print '<br>';

fputs($smtp_conn,"MAIL FROM:ВашаПочта@mail.ru\r\n");
$data = get_data($smtp_conn);

$code = substr($data,0,3);
echo 'MAIL:'.$data;
print '<br>';

fputs($smtp_conn,"RCPT TO:АдресПолучателя@gmail.com\r\n");
$data = get_data($smtp_conn);

$code = substr($data,0,3);
echo 'RCPT:'.$data;
print '<br>';

fputs($smtp_conn,"DATA\r\n");
$data = get_data($smtp_conn);

$code = substr($data,0,3);
echo 'DATA:'.$data;
print '<br>';

fputs($smtp_conn,$header."\r\n".$text."\r\n.\r\n");
$data = get_data($smtp_conn);

$code = substr($data,0,3);
echo 'header:'.$data;
print '<br>';

fputs($smtp_conn,"QUIT\r\n");
$data = get_data($smtp_conn);

$code = substr($data,0,3);
echo 'QUIT:'.$data;
print '<br>';

?>