
<?php 
	session_start();
	$conn = require_once '../DbConnect.php';
	if ($conn == null) {
		header('Location: signUp.html?error=Ошибка при подключении');
	} else {
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$name = $_POST["name"];
			$cat = $_POST["category"];
			// $img = $_POST["img"];
			$des = $_POST["description"];
			$price = $_POST["price"];
			$images = $_POST["img"];
			
			
			$insertResult = pg_query($conn, "INSERT INTO products (name, description,price,category) 
			VALUES ('".$name."','".$des."','".$price."','".$cat."');");
			if (!$insertResult) {
				echo "Ошибка при добавлении пользователя\n";
				exit;
			}
			$selectResult = pg_query($conn, "SELECT product_id FROM products 
				WHERE description = '".$des."';");
			$row = pg_fetch_row($selectResult);
			foreach ($images as $i) {
				$insertImages = pg_query($conn, "INSERT INTO images (img_url, product_id) 
					VALUES ('".$i."','".$row[0]."');");
		    }
			header('Location:' . $_SERVER['HTTP_REFERER']);
			exit;	
		}
	}
?>