<?php
if($_COOKIE['role']!=0){
    header('Location: ../index.php');
}
else{
    require_once ('pdo_insert.php');
    $del_ad=$_POST['del_serv'];
    $del_ad_arr = implode("','",$del_ad);
    if (count($del_ad)>0){
        $delete_addresses = $pdo->prepare("
delete from apartment where id in('".$del_ad_arr."')
");
        $delete_addresses->execute();
    }
    header('Location: ../pages/addresses.php');
}