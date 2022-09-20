<?php

require_once ('pdo_insert.php');

$add_service = $pdo->prepare('
insert into services (cost, name) values (:c, :n)
');
$add_service->execute(array(':c' => $_POST['cost'], ':n' => $_POST['name']));

$get_new_service = $pdo->prepare('
select * from services where cost = :c and name = :n
');
$get_new_service->execute(array(':c' => $_POST['cost'], ':n' => $_POST['name']));
$res_get_new_service = $get_new_service->fetchAll();
$new_serv_id = $res_get_new_service[0]['id'];

$add_serv_eqp = $pdo->prepare('
insert into services_equipment (equipment_id, service_id) values (:ei, :si)
');

foreach ($_POST['eqp'] as &$item) {
    $add_serv_eqp->execute(array(':ei' => $item, ':si' => $new_serv_id));
}
header('Location: ../pages/edit_service.php');
