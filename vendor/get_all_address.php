<?php
require_once ('pdo_insert.php');
$custid=$pdo->prepare('select c.id from customer as c join user on c.user_id=user.id where user.id=:ui');
$custid->execute(array(':ui'=>$_COOKIE['user_id']));
$ci=$custid->fetch();

$all_address = $pdo->prepare('
select ap.id as id, ap.city as city, ap.street as street, ap.house as house, ap.apart as apart, ap.area as area, ap.floor, ap.elevator as elevator
       from addresses a join apartment ap on ap.id=a.apartment_id where a.customer_id=:ci
');
$all_address->execute(array('ci'=>$ci[0]));
$res_all_addreses = $all_address->fetchAll();
$count_ad=count($res_all_addreses);
