<?php 
    require $_SERVER["DOCUMENT_ROOT"]."/pageparts/check.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет || MyCityFarm</title>
    <?php 
        require 'templates/source.php';
    ?>
</head>
<body>
    <?php 
        require "templates/menu.php";
    ?>
    <div class="links-cabinet">
        <div class="name">
            <img src="/img/logo.png">
            <span>
                My City Farm
                <small>GT</small>
            </span>
        </div>
        <h2>Личный кабинет</h2>
        <div class="links-wrap">
            <a href="login/">Войти</a>
            <a href="register/">Создать аккаунт</a>
        </div>
    </div>
</body>
</html>