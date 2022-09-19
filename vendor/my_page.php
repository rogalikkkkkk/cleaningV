<?php
session_start();

if (isset($_COOKIE['role']) && $_COOKIE['role'] != 2) {
    require_once ('pdo_insert.php');
    if ($_COOKIE['role'] == 0) {
        $userinfo = $pdo->prepare('
        select * from user join customer as c on user.id = c.user_id where user.id = :ui  
        ');
        $userinfo->execute(array(':ui' => $_COOKIE['user_id']));
        $res_userinfo = $userinfo->fetchAll();

        $user_order = $pdo->prepare('
        select * from join_all where c_id=:ci
        ');
        $user_order->execute(array(':ci' => $_COOKIE['user_id']));
        $order_array=$user_order->fetchAll();


    } else {
        $userinfo = $pdo->prepare('
        select * from user join employees as e on user.id = e.user_id where user.id = :ui  
        ');
        $userinfo->execute(array(':ui' => $_COOKIE['user_id']));
        $res_userinfo = $userinfo->fetchAll();

        $empl_job = $pdo->prepare('
        select * from join_all where e_id=:ei
        ');
        $empl_job->execute(array('ei' => $_COOKIE['user_id']));
        $res_empl_job = $empl_job->fetchAll();
    }

} else {
    header("Location: ../index.php");
}

//здесь нужно достать все данные о пользователе или работнике и их заказах закинуть их в сессию??? чтоб в пагесах достать в нужных местах
//header("Location: ../pages/my_page.php");
