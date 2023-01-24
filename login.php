<?php
    session_start();

    $auth = $_SESSION['auth'] ?? null;

    if ($auth) {
        header("Location: index.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/registration-style.css">
    <link rel="stylesheet" href="./css/login-style.css">
    <title>Login</title>
</head>

<body>
    <header class="header">
        <div class="container header-container">
            <div class="logo">
                <a href="./index.php" class="logo-link">
                    <img src="./img/capybara-svg.svg" class="logo-img" alt="">
                    <span class="logo-text">Relax Island</span>
                </a>
            </div>
            <div class="btns">
                <a href="index.php" class="btn">
                    На главную
                </a>
                <a href="registration-page.php" class="btn">
                    Регистрация
                </a>
            </div>
        </div>
    </header>

    <main class="main">
        <div class="container main-container">
            <div class="form-field">
                <form class="form" action="auth.php" method="post">
                    <input class="form-input" name="login" type="text" placeholder="Логин">
                    <input class="form-input" name="password" type="password" placeholder="Пароль">
                    <input class="form-input btn" name="submit" type="submit" value="Войти">
                </form>
            </div>
        </div>
    </main>

</body>

</html>