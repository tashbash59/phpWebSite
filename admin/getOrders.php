<?php
function getItems($from, $to ,$conn) {		
		if ($conn == null) {
			header('Location: signIn.html?error=Ошибка при подключении');
		} else {
			$selectResult = pg_query($conn, "SELECT orders_product, adress FROM orders WHERE order_date::date BETWEEN '{$from}' AND '{$to}';");
			if (!$selectResult) {
				header('Location: ../MainPage.php?error=Ошибка при '."SELECT orders_product,adress FROM orders WHERE order_date BETWEEN '.$from.' AND '.$to.';");
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
