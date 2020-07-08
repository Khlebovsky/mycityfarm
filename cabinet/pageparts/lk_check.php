<?php
session_start();
require $_SERVER["DOCUMENT_ROOT"]."/api/data/db_data.php";
if($_SESSION['login'] == '' && $_SESSION['hash'] == '') {
	header('Locaion: /login'); // Сессия пуста, перекидываем на вход
}
else {
	$link = mysqli_connect($db_host, $db_user, $db_psswd, $db_name);
	mysqli_set_charset($link, "utf8");
	$query = mysqli_query($link, 'SELECT * FROM `users` WHERE `login` = "'.$_SESSION['login'].'" AND `hash` = "'.$_SESSION['hash'].'";');
	if(mysqli_num_rows($query) == 0) {
		mysqli_close($link);
		session_destroy();
		header('Location: /login'); //Проверка не прошла, разрываем сессию, перекидываем на вход
	}
	else {
		mysqli_close($link);
		//Проверка прошла успешно, мы в лк
	}
}
?>