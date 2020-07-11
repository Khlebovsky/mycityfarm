<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить статью || MyCityFarm</title>
    <?php 
        require $_SERVER["DOCUMENT_ROOT"]."/templates/source.php";
    ?>
</head>
<body>

    <?php 
        require $_SERVER["DOCUMENT_ROOT"]."/templates/menu.php";
    ?>

    <div class="add-article">
        <div class="add-article-wrap">
            <h1>Добавить статью в помощник</h1>
            <form action="../thanks/" method="POST">
                <input type="text" name="title" id="title" placeholder="Название статьи" required>
                <textarea placeholder="Содержание" name="body" required></textarea>
                <button type="submit">Отправить</button>
            </form>
        </div>
    </div>
    
</body>
</html>