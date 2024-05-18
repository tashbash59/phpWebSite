<?php 
	session_start();
	$conn = require_once __DIR__ . '/../DbConnect.php';
	if ($conn == null) {
		header('Location: signIn.html?error=Ошибка при подключении');
	} else {
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$login = pg_escape_string($conn, $_POST["login"]);
			$hash = hash('md5', $_POST["password"]);
			$selectResult = pg_query($conn, "SELECT user_id,role,username,password FROM users WHERE username='".$login."';");

			if (!$selectResult) {
				echo "Ошибка при входе в систему\n";
				exit;
			} else {
				if (pg_num_rows($selectResult) > 0) {
					$row = pg_fetch_row($selectResult);
					$password = $row[3];
					if ($password == $hash) {
						$_SESSION["user_id"] = $row[0];
						$_SESSION["role"] = $row[1];
						// $_SESSION["login_user"] = $login;
						$_SESSION["username"] = $row[2];
						$_SESSION["password"] = $hash;
					
						header('Location:' .$_SERVER['HTTP_REFERER']);
						exit;
					} else {
						header('Location: ../signIn.html?error=Неверный логин или парол');
					}
				} else {
					header('Location: ../signIn.html?error=Неверный логин');
				}
			}
		} else {
			echo "Ошибка при подключении\n";
		}
	}
?>