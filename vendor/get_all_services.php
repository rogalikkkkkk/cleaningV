<?php
require_once ('pdo_insert.php');

$all_serv = $pdo->prepare('
select * from services
');
$all_serv->execute();
$res_all_serv = $all_serv->fetchAll();

