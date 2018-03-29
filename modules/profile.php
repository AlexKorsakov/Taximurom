<?php
//Тут функционал профиля
$PhoneNumber = $_COOKIE["PhoneNumber"];
$array_request = array();
$array_request[$user_information['id']]['id'] = $user_information['id'];
$array_request[$user_information['id']]['name'] = $user_information['name'];
$array_request[$user_information['id']]['user_type_id'] = $user_information['user_type_id'];
$array_request[$user_information['id']]['avto_name'] = $user_information['avto_name'];
$array_request[$user_information['id']]['avto_number'] = $user_information['avto_number'];

$smarty->assign('TaxiDriver', $array_request);
$smarty->assign('Status', 'Read');

if (isset($_GET["ReeWrite"])) { //Редактировать информацию
    if (isset($_GET["AvtoName"])) {
        $smarty->assign('TaxiDriver', $_GET["AvtoName"]);
    }
    $smarty->assign('Status', 'Write');
    $smarty->assign('UserStatus', $_GET['Type']);
}
$MakeTaxiDriver = 3;

if (isset($_POST["UserName"]) && isset($_POST["Avto"]) && isset($_POST["RegNumb"]) && isset($_POST["SendData"])) {
    print_r($_GET);
    echo " || ";

    //добавить валидацию
    if ($_GET['UserName'] != "") {
        $Username = mysql_real_escape_string($_GET['UserName']);
    }
    if ($_GET['Avto'] != "") {
        $Avto = mysql_real_escape_string($_GET['Avto']);
    }
    if ($_GET['RegNumb'] != "") {
        $RegNumb = mysql_real_escape_string($_GET['RegNumb']);
    }
    if ($_GET['Type'] != "") {

    }
    if (isset($_GET['MakeTaxiDriver'])) {
        $MakeTaxiDriver = 4;
    } else
        $MakeTaxiDriver = mysql_real_escape_string($_GET['Type']);
    /*
        $uploaddir = '/modules/images/';
        $uploadfile = $uploaddir.basename($_FILES['uploadfile']['name']

        /*
        $allowedExts = array("jpg", "jpeg", "gif", "png");
        $extension = end(explode(".", $_FILES["file"]["name"]));
        if ((($_FILES["file"]["type"] == "image/gif")
                || ($_FILES["file"]["type"] == "image/jpeg")
                || ($_FILES["file"]["type"] == "image/png")
                || ($_FILES["file"]["type"] == "image/pjpeg"))
            && ($_FILES["file"]["size"] < 20000)
            && in_array($extension, $allowedExts)
        ) {
            if ($_FILES["file"]["error"] > 0) {
                echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
            } else {
                echo "Upload: " . $_FILES["file"]["name"] . "<br>";
                echo "Type: " . $_FILES["file"]["type"] . "<br>";
                echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
                echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

                if (file_exists("modules/images/" . $_FILES["file"]["name"])) {
                    echo $_FILES["file"]["name"] . " already exists. ";
                } else {
                    copy($_FILES["uploadfile"]["tmp_name"], "/modules/images/" . $_FILES["uploadfile"]["name"]);
                    echo "Stored in: " . "modules/images/" . $_FILES["file"]["name"];
                }
            }
        } else {
            echo "Invalid file<br />";
            print_r($_FILES);
        }
        print_r($_FILES);
        */

    //$Foto = $_FILES["file"]["name"];


    //Загружаем данные о юзере
    $sql = "UPDATE user
    SET name='" . $Username . "', user_type_id='" . $MakeTaxiDriver . "', avto_name='" . $Avto . "' , avto_number='" . $RegNumb . "'
    WHERE phone_number='" . $PhoneNumber . "'";

    //, avto_foto='" . $Foto . "'           <-в конец на 2 строки выше

    $AddUserInfo = mysql_query($sql) or die(mysql_error());
    header('Location: /profile');
}
if (isset($_GET["Forward"])) {
    $smarty->assign('Status', 'Read');
    header('Location: /profile');
}


$smarty->display("profile.tpl");
?>
