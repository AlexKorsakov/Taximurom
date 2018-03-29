<?php
include "../config/config.php";



$smarty->assign('title',"Такси Муром");
//Вывод данных из таблицы Заявок
$query = "SELECT * FROM request ";
$result = mysql_query($query)  or die(mysql_error());
$array_request= array();

while ($array_result = mysql_fetch_assoc($result))
{
    if($array_result['status_id'] == 1)           //проверка статуса 1=Ожидается
    {
        $array_request[$array_result['id']]['id'] = $array_result['id'];
        $array_request[$array_result['id']]['description'] = $array_result['description'];
        $array_request[$array_result['id']]['adress'] = $array_result['adress'];
        $array_request[$array_result['id']]['time'] = $array_result['time'];
    }
    //print_r($array_result);
    //$array_request[$array_result['id']]['status_id'] = $array_result['status_id'];

}
$smarty->assign('requests',$array_request);

$smarty->display("requests.tpl");

?>