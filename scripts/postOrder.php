<?php 
	session_start();
	$conn = require_once '../DbConnect.php';
	if ($conn == null) {
		header('Location: signUp.html?error=Ошибка при подключении');
	} else {
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$names = $_POST["names"];
			$adress = $_POST["adress"];
			$date = date('Y-M-d H:i:s');
			
			
			
			$insertResult = pg_query($conn, "INSERT INTO orders (orders_product, order_date,adress) 
			VALUES ('".$names."','".$date."','".$adress."');");
			if (!$insertResult) {
				header('Location: ../MainPage.php');
				exit;
			}
			header('Location:' . $_SERVER['HTTP_REFERER']);
			exit;	
		}
	}
?>