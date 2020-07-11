<?php
session_start();
require $_SERVER["DOCUMENT_ROOT"]."/data/db_data.php";
if($_GET['action'] == '') {
	if($_SESSION['success_text'] != '') {
		$success_text = $_SESSION['success_text'];
		unset($_SESSION['success_text']);
	}
	echo '<!DOCTYPE html>
	<html>
	<head>
		<title>Админка</title>
	</head>
	<body>';
	echo $success_text;
	echo '<a href="/admin/?action=create_product">Добавить товар</a>
	</body>
	</html>';
}
elseif($_GET['action'] == 'create_product') {
	if(isset($_POST['done'])) {
		$upload_dir = $_SERVER["DOCUMENT_ROOT"]."/img/".$_FILES['filename']['name'];
        move_uploaded_file($_FILES['filename']['tmp_name'], $upload_dir);
        $title = $_POST['title'];
        $description = nl2br($_POST['description']);
        $price = $_POST['price'];
        $link = mysqli_connect($db_host, $db_user, $db_psswd, $db_name);
		mysqli_set_charset($link, "utf8");
		mysqli_query($link, 'INSERT INTO `products` (`id`, `title`, `description`, `preview`, `price`) VALUES (NULL, \''.$title.'\', \''.$description.'\', \'/img/'.$_FILES["filename"]["name"].'\', \''.$price.'\');');
		mysqli_close($link);

		$_SESSION['success_text'] = '<p style="color:green">Изменения успешно сохранены!</p>';
		header('Location: /admin');
	}
	echo '<!DOCTYPE html>
<html>
<head>
	<title>Создание товара</title>
</head>
<body>
<form method="POST" enctype="multipart/form-data" name="product_create_form">
	<p>Загрузите превью товара:</p>
	<input type="file" name="filename" required="">
	<p>Введите название товара:</p>
	<input type="text" name="title" required="">
	<p>Введите описание товара:</p>
	<textarea rows="30" cols="45" name="description" required=""></textarea><br />
	<p>Введите цену товара:</p>
	<input type="number" name="price" required=""><br /><br />
	<input type="submit" name="done" value="Сохранить">
</form>
</body>
</html>';
}
?>