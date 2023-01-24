<?php

$name = trim($_POST['name'] ?? null);
$login =trim($_POST['login'] ?? null);
$password = trim($_POST['password'] ?? null);
$birthday = $_POST['birthday'];

if (!empty($name) && !empty($login) && !empty($password) && !empty($birthday)) {
    $file = file_get_contents('users.json');      
    $taskList = json_decode($file,TRUE);
    unset($file);

    $taskList[] = array('name'=>$name, 'login' => $login, 'password' => password_hash($password, PASSWORD_DEFAULT), 'birthday' => $birthday,);
    file_put_contents('users.json',json_encode($taskList));
    unset($taskList);
    header('Location: index.php');
} else {
    echo "error";
}