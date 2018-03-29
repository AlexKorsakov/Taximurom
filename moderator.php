<?php
include "config/config.php";

$smarty->assign('title',"Такси Муром");
//Вывод данных из таблицы Заявок
$query = "SELECT * FROM request ";
$result = mysql_query($query)  or die(mysql_error());
$array_request= array();

while ($array_result = mysql_fetch_assoc($result))          //заявки в ожидании
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


//Вывод таксистов
$query = "SELECT * FROM user";
$result = mysql_query($query) or die(mysql_error());
$array_driver= array();
while($array_result = mysql_fetch_assoc($result))           //таксисты
{
    if($array_result['user_type_id']==2)
    {
        $array_driver[$array_result['id']]['id'] = $array_result['id'];
        $array_driver[$array_result['id']]['name'] = $array_result['name'];
        $array_driver[$array_result['id']]['avto_name'] = $array_result['avto_name'];
        $array_driver[$array_result['id']]['avto_number'] = $array_result['avto_number'];
    }
}
$smarty->assign('drivers',$array_driver);

//Пользователи вывод
$query = "SELECT * FROM user";
$result = mysql_query($query) or die(mysql_error());
$array_user= array();
while($array_result = mysql_fetch_assoc($result))           //Юзеры
{
    if($array_result['user_type_id']==3)
    {
        $array_user[$array_result['id']]['phone_number'] = $array_result['phone_number'];
        $array_user[$array_result['id']]['id'] = $array_result['id'];

    }
}
$smarty->assign('users',$array_user);




if (isset($_POST['MakeDriver']))
{

}


$smarty->display("moderator.tpl");
?>
