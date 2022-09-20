<?php
if($_COOKIE['role']!=1){
    header('Location: ../index.php');
}
else{
    require_once ('pdo_insert.php');
    $del_serv=$_POST['del_serv'];
    $del_serv_arr = implode("','",$del_serv);
    $empid=$pdo->prepare('select emp.id from employees as emp join user on emp.user_id=user.id where user.id=:ui');
    $empid->execute(array(':ui'=>$_COOKIE['user_id']));
    $ei=$empid->fetch();
    if (count($del_serv)>0){
        $delete_services = $pdo->prepare("
delete from position where employee_id=:e and service_id in('".$del_serv_arr."')
");
        $delete_services->execute(array(':e'=>$ei[0]));
    }
    header('Location: ../pages/list_emp_serv.php');
}