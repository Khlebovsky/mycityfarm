<?php
require $_SERVER["DOCUMENT_ROOT"]."/api/data/db_data.php";
header('content-type: application/json');
$key = $_GET["key"];
$link = mysqli_connect($db_host, $db_user, $db_psswd, $db_name);
$query = mysqli_query($link, 'SELECT * FROM `api_keys` WHERE `api_key` = "'.$key.'";');
if(mysqli_num_rows($query) == 0) {
	mysqli_close($link);
	$json['response'] = array('error' => 1);
	echo json_encode($json);
}
else {
	$temp = $_GET['temp'];
	$wet = $_GET['wet'];
	$light = $_GET['light'];
	if($result = mysqli_query($link, 'UPDATE `farms` SET `temp` = "'.$temp.'", `wet` = "'.$wet.'", `light` = "'.$light.'" WHERE `farms`.`id` = 1')) {
		$json['response'] = array('code' => 200);
		echo json_encode($json);
	}
	else {
		$json['response'] = array('error' => 3);
		echo json_encode($json);
	}
	mysqli_close($link);
}