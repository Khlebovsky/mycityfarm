<?php
require $_SERVER["DOCUMENT_ROOT"]."/data/db_data.php";
$id = $_GET['id'];
$link = mysqli_connect($db_host, $db_user, $db_psswd, $db_name);
mysqli_set_charset($link, "utf8");
$query = mysqli_query($link, 'SELECT * FROM `wiki` WHERE `id` = '.$id.';');
$article = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $article['title']; ?></title>
	<?php 
        require $_SERVER["DOCUMENT_ROOT"]."/templates/source.php";
    ?>
</head>
<body>

	<?php 
        require $_SERVER["DOCUMENT_ROOT"]."/templates/menu.php";
	?>

	<div class="article">

		<?php 
			echo "<h1>$article[title]</h1>";
			echo "<a href='../for-personal/'>Вернуться к списку статей</a>";
			echo "<span>$article[text]</span>";
		?>

	</div>
	
</body>
</html>