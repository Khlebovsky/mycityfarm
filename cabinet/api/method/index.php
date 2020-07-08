<?php
header('content-type: application/json');
		$json['response'] = array('error' => 2);
		echo json_encode($json);
?>