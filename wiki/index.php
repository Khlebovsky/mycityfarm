<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Помощник || MyCityFarm</title>
    <?php 
        require $_SERVER["DOCUMENT_ROOT"]."/templates/source.php";
    ?>
</head>
<body>

    <?php 
        require $_SERVER["DOCUMENT_ROOT"]."/templates/menu.php";
    ?>

    <div class="wrapper">
        <h2>Выберите программу для обучения</h2>
        <small>Для каких целей вам помощник</small>
        <div class="categories">
            <a href="#" onclick="alert('Данный раздел в разработке')">
                <i class="fa fa-user-o" aria-hidden="true"></i>
                <h2>Для бизнеса</h2>
                <span>Упорядоченная структура готовых решений, бизнес-моделей, а также сопровождение в развитии бизнеса.</span>
            </a>
            <a href="for-personal/">
                <i class="fa fa-envira" aria-hidden="true"></i>
                <h2>Для личных целей</h2>
                <span>Базовые знания, которые позволят познакомиться с сити-фермой.</span>
            </a>
            <a href="#" onclick="alert('Данный раздел в разработке')">
                <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                <h2>Для образовательных организаций</h2>
                <span>Курс лекций, статьей и лабораторных работ для изучения способов прогрессивного растениеводства.</span>
            </a>
        </div>
        <a href="add-article/" class="add-article-text">Добавить статью</a>
    </div>

</body>
</html>