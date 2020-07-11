<?php
require $_SERVER["DOCUMENT_ROOT"]."/data/db_data.php";
$link = mysqli_connect($db_host, $db_user, $db_psswd, $db_name);
mysqli_set_charset($link, "utf8");
$query = mysqli_query($link, 'SELECT * FROM `cats` WHERE `main_cat_id` = 2 ORDER BY `id`;');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>MyCityFarm Wiki || Для личных целей</title>
	<?php 
        require $_SERVER["DOCUMENT_ROOT"]."/templates/source.php";
    ?>
</head>
<body>
	
	<div class="top-fixed">
		<strong>Wi<small>k</small>i</strong>
		<small>Базовый помощник</small>
	</div>

	<?php 
        require $_SERVER["DOCUMENT_ROOT"]."/templates/menu.php";
	?>
	<div class="articles-wrap">
		<div class="img"></div>
		<div class="content">
			<h1>Помощник - <br> 
				всё о сити-ферме в одном месте
				<img src="../img/green-1.png" class="green-1">
			</h1>
			<small>Выберите подходящий раздел и ознакомьтесь с обучающей статьей</small>
<?php
	while($cat = mysqli_fetch_assoc($query)) {
		echo '<div class="category">';
		echo '<h2 class="headline">'.$cat['title'].' <span class="arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></h2>';
		$query2 = mysqli_query($link, 'SELECT * FROM `subcats` WHERE `cat_id` = '.$cat['id'].' ORDER BY `id`;');
		if(mysqli_num_rows($query2) != 0) {
			while($subcat = mysqli_fetch_assoc($query2)) {
			echo '<div class="sub-category-wrap">';
			echo '<div class="sub-category">';
			echo '<h3>'.$subcat['title'].' <span class="arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></h3>';
			echo '<div class="article-wrap">';
			$query3 = mysqli_query($link, 'SELECT * FROM `wiki` WHERE `cat` = '.$cat['id'].' AND `subcat` = '.$subcat['id'].' ORDER BY `id`;');
				while($wiki = mysqli_fetch_assoc($query3)) {
					echo '<a href="/article/?id='.$wiki['id'].'">'.$wiki['title'].'</a>';
				}
				echo '</div>';
				echo '</div>';
				echo '</div>';
			}
		}
		else {
			$query3 = mysqli_query($link, 'SELECT * FROM `wiki` WHERE `cat` = '.$cat['id'].';');
			while($wiki = mysqli_fetch_assoc($query3)) {
				echo '<a href="/article/?id='.$wiki['id'].'">'.$wiki['title'].'</a>';
			}
		}
		echo '</div>';
	}
?>
		</div>
	</div>
</body>
</html>