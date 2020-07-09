<?php
require $_SERVER["DOCUMENT_ROOT"]."/pageparts/lk_check.php";
if(isset($_GET['exit'])) {
	//выход из аккаунта
	session_destroy();
	header('Location: /');
}
if(isset($_GET['light_on'])) {
	$link = mysqli_connect($db_host, $db_user, $db_psswd, $db_name);
	mysqli_set_charset($link, "utf8");
	mysqli_query($link, 'UPDATE `farms` SET `light` = 1 WHERE `farms`.`id` = 1;');
}
if(isset($_GET['light_off'])) {
	$link = mysqli_connect($db_host, $db_user, $db_psswd, $db_name);
	mysqli_set_charset($link, "utf8");
	mysqli_query($link, 'UPDATE `farms` SET `light` = 0 WHERE `farms`.`id` = 1;');
}
if($_GET['action'] == '') {
	//Главное меню
	$link = mysqli_connect($db_host, $db_user, $db_psswd, $db_name);
	mysqli_set_charset($link, "utf8");
	$query = mysqli_query($link, 'SELECT * FROM `users` WHERE `login` = "'.$_SESSION['login'].'";');
	$user_data = mysqli_fetch_assoc($query);
	$name = $user_data['name'];
	$query2 = mysqli_query($link, 'SELECT * FROM `farms` WHERE `id` = "1";');
	$farm_data = mysqli_fetch_assoc($query2);
	$temp = $farm_data['temp'];
	$wet = $farm_data['wet'];
	$light_val = $farm_data['light'];
	if($light_val == 1) {
		$light = 'включен';
		$light_switch_link = 'light_off';
		$light_swtich_title = 'Выключить';
	}
	else {
		$light = 'выключен';
		$light_switch_link = 'light_on';
		$light_swtich_title = 'Включить';
	}
	mysqli_close($link);
	if($_SESSION['success_text'] != '') {
		$success_text = $_SESSION['success_text'];
		unset($_SESSION['success_text']);
	}
	echo '<!DOCTYPE html>
		<html>
		<head>
			<meta charset="utf-8">
			<title>Личный кабинет</title>
		</head>
		<body>';
	echo $success_text;
	echo '<b>Здравствуйте, '.$name.'!</b>';
	echo '<br /><b>'.$huy.'</b>';
	echo '<br /><a href="/main/?exit">Выход из аккаунта</a><br />';
	echo '<p>Текущая температура: '.$temp.'°C</p>';
	echo '<p>Текущая влажность: '.$wet.'%</p>';
	echo '<p>Текущее состояние света: '.$light.' || <a href="/main/?'.$light_switch_link.'">'.$light_swtich_title.'</a></p>';
	echo '<a href="/main/?action=set_wet">Задать интервал полива</a><br /><br />
	<a href="/main/?action=set_light">Задать интервал включения/выключения света</a>
	</body>
	</html>';
}
elseif($_GET['action'] == 'set_light') {
	//Меню управления интервалами света
	$link = mysqli_connect($db_host, $db_user, $db_psswd, $db_name);
	mysqli_set_charset($link, "utf8");
	$query = mysqli_query($link, 'SELECT * FROM `farms` WHERE `id` = 1;');
	$farm_data = mysqli_fetch_assoc($query);
	mysqli_close($link);
	$current_light = json_decode($farm_data['light_val']);
	if(isset($_POST['done'])) {
			$light_array = array();
			if($_POST['time1'] != null) {
				array_push($light_array, $_POST['time1']);
			}
			if($_POST['time2'] != null) {
				array_push($light_array, $_POST['time2']);
			}
			if($_POST['time3'] != null) {
				array_push($light_array, $_POST['time3']);
			}
			if($_POST['time4'] != null) {
				array_push($light_array, $_POST['time4']);
			}
			if($_POST['time5'] != null) {
				array_push($light_array, $_POST['time5']);
			}
			$light_array_json = json_encode($light_array);
			$link = mysqli_connect($db_host, $db_user, $db_psswd, $db_name);
			mysqli_set_charset($link, "utf8");
			mysqli_query($link, "UPDATE `farms` SET `light_val` = '".$light_array_json."' WHERE `farms`.`id` = 1;");
			mysqli_close($link);
			$_SESSION['success_text'] = '<p style="color:green">Изменения успешно сохранены!</p>';
			header('Location: /main');
	}
	//в value сделан вывод текущего заданного в БД времени
	echo '<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<title>Личный кабинет || Интервал света</title>
	</head>
	<body>
	<p>Задайте интервалы для света</p>
	<form method="POST" name="light_form" action="">
	<p>Включить свет в:</p>
	<input type="time" name="time1" value="'.$current_light[0].'" required=""><br />
	<input type="time" name="time2" value="'.$current_light[1].'" required=""><br />
	<p>Выключить свет в:</p>
	<input type="time" name="time3" value="'.$current_light[2].'" required=""><br />
	<input type="time" name="time4" value="'.$current_light[3].'" required=""><br />
	<input type="submit" name="done" value="Готово!">
	</form>
	</body>
	</html>';
}
elseif($_GET['action'] == 'set_wet') {
	//меню управлением интервалами полива
	$link = mysqli_connect($db_host, $db_user, $db_psswd, $db_name);
	mysqli_set_charset($link, "utf8");
	$query = mysqli_query($link, 'SELECT * FROM `farms` WHERE `id` = 1;');
	$farm_data = mysqli_fetch_assoc($query);
	mysqli_close($link);
	$current_watering = json_decode($farm_data['watering_val']);
	if(isset($_POST['done'])) {
			$watering_array = array();
			if($_POST['time1'] != null) {
				array_push($watering_array, $_POST['time1']);
			}
			if($_POST['time2'] != null) {
				array_push($watering_array, $_POST['time2']);
			}
			if($_POST['time3'] != null) {
				array_push($watering_array, $_POST['time3']);
			}
			if($_POST['time4'] != null) {
				array_push($watering_array, $_POST['time4']);
			}
			if($_POST['time5'] != null) {
				array_push($watering_array, $_POST['time5']);
			}
			$watering_array_json = json_encode($watering_array);
			$link = mysqli_connect($db_host, $db_user, $db_psswd, $db_name);
			mysqli_set_charset($link, "utf8");
			mysqli_query($link, "UPDATE `farms` SET `watering_val` = '".$watering_array_json."' WHERE `farms`.`id` = 1;");
			mysqli_close($link);
			$_SESSION['success_text'] = '<p style="color:green">Изменения успешно сохранены!</p>';
			header('Location: /main');
	}
	//в value сделан вывод текущего заданного в БД времени
	echo '<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<title>Личный кабинет || Интервал полива</title>
	</head>
	<body>
	<p>Задайте время полива</p><br />
	<form method="POST" name="watering_form" action="">
	<input type="time" name="time1" value="'.$current_watering[0].'" required=""><br />
	<input type="time" name="time2" value="'.$current_watering[1].'" required=""><br />
	<input type="time" name="time3" value="'.$current_watering[2].'" required=""><br />
	<input type="time" name="time4" value="'.$current_watering[3].'" required=""><br />
	<input type="time" name="time5" value="'.$current_watering[4].'" required=""><br />
	<input type="submit" name="done" value="Готово!">
	</form>
	</body>
	</html>';
}
?>