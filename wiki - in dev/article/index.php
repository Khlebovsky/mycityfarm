<?php
require $_SERVER["DOCUMENT_ROOT"]."/data/db_data.php";
$id = $_GET['id'];
$link = mysqli_connect($db_host, $db_user, $db_psswd, $db_name);
mysqli_set_charset($link, "utf8");
$query = mysqli_query($link, 'SELECT * FROM `wiki` WHERE `id` = '.$id.';');
$article = mysqli_fetch_assoc($query);
echo '<!DOCTYPE html>
<html>
<head>
	<title>'.$article['title'].' || MyCityFarm Wiki</title>
</head>
<body>
<b>'.$article['title'].'</b><br />
'.$article['text'].'
</body>
</html>';
?>