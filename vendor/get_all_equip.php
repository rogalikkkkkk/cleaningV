<?php
require_once ('pdo_insert.php');

$all_equip = $pdo->prepare('
select * from equipment
');
$all_equip->execute();
$res_all_equip = $all_equip->fetchAll();