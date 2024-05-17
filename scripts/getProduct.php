<?php
	function getItems($item) {		
		$conn = require_once __DIR__ . '/../DbConnect.php';
		if ($conn == null) {
			header('Location: signIn.html?error=Ошибка при подключении');
		} else {
			$selectResult = pg_query($conn, "SELECT product_id,name,description,img,price FROM products WHERE category='".$item."';");
			if (!$selectResult) {
				header('Location: ../MainPage.php');
				echo "Ошибка";
			} else {
				if (pg_num_rows($selectResult) > 0) {
					$row = pg_fetch_all($selectResult);
					return $row;
				} else {
					return null;
				}
			}
		}

		}



?>