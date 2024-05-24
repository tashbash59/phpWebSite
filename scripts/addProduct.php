<?php 
	session_start();
	$conn = require_once '../DbConnect.php';
	if ($conn == null) {
		header('Location: signUp.html?error=Ошибка при подключении');
	} else {
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$quantity = $_POST["quantity"];
			$size = $_POST["size"];
			$user_id = $_SESSION['user_id'];
			$product_id = $_POST["product_id"];
			$insertResult = pg_query($conn, "INSERT INTO cart (product_id, size, quantity,user_id) 
			VALUES ($product_id,'".$size."','".$quantity."','".$user_id."');");
			if (!$insertResult) {
				echo "Ошибка при добавлении пользователя\n";
				exit;
			}
			header('Location:' . $_SERVER['HTTP_REFERER']);
			exit;
		}				
	}
?>