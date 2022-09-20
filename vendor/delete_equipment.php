<?php

require_once ('pdo_insert.php');

$delete_equipment = $pdo->prepare('
delete from equipment where id = :i;
');
foreach ($_POST['equip'] as $item) {
    $delete_equipment->execute(array(':i' => $item));

}

header('Location: ../pages/edit_equip.php');
