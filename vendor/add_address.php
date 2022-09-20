<?php
session_start();
if($_COOKIE['role']!=0){
    header('Location: ../index.php');
}
else{
    require_once ('pdo_insert.php');
    if ($_POST['elevator']!=""){
        $custid=$pdo->prepare('select c.id from customer as c join user on c.user_id=user.id where user.id=:ui');
        $custid->execute(array(':ui'=>$_COOKIE['user_id']));
        $ci=$custid->fetch();
        $add_ad = $pdo->prepare('call add_address(?,?,?,?,?,?,?,?)');
        $add_ad->execute(array($_POST['city'],$_POST['street'],$_POST['house'],$_POST['apart'],$_POST['area'],$_POST['floor'],intval($_POST['elevator']),$ci[0]));
    }else{
        $_SESSION['message']="Заполните все поля";
    }
    header('Location: ../pages/addresses.php');
}