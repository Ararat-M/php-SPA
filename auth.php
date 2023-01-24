<?php
session_start();

$login = $_POST['login'] ?? null;
$password = $_POST['password'] ?? null;

// получаем логины и пароли зарегестрированных пользователей
$file = file_get_contents('users.json');
$users = json_decode($file, TRUE);
unset($file);

$auth = $_SESSION['auth'] ?? null;

if (null !== $users) {
    
    for ($i = 0; $i < count($users); $i++) {
        
        if ($login == $users[$i]['login'] && password_verify($password, $users[$i]['password'])) {
            
            // Пишем в сессию информацию о том, что мы авторизовались:
            $_SESSION['auth'] = true;

            // Пишем в сессию логин и id пользователя
            $_SESSION['id'] = $i;
            $_SESSION['login'] = $login;
            $_SESSION['name'] = $users[$i]['name'];
            $_SESSION['birthday'] = $users[$i]['birthday'];
            $_SESSION['entryTime'] = time();

            header("Location: index.php");
            exit;
        }
    }
    header("Location: login.php");
    exit;
}

?>