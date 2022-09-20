<?php
require_once ('pdo_insert.php');

$all_serv = $pdo->prepare('
select services.id as sid,services.name as aname, services.cost as cost, eq.name as ename 
from services left outer join services_equipment as s_e on services.id=s_e.service_id join equipment as eq on eq.id=s_e.equipment_id
');
$all_serv->execute();
$res_serv = $all_serv->fetchAll();
$res_all_serv=array();
foreach ($res_serv as $arr){
    if(!array_key_exists($arr['sid'],$res_all_serv)){
        $res_all_serv[$arr['sid']]['id']=$arr['sid'];
        $res_all_serv[$arr['sid']]['name']=$arr['aname'];
        $res_all_serv[$arr['sid']]['cost']=$arr['cost'];
        $res_all_serv[$arr['sid']]['ename']=array();
    }
    array_push($res_all_serv[$arr['sid']]['ename'],$arr['ename']);
}
$all_equip=$pdo->prepare('
select id, name from equipment
');
$all_equip->execute();
$res_all_equip=$all_equip->fetchAll();

