<?php
require $_SERVER["DOCUMENT_ROOT"]."/pageparts/check.php";
if(isset($_POST['register'])) {
	if($_POST['psswd1'] == $_POST['psswd2']) {
		//пароли совпадают проводим регу
		$name = $_POST['name'];
		$surname = $_POST['surname'];
		$login = $_POST['login'];
		$email = $_POST['email'];
		$psswd = $_POST['psswd1'];
		$hash = md5($psswd);
		$link = mysqli_connect($db_host, $db_user, $db_psswd, $db_name);
		mysqli_set_charset($link, "utf8");
		mysqli_query($link, 'INSERT INTO `users` (`id`, `login`, `hash`, `email`, `name`, `surname`, `farm_id`) VALUES (NULL, "'.$login.'", "'.$hash.'", "'.$email.'", "'.$name.'", "'.$surname.'", "1");');
		mysqli_close($link);
		$_SESSION['login'] = $login;
		$_SESSION['hash'] = $hash;
		header('Location: /login');
	}
	else {
		$error_text = 'Пароли не совпадают';
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Регистрация</title>
	<?php 
		require '../templates/source.php';
	?>
</head>
<body>
	<form method="POST" name="reg_form" action="" class="register">
		<div class="name">
            <img src="/img/logo.png">
            <span>
                My City Farm
                <small>GT</small>
            </span>
		</div>
		<h2>Создать аккаунт</h2>
		<input type="text" name="name" required="" placeholder="Имя">
		<input type="text" name="surname" required="" placeholder="Фамилия">
		<input type="text" name="login" required="" placeholder="Логин">
		<input type="email" name="email" required="" placeholder="Электронная почта">
		<input type="password" name="psswd1" required="" placeholder="Пароль">
		<input type="password" name="psswd2" required="" placeholder="Подтверждение пароля">
			<?php
				echo '<p style="color:red">'.$error_text.'</p>';
			?>
		<input type="submit" name="register" value="Создать аккаунт">
	</form>
</body>
</html>