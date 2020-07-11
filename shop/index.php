<?php
require $_SERVER["DOCUMENT_ROOT"]."/data/db_data.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Магазин || MyCityFarm</title>
	<?php 
        require $_SERVER["DOCUMENT_ROOT"]."/templates/source.php";
    ?>
</head>
<body>

	<div class="top-fixed">
		<strong>Shop</strong>
		<small>Онлайн-магазин</small>
	</div>

	<?php 
        require $_SERVER["DOCUMENT_ROOT"]."/templates/menu.php";
    ?>

	<div class="shop">

	<h1>Онлайн-магазин</h1>

	<div class="product-wrapper">

<?php
$link = mysqli_connect($db_host, $db_user, $db_psswd, $db_name);
mysqli_set_charset($link, "utf8");
$query = mysqli_query($link, 'SELECT * FROM `products`;');
while($products = mysqli_fetch_assoc($query)) {
	echo '<div class="product">';
	echo '<img src="'.$products['preview'].'"><br />';
	echo '<div class="text-wrap">
		<h2>'.$products['title'].'</h2>
		<span>'.$products['description'].'</span>
		<p>'.$products['price'].'&#8381;</p>'; // непонятные символы в конце - знак рубля в виду html-кода символа, если что
		echo '</div>
		</div>';
}
?>
</div>

</div>

</body>
</html>