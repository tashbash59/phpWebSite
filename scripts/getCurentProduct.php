<?php
	function getItem($id,$conn) {		
		if ($conn == null) {
			header('Location: signIn.html?error=Ошибка при подключении');
		} else {
			$selectResult= pg_query($conn, "SELECT product_id,name,description,price FROM products WHERE product_id='".$id."';");
			if (!$selectResult) {
				header('Location: ../MainPage.php');
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



?>