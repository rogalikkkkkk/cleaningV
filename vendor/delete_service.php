<?php

require_once ('pdo_insert.php');

$delete_services = $pdo->prepare('
delete from services where id = :i;
');

foreach ($_POST['serv'] as &$item) {
    $delete_services->execute(array(':i' => $item));
}

header('Location: ../pages/edit_service.php');
