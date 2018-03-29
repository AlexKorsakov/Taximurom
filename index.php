<?php
//проверка на аутентификацию
//инфа о юзере
include("config/config.php");
print_r($_GET);

if (!isset($_COOKIE['PhoneNumber'])) {
    include(__DIR__ . "/modules/index.php");
    print_r(__ROUTE__);
    exit;
} else {
    //проверка по БД
    $sql = "SELECT id, name, pswd, user_type_id, avto_name, avto_number, avto_foto, phone_number FROM user WHERE phone_number='" . mysql_real_escape_string($_COOKIE['PhoneNumber']) . "'";
    $user_information = mysql_query($sql) or die(mysql_error());
    $user_information = mysql_fetch_assoc($user_information);
    //print_r($user_information['id']);
    //echo "мы в индексе";
}

switch (__ROUTE__) {
    case "registration":
        include(__DIR__ . "/modules/registration.php");
        break;
    case "driver_interface":
        include(__DIR__ . "/modules/interface.php");
        break;
    case "user_interface":
        include(__DIR__ . "/modules/interface.php");
        break;
    case "profile":
        include(__DIR__ . "/modules/profile.php");
        break;
    case "interface":
        include(__DIR__ . "/modules/interface.php");
        break;
    case "menu":
        include(__DIR__ . "/menu.php");
        break;
    case "":
        include(__DIR__ . "/modules/index.php");
        break;
    case "/":
        include(__DIR__ . "/modules/index.php");
        break;
    default:
        include(__DIR__ . "/modules/index.php");
        break;
}
?>