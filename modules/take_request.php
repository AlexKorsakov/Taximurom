<?php
include "../config/config.php";
//На этой странице производится изменение статуса заявки на "Выполняется"

define('SMARTY_DIR', '../smarty/');
require(SMARTY_DIR . 'Smarty.class.php');
$smarty = new Smarty ();

$smarty->template_dir = '../templates/default/tpl/';
$smarty->compile_dir = '../cache/';


print_r($_POST);
if (isset($_POST['driver_id']) && isset($_POST['request_id'])) {

    take_request($_POST['driver_id'], $_POST['request_id']);
}

function take_request($driver_id, $request_id) //Функция "Принять заявку", привязывает id водителя к заявке
{
    $sql = "UPDATE request SET driver_id='" . $driver_id . "' WHERE id='" . $request_id . "'";
    $TakeRequest = mysql_query($sql) or die(mysql_error());
}

$smarty->display("take_request.tpl");
?>