<?php
session_start();
require $_SERVER["DOCUMENT_ROOT"]."/data/db_data.php";
if($_GET['action'] == '') {
	//Основная страница
	if($_SESSION['success_text'] != '') {
		$success_text = $_SESSION['success_text'];
		unset($_SESSION['success_text']);
	}
	echo '<!DOCTYPE html>
	<html>
	<head>
		<title>Главная</title>
	</head>
	<body>';
	echo $success_text;
	echo '<a href="/admin/?action=create_cat">Создать категорию</a><br />
	<a href="/admin/?action=delete_cat">Удалить категорию</a><br />
	<a href="/admin/?action=create_subcat">Создать подкатегорию</a><br />
	<a href="/admin/?action=delete_subcat">Удалить подкатегорию</a><br />
	<a href="/admin/?action=create_wiki">Создать статью</a><br />
	<a href="/admin/?action=delete_wiki">Удалить статью</a>
	</body>
	</html>';
}
elseif($_GET['action'] == 'create_cat') {
	//создание категории
	if(isset($_POST['done'])) {
		$cat_title = $_POST['cat_title'];
		if(strlen($cat_title) != 0 && $_POST['main_cat'] != "0") {
			if($_POST['main_cat'] == 'business') {
				$cat_id = 1;
			}
			if($_POST['main_cat'] == 'personal') {
				$cat_id = 2;
			}
			if($_POST['main_cat'] == 'edu') {
				$cat_id = 3;
			}
			$link = mysqli_connect($db_host, $db_user, $db_psswd, $db_name);
			mysqli_set_charset($link, "utf8");
			mysqli_query($link, 'INSERT INTO `cats` (`id`, `title`, `main_cat_id`) VALUES (NULL, "'.$cat_title.'", '.$cat_id.');');
			mysqli_close($link);
			$_SESSION['success_text'] = '<p style="color:green">Изменения успешно сохранены!</p>';
			header('Location: /admin');
		} 
	}
	echo '<!DOCTYPE html>
	<html>
	<head>
		<title>Создать категорию</title>
	</head>
	<body>
	<form method="POST" name="cat_form" action="">
		<p>Введите название категории:</p>
		<input type="text" name="cat_title"><br />
		<p>Выберите основную категорию:</p><br />
		<select name="main_cat">
		<option value="0">Выберите основную категорию</option>
		<option value="business">Для бизнеса</option>
		<option value="personal">Для личного пользования</option>
		<option value="edu">Для образ. организаций</option>
		</select>
		<br /><br />
		<input type="submit" name="done" value="Сохранить">
	</form>
	</body>
	</html>';
}
elseif($_GET['action'] == 'delete_cat') {
	//удаление категории
	if(isset($_POST['done'])) {
		if($_POST['cat'] != "0") {
			$link = mysqli_connect($db_host, $db_user, $db_psswd, $db_name);
			mysqli_set_charset($link, "utf8");
			mysqli_query($link, 'DELETE FROM `cats` WHERE `cats`.`id` = '.$_POST['cat'].'');
			mysqli_close($link);
			$_SESSION['success_text'] = '<p style="color:green">Изменения успешно сохранены!</p>';
			header('Location: /admin');
		}
	} 
	echo '<!DOCTYPE html>
	<html>
	<head>
		<title>Удалить категорию</title>
	</head>
	<body>
	<form method="POST" name="delete_cat_form" action="">
		<select name="cat">
			<option value="0">Выберите удаляемую категорию</option>';
	$link = mysqli_connect($db_host, $db_user, $db_psswd, $db_name);
	mysqli_set_charset($link, "utf8");
	$query = mysqli_query($link, 'SELECT * FROM `cats`;');
	while($cat = mysqli_fetch_assoc($query)) {
		if($cat['main_cat_id'] == 1) {
			$main_cat = '(Для бизнеса)';
		}
		elseif($cat['main_cat_id'] == 2) {
			$main_cat = '(Для личных целей)';
		}
		elseif($cat['main_cat_id'] == 3) {
			$main_cat = '(Для образ. орг.)';
		}
		mysqli_close($link);
		echo '<option value="'.$cat['id'].'">'.$cat['title'].' '.$main_cat.'</option>';
	}
	echo '</select><br /><br />
	<input type="submit" name="done" value="Удалить">
	</form>
	</body>
	</html>';
}
elseif($_GET['action'] == 'create_subcat') {
	//создание подкатегории
	if(isset($_POST['done'])) {
		$subcat_title = $_POST['subcat_title'];
		if(strlen($subcat_title) != 0 && $_POST['cat'] != "0") {
			$link = mysqli_connect($db_host, $db_user, $db_psswd, $db_name);
			mysqli_set_charset($link, "utf8");
			mysqli_query($link, 'INSERT INTO `subcats` (`id`, `title`, `cat_id`) VALUES (NULL, "'.$subcat_title.'", '.$_POST['cat'].');');
			mysqli_close($link);
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
		<input type="text" name="subcat_title"><br />
		<p>Выберите категорию:</p>
		<select name="cat">
			<option value="0">Выберите категорию</option>';
	$link = mysqli_connect($db_host, $db_user, $db_psswd, $db_name);
	mysqli_set_charset($link, "utf8");
	$query = mysqli_query($link, 'SELECT * FROM `cats`;');
	while($cat = mysqli_fetch_assoc($query)) {
		if($cat['main_cat_id'] == 1) {
			$main_cat = '(Для бизнеса)';
		}
		elseif($cat['main_cat_id'] == 2) {
			$main_cat = '(Для личных целей)';
		}
		elseif($cat['main_cat_id'] == 3) {
			$main_cat = '(Для образ. орг.)';
		}
		mysqli_close($link);
		echo '<option value="'.$cat['id'].'">'.$cat['title'].' '.$main_cat.'</option>';
	}
	echo '</select><br /><br />
	<input type="submit" name="done" value="Сохранить">
	</form>
	</body>
	</html>';
}
elseif($_GET['action'] == 'delete_subcat') {
	//удаление подкатегории
	if(isset($_POST['done'])) {
		if($_POST['subcat'] != "0") {
			$link = mysqli_connect($db_host, $db_user, $db_psswd, $db_name);
			mysqli_set_charset($link, "utf8");
			mysqli_query($link, 'DELETE FROM `subcats` WHERE `subcats`.`id` = '.$_POST['subcat'].';');
			mysqli_close($link);
			$_SESSION['success_text'] = '<p style="color:green">Изменения успешно сохранены!</p>';
			header('Location: /admin');
		}
	} 
	echo '<!DOCTYPE html>
	<html>
	<head>
		<title>Удалить подкатегорию</title>
	</head>
	<body>
	<form method="POST" name="delete_subcat_form" action="">
		<select name="subcat">
			<option value="0">Выберите удаляемую подкатегорию</option>';
	$link = mysqli_connect($db_host, $db_user, $db_psswd, $db_name);
	mysqli_set_charset($link, "utf8");
	$query = mysqli_query($link, 'SELECT * FROM `subcats`;');
	while($subcat = mysqli_fetch_assoc($query)) {
		$query2 = mysqli_query($link, 'SELECT * FROM `cats` WHERE `id` = '.$subcat['cat_id'].';');
		$cat = mysqli_fetch_assoc($query2);
		mysqli_close($link);
		echo '<option value="'.$subcat['id'].'">'.$subcat['title'].' (Категория '.$cat['title'].')</option>';
	}
	echo '</select><br /><br />
	<input type="submit" name="done" value="Удалить">
	</form>
	</body>
	</html>';
}
elseif($_GET['action'] == 'create_wiki') {
	//создание вики
	if(isset($_POST['done'])) {
		if(strlen($_POST['title']) != 0 && strlen($_POST['wiki_text']) != 0 && $_POST['cat'] != "0") {
			$title = $_POST['title'];
			$wiki_text = nl2br($_POST['wiki_text']);
			$cat = $_POST['cat'];
			$subcat = $_POST['subcat'];
			$link = mysqli_connect($db_host, $db_user, $db_psswd, $db_name);
			mysqli_set_charset($link, "utf8");
			mysqli_query($link, 'INSERT INTO `wiki` (`id`, `cat`, `subcat`, `title`, `text`) VALUES (NULL, '.$cat.', '.$subcat.', \''.$title.'\', \''.$wiki_text.'\');');
			mysqli_close($link);
			$_SESSION['success_text'] = '<p style="color:green">Изменения успешно сохранены!</p>';
			header('Location: /admin');
		}
	}
	echo '<!DOCTYPE html>
	<html>
	<head>
		<title>Создать статью</title>
	</head>
	<body>
	<form method="POST" name="create_wiki_form" action="">
		<p>Введите заголовок статьи:</p>
		<input type="text" name="title"><br />
		<p>Введите текст статьи:</p>
		<textarea rows="30" cols="45" name="wiki_text"></textarea><br />
		<select name="cat">
		<option value="0">Выберите категорию</option>';
		$link = mysqli_connect($db_host, $db_user, $db_psswd, $db_name);
		mysqli_set_charset($link, "utf8");
		$query = mysqli_query($link, 'SELECT * FROM `cats`;');
		while($cat = mysqli_fetch_assoc($query)) {
			if($cat['main_cat_id'] == 1) {
				$main_cat = '(Для бизнеса)';
			}
			elseif($cat['main_cat_id'] == 2) {
				$main_cat = '(Для личных целей)';
			}
			elseif($cat['main_cat_id'] == 3) {
				$main_cat = '(Для образ. орг.)';
			}
		echo '<option value="'.$cat['id'].'">'.$cat['title'].' '.$main_cat.'</option>';
		}
	echo '</select>
		<select name="subcat">
		<option value="0">Выберите подкатегорию</option>';
		$link = mysqli_connect($db_host, $db_user, $db_psswd, $db_name);
		mysqli_set_charset($link, "utf8");
		$query = mysqli_query($link, 'SELECT * FROM `subcats`;');
		while($subcat = mysqli_fetch_assoc($query)) {
			$query2 = mysqli_query($link, 'SELECT * FROM `cats` WHERE `id` = '.$subcat['cat_id'].';');
			$cat = mysqli_fetch_assoc($query2);
			echo '<option value="'.$subcat['id'].'">'.$subcat['title'].' (Категория '.$cat['title'].')</option>';
		}
		mysqli_close($link);

	echo '</select>
		<input type="submit" name="done" value="Сохранить">
	</form>
	</body>
	</html>';	
}
elseif($_GET['action'] == 'delete_wiki') {
	//удаление статьи
	if(isset($_POST['done'])) {
		if($_POST['wiki'] != "0") {
			$link = mysqli_connect($db_host, $db_user, $db_psswd, $db_name);
			mysqli_set_charset($link, "utf8");
			mysqli_query($link, 'DELETE FROM `wiki` WHERE `wiki`.`id` = '.$_POST['wiki'].';');
			mysqli_close($link);
			$_SESSION['success_text'] = '<p style="color:green">Изменения успешно сохранены!</p>';
			header('Location: /admin');
		}
	} 
	echo '<!DOCTYPE html>
	<html>
	<head>
		<title>Удалить статью</title>
	</head>
	<body>
	<form method="POST" name="delete_wiki_form" action="">
		<select name="wiki">
			<option value="0">Выберите удаляемую статью</option>';
	$link = mysqli_connect($db_host, $db_user, $db_psswd, $db_name);
	mysqli_set_charset($link, "utf8");
	$query = mysqli_query($link, 'SELECT * FROM `wiki`;');
	while($wiki = mysqli_fetch_assoc($query)) {
		mysqli_close($link);
		echo '<option value="'.$wiki['id'].'">'.$wiki['title'].'</option>';
	}
	echo '</select><br /><br />
	<input type="submit" name="done" value="Удалить">
	</form>
	</body>
	</html>';
}
?>