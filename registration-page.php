<?php
    session_start();

    $auth = $_SESSION['auth'] ?? null;
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/registration-style.css">
    <title>Registration</title>
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
                <?php if(!$auth) { ?>
                    <a href="login.php" class="btn">
                        Войти
                    </a>
                <?php } else {?>
                    <a href="exit.php" class="btn">
                        Выйти
                    </a>
                <?php } ?>
            </div>
        </div>
    </header>

    <main class="main">
        <div class="container main-container">
            <div class="main-left-side">
                <div class="main-text-field">
                    <span class="main-span">FLAT DISCOUNT</span>
                    <p class="main-p">
                        Claim upto 50% offer on the most popular services...
                    </p>
                    <p class="secondary-p">
                        Our Retreat is not meant to be an occasional treat, but rather a part of your routine that restores balance to your daily life.
                    </p>
                </div>
                <a class="special-offer-card" href="">
                    <div class="special-offer-card-info">
                        <span class="special-offer-card-info-text">massage</span>
                        <span class="special-offer-card-info-text"><b style="font-size: 36px;">50%</b></span>
                        <span class="special-offer-card-info-text">Discount</span>
                    </div>
                </a>
            </div>
            <div class="main-right-side">
                <div class="form-field">
                    <form class="form" action="registration.php" method="post">
                        <input class="form-input" name="name" type="text" placeholder="Имя">
                        <input class="form-input" name="login" type="text" placeholder="Логин">
                        <input class="form-input" name="password" type="password" placeholder="Пароль">
                        <label class="form-label-date" for="birthday">Дата рождения</label>
                        <input class="form-input form-input-date" name="birthday" type="date">
                        <input class="form-input btn" name="submit" type="submit" value="Зарегестрироваться">
                    </form>
                </div>
            </div>
        </div>
    </main>

    <section class="section-offers">
        <div class="container section-offers-container">
                <ul class="section-offers-list">
                    <li class="section-offers-list-item">
                        <img src="./img/massage.png" class="section-offers-list-item-img" alt="massage">
                        <h5 class="section-offers-list-item-header">
                            Spa & Massage
                        </h5>
                        <p class="section-offers-list-item-info">
                            Your wellness goals and the areas of preference, then unwind with a customized massage experience.
                        </p>
                        <button class="section-offers-list-item-btn">Read more</button>
                    </li>
                    <li class="section-offers-list-item">
                        <img src="./img/hair.png" class="section-offers-list-item-img" alt="hair">
                        <h5 class="section-offers-list-item-header">
                            Hair & Beauty
                        </h5>
                        <p class="section-offers-list-item-info">
                            Combining skin-type-specific cleansing & toning, exfoliation, deep-pore cleansing extractions customized treatment.
                        </p>
                        <button class="section-offers-list-item-btn">Read more</button>
                    </li>
                    <li class="section-offers-list-item">
                        <img src="./img/body-treatments.png" class="section-offers-list-item-img" alt="body-treatments">
                        <h5 class="section-offers-list-item-header">
                            Body Treatments
                        </h5>
                        <p class="section-offers-list-item-info">
                            Offers therapeutic benefits such as relief of muscle tension and increased circulation to the areas worked.
                        </p>
                        <button class="section-offers-list-item-btn">Read more</button>
                    </li>
                </ul>
            </div>
        </div>
    </section>

</body>

</html>
