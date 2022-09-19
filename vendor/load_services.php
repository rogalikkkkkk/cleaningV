<?php

require_once ('pdo_insert.php');

$services_list = $pdo->prepare('
select * from services
');
$services_list->execute();
$res_services_list = $services_list->fetchAll();
