<?php


//Тут производится регистрация нового юзера, то есть:
//создание(проверка) куки с номером телефона,
//проверка номера на наличие его в базе,
//генерация ключа для отправки в смс и верификации,
//отправка смс,
//аутентификация по ключу и изменение статуса с "на авторизован", на "авторизован".


/*
////////////////////////////////
Все запросы к базе перевести на
mysql_real_escape_string 
Это позволит защитить от SQL-иньекции.
///////////////////////////////////
*/


$form_pass = 0;


function GenerateKey($key) //функция создания случайного ключа
{
    //создание ключа
    $Simb_array = array('1', '2', '3', '4', '5', '6',
        '7', '8', '9', '0');
    $key = "";
    for ($i = 0; $i < 5; $i++) {
        // Вычисляем случайный индекс массива
        $index = rand(0, count($Simb_array) - 1);
        $key .= $Simb_array[$index];
    }
    return $key;
}

function send($host, $port, $login, $password, $phone, $text, $sender = false, $wapurl = false)
{
    echo "/Привет из функции";
    echo $phone;
    echo "/";
    $fp = fsockopen($host, $port, $errno, $errstr);
    if (!$fp) {
        return "errno: $errno \nerrstr: $errstr\n";
    }
    fwrite($fp, "GET /messages/v2/send/" .
        "?phone=" . rawurlencode($phone) .
        "&text=" . rawurlencode($text) .
        ($sender ? "&sender=" . rawurlencode($sender) : "") .
        ($wapurl ? "&wapurl=" . rawurlencode($wapurl) : "") .
        "  HTTP/1.0\n");
    fwrite($fp, "Host: " . $host . "\r\n");
    if ($login != "") {
        fwrite($fp, "Authorization: Basic " .
            base64_encode($login . ":" . $password) . "\n");
    }
    fwrite($fp, "\n");
    $response = "";
    while (!feof($fp)) {
        $response .= fread($fp, 1);
    }
    fclose($fp);
    list($other, $responseBody) = explode("\r\n\r\n", $response, 2);
    return $responseBody;
    /*
        $sql = "SELECT pswd FROM user WHERE phone_number='" . $PhoneNumber . "'";
        $Auth = mysql_query($sql) or die(mysql_error());
        if ($Auth = mysql_fetch_assoc($Auth)) */
}

function CheckUser($PhoneNumber) //функция проверки номера юзера на существование в базе
{
    //проверка, есть ли номер в базе
    if (!empty($user_information)) //если пришел ответ - обновляем пароль в строке юзера с этим номером и отсылаем ему новый пароль
    {
        //посылаем новый пароль юзеру

    } else //если не пришел - создаем новую запись  и опять же отсылаем пароль
    {
        $pass = GenerateKey("");
        $sql = "INSERT INTO user (phone_number, pswd, type, cookie) VALUES ('" . mysql_real_escape_string($PhoneNumber) . "', '" . $pass . "')";
        mysql_query($sql) or die(mysql_error());

        //header("Location: register.php");
    }
    return true;
}


if ($_POST['PhoneNumber'] != "") {
    $PhoneNumber = trim($_POST['PhoneNumber']); //Телефонный номер
    //Проверка корректности введенного номера
    echo $PhoneNumber . "<br>";
    if (iconv_strlen($PhoneNumber) != 10) {
        echo "Количество цифр не равно 10"; //сделать вывод ошибки юзеру
        header('Location: /registration');
        exit;
    } else {
        if ($PhoneNumber[0] < '9') {
            echo "не 9 ";
            header('Location: /registration');
            exit;
        }
    }
    //создаем куки
    SetCookie("PhoneNumber", $PhoneNumber, time() + 3600 * 24 * 30); //Время жизни куки
    CheckUser($PhoneNumber);
    include('Location: /registration'); //перезагрузка чтобы заработали куки
}
if (isset($_COOKIE["PhoneNumber"])) //Проверка на существование кук
{
    $form_pass = 1;
}
if (isset($_POST['Password']) && isset($_COOKIE['PhoneNumber'])) //проверка на совпадение паролей
{
    //добавить проверку на валидность пароля
    $Password = $_POST['Password'];
    $sql = "SELECT id, user_type_id FROM user WHERE pswd='" . mysql_real_escape_string($Password) . "' AND phone_number='" . mysql_real_escape_string($_COOKIE["PhoneNumber"]) . "'";
    $Auth = mysql_query($sql) or die(mysql_error());
    if ($Auth = mysql_fetch_assoc($Auth)) {
        $ID = $Auth['id'];
        $TypeUser = $Auth['user_type_id'];
        $pass = GenerateKey("");

        $sql = "UPDATE user SET pswd='" . mysql_real_escape_string($pass) . "' WHERE id='" . mysql_real_escape_string($ID) . "'"; //тут меняется статус юзера и генерится новый пароль
        mysql_query($sql) or die(mysql_error());
        $form_pass = 2;

    } else
        echo "FALSE";
}

$smarty->assign('form_pass', $form_pass);
$smarty->display("registration.tpl");