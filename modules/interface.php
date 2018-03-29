<?php
//Тут функционал юзерского интерфейса


$Status = $user_information['user_type_id'];
$smarty->assign('UserType', $Status);
$smarty->display("interface.tpl");


?>