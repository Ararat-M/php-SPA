<?php
    session_start();

    $auth = $_SESSION['auth'] ?? null;
    $id = $_SESSION['id'] ?? null;
    $name = $_SESSION['name'] ?? null;
    $birthday = $_SESSION['birthday'] ?? null;
    $entryTime = $_SESSION['entryTime'] ?? null;
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Account</title>
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
            <?php 
            if(!$auth) { ?>
                <a href="registration-page.php" class="btn">
                    Регистрация
                </a>
            <?php } else {?>
               <a href="index.php" class="btn">
                    На главную
                </a>
            <?php }
            if(!$auth) { ?>
                <a href="login.php" class="btn">
                    Войти
                </a>
            <?php } else {?>
                <a href="exit.php" class="btn">
                Выйти
                </a>
            <?php }
            ?>
            </div>
        </div>
    </header>

    <main class="main">
        <div class="container main-container main-page-bg-img">
            <div class="main-text-field">
                <?php 
                if($auth) { ?>
                    <h1>Id: <?php echo $id ?></h1>
                    <h1>Логин: <?php echo $name ?></h1>
                    <h1>Дата рождение: <?php echo $birthday ?></h1>
                <?php }
                ?>
        </div>
    </main>
</body>

</html>