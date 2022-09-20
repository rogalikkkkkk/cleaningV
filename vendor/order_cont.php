<?php
require_once('pdo_insert.php');

if (isset($_REQUEST['service']) && isset($_REQUEST['date'])) {
    $emp_by_serv = $pdo->prepare('
call getEmpByServ(:i, :d)
');
    $serv = $_REQUEST['service'];
    $date = $_REQUEST['date'];
    $emp_by_serv->execute(array(':i' => $_REQUEST['service'], ':d' => $_REQUEST['date']));
    $emp = $emp_by_serv->fetchAll();
    $emp_by_serv->closeCursor();
}
$addr_by_user = $pdo->prepare('
call getAddressByUser(:i)
');
$addr_by_user->execute(array(':i' => $_COOKIE['user_id']));
$addresses = $addr_by_user->fetchAll();
if (empty($addresses))
{
    $_SESSION['warning'] = 'Добавьте адрес, прежде чем делать заказ!';
    // header();
}
?>