<?php
require $_SERVER["DOCUMENT_ROOT"]."/data/db_data.php";
$link = mysqli_connect($db_host, $db_user, $db_psswd, $db_name);
mysqli_set_charset($link, "utf8");
$query = mysqli_query($link, 'SELECT * FROM `cats` WHERE `main_cat_id` = 2;');
echo '<!DOCTYPE html>
<html>
<head>
	<title>MyCityFarm Wiki || Для персонального использования</title>
</head>
<body>';
	while($cat = mysqli_fetch_assoc($query)) {
		echo '<p>'.$cat['title'].'</p>';
		$query2 = mysqli_query($link, 'SELECT * FROM `subcats` WHERE `cat_id` = '.$cat['id'].';');
		if(mysqli_num_rows($query2) != 0) {
			while($subcat = mysqli_fetch_assoc($query2)) {
			echo '<p>'.$subcat['title'].'</p>';
			$query3 = mysqli_query($link, 'SELECT * FROM `wiki` WHERE `cat` = '.$cat['id'].' AND `subcat` = '.$subcat['id'].';');
				while($wiki = mysqli_fetch_assoc($query3)) {
					echo '<a href="/article/?id='.$wiki['id'].'">'.$wiki['title'].'</a>';
				}
			}
		}
		else {
			$query3 = mysqli_query($link, 'SELECT * FROM `wiki` WHERE `cat` = '.$cat['id'].';');
			while($wiki = mysqli_fetch_assoc($query3)) {
				echo '<a href="/article/?id='.$wiki['id'].'">'.$wiki['title'].'</a>';
			}
		}
	}
echo '</body>
</html>';
?>