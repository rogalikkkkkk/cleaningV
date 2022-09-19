<?php

require_once ('pdo_insert.php');

$add_equip = $pdo->prepare('
insert into equipment (name, quant, total) values (:n, :t, :t)
');
$add_equip->execute(array(':n' => $_POST['name'], ':t' => $_POST['numb']));

header('Location: ../pages/edit_equip.php');
