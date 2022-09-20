<?php
if($_COOKIE['role']!=1){
    header('Location: ../index.php');
}
else{
    require_once ('pdo_insert.php');
    $new_serv=$_POST['add_serv'];

    if(count($new_serv)>0){
        $empid=$pdo->prepare('select emp.id from employees as emp join user on emp.user_id=user.id where user.id=:ui');
        $empid->execute(array(':ui'=>$_COOKIE['user_id']));
        $ei=$empid->fetch();
        foreach ($new_serv as $item){
            $add_emp_service = $pdo->prepare('
        insert into position (employee_id, service_id) values (:e, :s)
        ');
            $add_emp_service->execute(array(':e' => $ei[0], ':s' => $item));
        }
    }

    header('Location: ../pages/list_emp_serv.php');
}
