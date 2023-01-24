<?php
    include 'procces.php';
    session_start();

    $auth = $_SESSION['auth'] ?? null;
    $id = $_SESSION['id'] ?? null;
    $name = $_SESSION['name'] ?? null;
    $birthday = $_SESSION['birthday'] ?? null;
    $specOffersTimeOut = secToTime(86400 - (time() - $_SESSION['entryTime']));
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Relax Island</title>
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
            <?php 
            if($auth) { ?>
                <span style="font-size: 24px;"><?php echo $_SESSION['login'] ?></span>
            <?php } 
            ?>
            <div class="btns">
            <?php 
            if(!$auth) { ?>
                <a href="registration-page.php" class="btn">
                    Регистрация
                </a>
            <?php } else {?>
               <a href="account.php" class="btn">
                    Личный кабинет
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
                <span class="main-span">Welcome to Relax Island!!!</span>
                <p class="main-p">
                    Bring The well being & beauty naturally!!!
                </p>
                <p class="secondary-p">
                    Your body does a lot for you, and your caring therapist can help you return the favor in a way that benefits both your physical and mental wellness.
                </p>
            </div>
            <?php
            if($auth) { 
            ?>
                <h3> До конца персональной скидки осталось <?php echo $specOffersTimeOut ?> </h3>
            <?php

            if(!checkBirthday()) { ?>
                <h3> <?php echo birthdayCalc() ?> </h3>
            <?php } else { ?>
                <h3>С днем рождения! специально для вас сегодня скидка 5% на любые услуги</h3>

            <?php }
            }
            ?>
        </div>
    </main>

</body>

</html>