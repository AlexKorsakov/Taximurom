<?php
include "../config/config.php";

//Этот файл выводит список таксистов

define('SMARTY_DIR','smarty/');
require(SMARTY_DIR.'Smarty.class.php');
$smarty = new Smarty ();

$smarty->template_dir='templates/default/tpl/';
$smarty->compile_dir='cache/';



//Вывод таксистов
$query = "SELECT * FROM user";
$result = mysql_query($query) or die(mysql_error());
$array_user= array();
while($array_result = mysql_fetch_assoc($result))
{
    if($array_result['user_type_id']==2)
    {
        $array_user[$array_result['id']]['name'] = $array_result['name'];
        $array_user[$array_result['id']]['avto_name'] = $array_result['avto_name'];
        $array_user[$array_result['id']]['avto_number'] = $array_result['avto_number'];
    }
}
$smarty->assign('users',$array_user);

$smarty->display("taxists.tpl");

?>