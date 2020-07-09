<?php
require $_SERVER["DOCUMENT_ROOT"]."/pageparts/check.php";
if(isset($_POST['log_in'])) {
	$login = $_POST['login'];
	$psswd = $_POST['psswd'];
	$hash = md5($psswd);
	$link = mysqli_connect($db_host, $db_user, $db_psswd, $db_name);
	mysqli_set_charset($link, "utf8");
	$query = mysqli_query($link, 'SELECT * FROM `users` WHERE `login` = "'.$login.'" AND `hash` = "'.$hash.'" LIMIT 1;');
	if(mysqli_num_rows($query) == 0) {
		mysqli_close($link);
		$error_text = 'Неправильный логин или пароль';
	}
	else {
		$_SESSION['login'] = $login;
		$_SESSION['hash'] = $hash;
		mysqli_close($link);
		header('Location: /main');
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Вход</title>
	<?php 
		require '../templates/source.php';
	?>
</head>
<body>
	<form method="POST" name="login_form" action="" class="login">
		<div class="name">
            <img src="/img/logo.png">
            <span>
                My City Farm
                <small>GT</small>
            </span>
        </div>
		<h2>Вход в личный кабинет</h2>
		<input type="text" name="login" required="" placeholder="Логин">
		<input type="password" name="psswd" required="" placeholder="Пароль">
		<input type="submit" name="log_in" value="Войти">
		<?php
				echo '<p style="color:red">'.$error_text.'</p>';
		?>
	</form>
</body>
</html>