<?php

require_once ('pdo_insert.php');

$add_service = $pdo->prepare('
insert into services (cost, name) values (:c, :n)
');
$add_service->execute(array(':c' => $_POST['cost'], ':n' => $_POST['name']));

$lii = $pdo->prepare('select last_insert_id()');
$lii->execute();
$res_lii = $lii->fetchAll();
