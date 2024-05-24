<?php 
	session_start();
	$conn = require_once '../DbConnect.php';
	if ($conn == null) {
		header('Location: signUp.html?error=Ошибка при подключении');
	} else {
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$cart_id = $_POST["cart_id"];
			
			
			$insertResult = pg_query($conn, "DELETE FROM cart WHERE cart_id = $cart_id");
			if (!$insertResult) {
				echo "Ошибка при удалении\n";
				exit;
			}
			header('Location:' . $_SERVER['HTTP_REFERER']);
			// echo "DELETE FROM cart WHERE cart_id = $cart_id";
			exit;	
		}
	}
?>