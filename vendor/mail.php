<?php
require_once('pdo_insert.php');

$get_mail = $pdo->prepare('
select u.email from user as u where u.id = :i
');

$get_mail->execute(array(':i' => $_COOKIE['user_id']));
$res_this_user_email = $get_mail->fetchAll();

$from = "sea77030@gmail.com";
$subject = "Клининг";

$headers = "Content-type: text/html; charset=utf-8\r\n" . "From: $from" . "\r\n" . "Reply-To: $from" . "\r\n" . "X-Mailer: PHP/" . phpversion();
$to = $res_this_user_email[0]['email'];
print_r($res_this_user_email[0]['email']);
$message = 'Вы записались на уборку!';
mail($to, $subject, $message, $headers);