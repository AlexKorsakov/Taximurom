<?php
include "../config/config.php";


$PhoneNumber = $_COOKIE["PhoneNumber"];
$sql = "SELECT * FROM request WHERE status_id='2' AND driver_id='$PhoneNumber'"; //ищем заявку, выполняющуюся в данный момент
$result = mysql_query($sql) or die(mysql_error());
$count_z = mysql_num_rows($result);

//Новая запись в заявку
if (isset($_POST['Accept'])) { //Когда нажали "Принять", статус=2


    $ID = $_POST['id'];
    $sql = "UPDATE request SET driver_id = '$PhoneNumber', status_id = '2' WHERE id='$ID'";
    $result = mysql_query($sql) or die(mysql_error());
    //print_r($result);
    $smarty->assign('asd', $_POST['id']);
    $sql = "SELECT * FROM request WHERE status_id='2' AND driver_id='$PhoneNumber'";
    $result = mysql_query($sql) or die(mysql_error());

    $array_request = array();
    while ($array_result = mysql_fetch_array($result)) {
        $array_request[$array_result['id']]['description'] = $array_result['description'];
        $array_request[$array_result['id']]['adress'] = $array_result['adress'];
        $array_request[$array_result['id']]['time'] = $array_result['time'];
    }
    //$smarty->assign('v_request', $array_request);
    //$smarty->assign('Status_zayavki', 1);

    print_r($_POST);
    header('Location: index.php');
    exit;
}

if (isset($_POST['Perform'])) { //Выполнить заявку, статус=3
    $ID = $_POST['id'];
    $sql = "UPDATE request SET status_id = '3' WHERE id='$ID'";
    $result = mysql_query($sql) or die(mysql_error());
    //$smarty->assign('Status_zayavki', 0);
    header('Location: interface.php');
    exit;
}


if ($count_z == 1) //проверка на одновременно выполняющиеся заявки, вывод одной заявки
{
    //echo " // ";
    //echo $count_z;
    while ($array_result = mysql_fetch_array($result)) {
        $array_request[$array_result['id']]['id'] = $array_result['id'];
        $array_request[$array_result['id']]['description'] = $array_result['description'];
        $array_request[$array_result['id']]['adress'] = $array_result['adress'];
        $array_request[$array_result['id']]['time'] = $array_result['time'];
        $array_request[$array_result['id']]['status_id'] = $array_result['status_id'];
    }
    $smarty->assign('PerformRequest', $array_request); //выполняющаяся заявка
    $smarty->assign('Status_zayavki', 1);
} else if ($count_z == 0) //вывод всех свободных заявок, можно принимать
{
    $query = "SELECT * FROM request WHERE status_id=1";
    $result = mysql_query($query) or die(mysql_error());
    $array_request = array();
    while ($array_result = mysql_fetch_array($result)) {
        $array_request[$array_result['id']]['id'] = $array_result['id'];
        $array_request[$array_result['id']]['description'] = $array_result['description'];
        $array_request[$array_result['id']]['adress'] = $array_result['adress'];
        $array_request[$array_result['id']]['time'] = $array_result['time'];
        $array_request[$array_result['id']]['status_id'] = $array_result['status_id'];
    }
    $smarty->assign('requests', $array_request);
    $smarty->assign('Status_zayavki', 0);
} else {
    $warn = "Warning: Количество выполняемых в данный момент заявок не равно 1 или не равно 0";
    $smarty->assign('warn', $warn); //выполняющаяся заявка
    $smarty->assign('Status_zayavki', 2);
}


$smarty->display("driver_interface.tpl");
?>