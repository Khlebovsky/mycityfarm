<?php
session_start();
require $_SERVER["DOCUMENT_ROOT"]."/data/db_data.php";
if($_GET['action'] == '') {
	if($_SESSION['success_text'] != '') {
		$success_text = $_SESSION['success_text'];
		unset($_SESSION['success_text'];
	};
	echo '<!DOCTYPE html>
	<html>
	<head>
		<title>Главная</title>
	</head>
	<body>';
	echo $success_text;
	echo '<a href="/admin/?create_subcat">Создать категорию</a><br />
	<a href="/admin/?create_wiki">Создать статью</a>
	</body>
	</html>';
}
elseif($_GET['action'] == 'create_subcat') {
	if(isset($_POST['done'])) {
		$subcat_title = $_POST['subcat_title'];
		if(strlen($subcat_title) != 0) {
			$link = mysqli_connect($db_host, $db_user, $db_psswd, $db_name);
			mysqli_set_charset($link, "utf8");
			mysqli_query($link, 'INSERT INTO `subcats` (`id`, `title`) VALUES (NULL, "'.$subcat_title.'");');
			$_SESSION['success_text'] = '<p style="color:green">Изменения успешно сохранены!</p>';
			header('Location: /admin');
		} 
	}
	echo '<!DOCTYPE html>
	<html>
	<head>
		<title>Создать подкатегорию</title>
	</head>
	<body>
	<form method="POST" name="subcat_form" action="">
		<p>Введите название подкатегории:</p>
		<input type="text" name="subcat_title">
		<input type="submit" name="done">
	</form>
	</body>
	</html>';
}
?>