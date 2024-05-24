<?php
	function getCartItems($id,$conn) {		
		if ($conn == null) {
			header('Location: signIn.html?error=Ошибка при подключении');
		} else {
			$selectResult= pg_query($conn, "SELECT cart_id,product_id,size,quantity FROM cart WHERE user_id='".$id."';");
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