<?php
session_start();

if (isset($_POST['login']) && isset($_POST['password']) || (isset($_COOKIE['login']) && isset($_COOKIE['pass']))) {
    require_once ('pdo_insert.php');

    $finduser=$pdo->prepare("select id from user where login=:l and pass=:p");
    if(isset($_POST['login']) && isset($_POST['password'])){
        $finduser->execute(array(':l' => $_POST['login'],':p' => $_POST['password']));
        $res_finduser = $finduser->fetchAll();
        if(count($res_finduser)==0){
            $_SESSION['message']="Неверные данные";
            header('Location: ../pages/auth.php');
        }
        else{
            setcookie('login', $_POST['login'], 0, '/');
            setcookie('pass', $_POST['password'], 0, '/');
            $log=$_POST['login'];
            $pass=$_POST['password'];
        }
    }
    else{
        $log=$_COOKIE['login'];
        $pass=$_COOKIE['pass'];
    }
    header("Refresh:0");
    $finduser->execute(array(':l' => $log,':p' => $pass));
    $res2_finduser = $finduser->fetchAll();
    setcookie('user_id', $res2_finduser[0]['id'], 0, '/');
    $finduser_role = $pdo->prepare('
    select * from customer where user_id = :ui
    ');
    $finduser_role->execute(array(':ui' => $res2_finduser[0]['id']));
    $res_finduser_role = $finduser_role->fetchAll();
    $role = 0;
    if ($log == 'admin') {
        $role = 2;
    } elseif (count($res_finduser_role) == 0) {
        $role = 1;
    }
    setcookie('role', $role, 0, '/');
    header('Location: ../index.php');
}