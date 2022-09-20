<?php
require_once('pdo_insert.php');

if (isset($_POST['order'])) {
    $date = $_POST['date'] . " 00:00:00";
    $num = str_replace(array('-', ' ', ':'), '', date('d-m-y h:i:s')) . $_COOKIE['user_id'];
    $create_order = $pdo->prepare("
    INSERT INTO `order` (order_time, address_id, position_id, order_num)
  VALUES (:o, :a, :p, :on);");
    $create_order->execute(array(':o' => $date, ':a' => $_POST['address'], ':p' => $_POST['pos'], ':on' => $num));
    require_once ('mail.php');
    header('Location: ../index.php');
}
