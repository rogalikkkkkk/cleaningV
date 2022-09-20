<?php
if($_COOKIE['role']!=1){
    header('Location: ../index.php');
}
else{
    require_once ('pdo_insert.php');

    $added_serv = $pdo->prepare('
select services.id as sid,services.name as aname, services.cost as cost, eq.name as ename 
from position join employees on employees.id=position.employee_id join services on position.service_id=services.id 
join services_equipment as s_e on services.id=s_e.service_id 
join equipment as eq on eq.id=s_e.equipment_id 
where employees.user_id=:eid
');
    $added_serv->execute(array(':eid'=>$_COOKIE['user_id']));
    $res_ad_serv = $added_serv->fetchAll();
    $count_added=count($res_ad_serv);
    $res_added_serv=array();
    $addedid=array();
    foreach ($res_ad_serv as $arr){
        array_push($addedid,$arr['sid']);
        if(!array_key_exists($arr['sid'],$res_added_serv)){
            $res_added_serv[$arr['sid']]['id']=$arr['sid'];
            $res_added_serv[$arr['sid']]['name']=$arr['aname'];
            $res_added_serv[$arr['sid']]['cost']=$arr['cost'];
            $res_added_serv[$arr['sid']]['ename']=array();
        }
        array_push($res_added_serv[$arr['sid']]['ename'],$arr['ename']);
    }

    $added_id_arr = implode("','",$addedid);
    $not_added_serv = $pdo->prepare("
select services.id as sid,services.name as aname, services.cost as cost, eq.name as ename 
from services join services_equipment as s_e on services.id=s_e.service_id join equipment as eq on eq.id=s_e.equipment_id 
where services.id not in ('".$added_id_arr."')
");
    $not_added_serv->execute();
    $res_not_ad_serv = $not_added_serv->fetchAll();
    $count_not_added=count($res_not_ad_serv);
    $res_not_added_serv=array();
    foreach ($res_not_ad_serv as $arr){
        if(!array_key_exists($arr['sid'],$res_not_added_serv)){
            $res_not_added_serv[$arr['sid']]['id']=$arr['sid'];
            $res_not_added_serv[$arr['sid']]['name']=$arr['aname'];
            $res_not_added_serv[$arr['sid']]['cost']=$arr['cost'];
            $res_not_added_serv[$arr['sid']]['ename']=array();
        }
        array_push($res_not_added_serv[$arr['sid']]['ename'],$arr['ename']);
    }
}
