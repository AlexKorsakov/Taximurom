<?php
include "../config/config.php";

//Заявки
$query = "SELECT * FROM request";
$result = mysql_query($query) or die(mysql_error());
$array_request = array();
while ($array_result = mysql_fetch_assoc($result)) {
    $array_request[$array_result['id']]['id'] = $array_result['id'];
    $array_request[$array_result['id']]['description'] = $array_result['description'];
    $array_request[$array_result['id']]['adress'] = $array_result['adress'];
    $array_request[$array_result['id']]['time'] = $array_result['time'];
    $array_request[$array_result['id']]['status_id'] = $array_result['status_id'];
}
$smarty->assign('requests', $array_request);


//Пользователи
$sql = "SELECT * FROM user WHERE user_type_id='3'";
$result = mysql_query($sql) or die(mysql_error());
$array_request = array();
while ($array_result = mysql_fetch_assoc($result)) {
    $array_request[$array_result['id']]['id'] = $array_result['id'];
    $array_request[$array_result['id']]['name'] = $array_result['name'];
    $array_request[$array_result['id']]['avto_name'] = $array_result['avto_name'];
    $array_request[$array_result['id']]['avto_number'] = $array_result['avto_number'];
    $array_request[$array_result['id']]['avto_foto'] = $array_result['avto_foto'];
    $array_request[$array_result['id']]['phone_number'] = $array_result['phone_number'];
}
$smarty->assign('Users', $array_request);


//Они отправили заявку чтобы стать таксистом
$sql = "SELECT * FROM user WHERE user_type_id='4'";
$result = mysql_query($sql) or die(mysql_error());
$array_request = array();
while ($array_result = mysql_fetch_assoc($result)) {
    $array_request[$array_result['id']]['id'] = $array_result['id'];
    $array_request[$array_result['id']]['name'] = $array_result['name'];
    $array_request[$array_result['id']]['avto_name'] = $array_result['avto_name'];
    $array_request[$array_result['id']]['avto_number'] = $array_result['avto_number'];
    $array_request[$array_result['id']]['avto_foto'] = $array_result['avto_foto'];
    $array_request[$array_result['id']]['phone_number'] = $array_result['phone_number'];
}
$smarty->assign('Not_yet_driver', $array_request);



if(isset($_POST["not_yet_driver_id"]) && isset($_POST["Confirm"]))
{
    $ID = $_POST["not_yet_driver_id"];
    $sql = "UPDATE user SET user_type_id='2' WHERE id='".$ID."'";
    $result = mysql_query($sql) or die(mysql_error());
    header('Location: admin.php');
}



//Таксисты
$sql = "SELECT * FROM user WHERE user_type_id='2'";
$result = mysql_query($sql) or die(mysql_error());

$array_request = array();
while ($array_result = mysql_fetch_assoc($result)) {
    $array_request[$array_result['id']]['id'] = $array_result['id'];
    $array_request[$array_result['id']]['name'] = $array_result['name'];
    $array_request[$array_result['id']]['avto_name'] = $array_result['avto_name'];
    $array_request[$array_result['id']]['avto_number'] = $array_result['avto_number'];
    $array_request[$array_result['id']]['avto_foto'] = $array_result['avto_foto'];
    $array_request[$array_result['id']]['phone_number'] = $array_result['phone_number'];
}
$smarty->assign('Drivers', $array_request);

if(isset($_POST["drv_id"]) && isset($_POST["EditDriver"]))
{
    $ID = $_POST["drv_id"];
    $sql = "UPDATE user SET user_type_id='2' WHERE id='".$ID."'";
    $result = mysql_query($sql) or die(mysql_error());
    header('Location: admin.php');
}





$smarty->display("admin.tpl");
?>