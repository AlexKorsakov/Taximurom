<?php


$PhoneNumber = $_COOKIE["PhoneNumber"];
//Новая запись в заявку
if (isset($_POST['description']) && isset($_POST['adress']) && isset($_POST['ins'])) {
    $today = date("Y-m-d H:i:s"); //время на час вперед
    $Description = $_POST['description'];
    $Adress = $_POST['adress'];
    $sql = "INSERT INTO request (description, adress, user_id) VALUES ('$Description', '$Adress', '$PhoneNumber')";
    $result = mysql_query($sql) or die(mysql_error());
}


$query = "SELECT * FROM request WHERE user_id='" . $PhoneNumber . "'"; //Получаем все заявки, связанные с этим номером
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


$smarty->display("interface.tpl");
?>