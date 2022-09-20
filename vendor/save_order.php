<?php
require_once('pdo_insert.php');

if (isset($_POST['order'])) {
    $create_order = $pdo->prepare('
    INSERT INTO order (order_time, address_id, position_id)
  VALUES (:o, :a, :p);');
    $create_order->execute(array(':o' => $_POST['date'], ':a' => $_POST['address'], ':p' => $_POST['pos']));
    header('Location: ../index.php');
}
?>