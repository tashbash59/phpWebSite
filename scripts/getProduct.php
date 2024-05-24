<?php
	function getItems($item,$conn) {		
		if ($conn == null) {
			header('Location: signIn.html?error=Ошибка при подключении');
		} else {
			$selectResult = pg_query($conn, "SELECT product_id,name,description,price FROM products WHERE category='".$item."';");
			if (!$selectResult) {
				header('Location: ../MainPage.php');
				echo "Ошибка";
			} else {
				if (pg_num_rows($selectResult) > 0) {
					$row = pg_fetch_all($selectResult);
					// foreach ($row as $i) {
					// 	$selectImages = pg_query($conn, "SELECT img_url FROM images WHERE img_id = '".$i["img"]."';");
					// 	$i["img"] = pg_fetch_row($selectImages);
					// }
					return $row;
				} else {
					return null;
				}
			}
		}

		}
	function getFirtsImg($item,$conn) {		
		if ($conn == null) {
			header('Location: signIn.html?error=Ошибка при подключении');
		} else {
			$selectResult = pg_query($conn, "SELECT img_url FROM images WHERE product_id ='".$item."';");
			if (!$selectResult) {
				header('Location: ../MainPage.php?error=Ошибка при ');
				echo "Ошибка";
			} else {
				if (pg_num_rows($selectResult) > 0) {
					$row = pg_fetch_row($selectResult);
					return $row;
				} else {
					return null;
				}
			}
		}

		}
	function getAllImg($item,$conn) {		
		if ($conn == null) {
			header('Location: signIn.html?error=Ошибка при подключении');
		} else {
			$selectResult = pg_query($conn, "SELECT img_url FROM images WHERE product_id ='".$item."';");
			if (!$selectResult) {
				header('Location: ../MainPage.php?error=Ошибка при ');
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