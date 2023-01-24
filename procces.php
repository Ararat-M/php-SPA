<?php
session_start();

// получаем логины и пароли зарегестрированных пользователей
$file = file_get_contents('users.json');
$users = json_decode($file, TRUE);
unset($file);

function getUsersList() {
    global $users;

    $usersLoginAndHash[] = null;

    for ($i=0; $i < count($users); $i++) {
        $usersLoginAndHash[$i]['login'] = $users[$i]['login'];
        $usersLoginAndHash[$i]['hash'] = $users[$i]['password'];
    }

    return $usersLoginAndHash;
}

function existsUser($login) {
    global $users;

    for ($i=0; $i < count($users); $i++) { 

        if ($login !== $users[$i]['login']){
            continue;
        } else {
            return 1;
        }
    }

    return 0;
}

function checkPassword($login, $password) {
    global $users;

    for ($i=0; $i < count($users); $i++) { 

        if ($login !== $users[$i]['login']){
            continue;
        }

        if (password_verify($password, $users[$i]['password'])) {
            return 1;
        }
    }

    return 0;
}

function getCurrentUser() {

    if ( $_SESSION['auth'] ){
        $name = $_SESSION['name'];
        
        return $name;
    }
    
    return null;
}

function secToTime($secs)
{
    $hours = floor($secs / 3600);
    $secs = $secs % 3600;

    $minutes = floor($secs / 60);
    $secs = $secs % 60;

    return "$hours :  $minutes : $secs";
}

function checkBirthday() {
    $birthday = $_SESSION['birthday'];
    $monthBirthday = mb_substr($birthday, 5, 2);
    $dayBirthday = mb_substr($birthday, 8, 2);

    // Возвращяеться true если день рождение сегодня
    if (date("m.d") == ($monthBirthday . '.' . $dayBirthday)){
        return 1;
    }

    return 0;
}

function birthdayCalc() {
    $now = time();
    $birthday = $_SESSION['birthday'];
    $monthBirthday = mb_substr($birthday, 5, 2);
    $dayBirthday = mb_substr($birthday, 8, 2);

    // Проверяем день рождение в этом году или следующем
    if ($now - mktime(0,0,0,$monthBirthday,$dayBirthday) < 0) {
        $years = date('Y');
    } else {
        $years = date('Y') + 1;
    }

    $nextBirthdayDate = mktime(0,0,0,$monthBirthday,$dayBirthday, $years);
    $difference = $nextBirthdayDate - $now;
    $dayToBirthday = ceil($difference / 86400);

    return "Дней до подарка на день рождение $dayToBirthday!";
}

?>