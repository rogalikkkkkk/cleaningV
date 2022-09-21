<?php
session_start();
if(isset($_POST['employee'])){
    header("Location: ../pages/registration_empl.php");
} elseif (isset($_POST['customer'])) {
    header("Location: ../pages/registration_cust.php");
} elseif (isset($_POST['reg_empl'])) {
    require_once ('pdo_insert.php');
    $logins=$pdo->prepare("select login from user where login=:l");
    $logins->execute(array(':l' => $_POST['login']));
    $reslogins = $logins->fetchAll();
    if (count($reslogins)>0){
        $_SESSION['message'] = 'Пользователь с таким логином уже существует';
        header("Location: ../pages/registration_empl.php");
    }
    else{
        $create_empl = $pdo->prepare("call create_empl(?,?,?,?,?,?,?)");
        $create_empl->execute(array($_POST['name'],$_POST['lname'],$_POST['pname'],$_POST['login'],$_POST['pass'],$_POST['elvl'],$_POST['email']));
        setcookie('login', $_POST['login'], 0, '/');
        setcookie('pass', $_POST['pass'], 0, '/');
        header("Location: login.php");
    }
}elseif (isset($_POST['reg_cust'])) {
    require_once ('pdo_insert.php');
    $logins=$pdo->prepare("select login from user where login=:l");
    $logins->execute(array(':l' => $_POST['login']));
    $reslogins = $logins->fetchAll();
    if (count($reslogins)>0){
        $_SESSION['message'] = 'Пользователь с таким логином уже существует';
        header("Location: ../pages/registration_cust.php");
    } else {
        $create_empl = $pdo->prepare("call create_cust(?,?,?,?,?,?,?)");
        $create_empl->execute(array($_POST['name'],$_POST['lname'],$_POST['pname'],$_POST['login'],$_POST['pass'],$_POST['phone'],$_POST['email']));
        setcookie('login', $_POST['login'], 0, '/');
        setcookie('pass', $_POST['pass'], 0, '/');
        header("Location: login.php");
    }
}