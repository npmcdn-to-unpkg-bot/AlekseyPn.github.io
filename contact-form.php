<?php
header('Content-Type: text/html; charset=utf-8');
/* Задаем переменные */
$name = htmlspecialchars($_POST["f_name"], ENT_COMPAT, 'cp1251');
$email = htmlspecialchars($_POST["f_email"], ENT_COMPAT, 'cp1251');
$tel = htmlspecialchars($_POST["f_tel"], ENT_COMPAT, 'cp1251');
$message = htmlspecialchars($_POST["text_form"], ENT_COMPAT, 'cp1251');
$bezspama = htmlspecialchars($_POST["not_spam"], ENT_COMPAT, 'cp1251');
 
/* Ваш адрес и тема сообщения */
$address = "aleksfers@icloud.com";
$sub = "Сообщение с вашего сайта";
 
/* Формат письма */
$mes = "Сообщение с вашего сайта.\n
Имя отправителя: $name 
Электронный адрес отправителя: $email
Телефон отправителя: $tel
Текст сообщения:
$message";
 
 
if (empty($bezspama)) /* Оценка поля bezspama - должно быть пустым*/
{
/* Отправляем сообщение, используя mail() функцию */

$from  = "From: $name <$email> \r\n Reply-To: $email \r\n";
if (mail($address, $sub, $mes, $from)) {
	header('Refresh: 3; URL=http://annaohapkina.rus/');
	echo 'Письмо отправлено, через 3 секунды вы вернетесь на главную страницу';}
else {
	header('Refresh: 3; URL=http://annaohapkina.rus/');
	echo 'Письмо не отправлено, через 3 секунд вы вернетесь на главную страницу';}
}
exit; /* Выход без сообщения, если поле bezspama заполнено спам ботами */
?>