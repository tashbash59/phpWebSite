
<?php 
	session_start();
	$conn = require_once __DIR__ . '/../DbConnect.php';
	if ($conn == null) {
		header('Location: signUp.html?error=Ошибка при подключении');
	} else {
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$login = $_POST["login"];
			$name = $_POST["name"];
			$password = $_POST["password"];
			$telephone = $_POST["telephone"];

			if ($login == null or $login == "" or $password == null or $password == "") {
				header('Location: signUp.html?error=Все поля должны быть заполнены');
			}
			$hash = hash('md5', $_POST["password"]);
			
			$selectResultLogin = pg_query($conn, "SELECT username FROM users WHERE username='".$login."';");
			
			if (!$selectResultLogin) {
				echo "Ошибка при входе в систему\n";
				exit;
			} else {
				$row = pg_fetch_row($selectResultLogin);
				$new_login = $row[0];
				if ($new_login <> null and $new_login <> "") {
					header('Location: signUp.html?error=Данный логин занят другим пользователем');
					exit;
				} else {
					$insertResult = pg_query($conn, "INSERT INTO users (role, username, password) 
			VALUES (1,'".$login."','".$hash."');");
					if (!$insertResult) {
						echo "Ошибка при добавлении пользователя\n";
						exit;
					}
					$selectResult = pg_query($conn, "SELECT user_id,role,username,password FROM users WHERE username='".$login."';");
					$row = pg_fetch_row($selectResult);
					$_SESSION["user_id"] = $row[0];
					$_SESSION["role"] = $row[1];
					// $_SESSION["login_user"] = $login;
					$_SESSION["username"] = $row[2];
					$_SESSION["password"] = $hash;
					header('Location: ../MainPage.php');
				}	
			}
		} else {
			echo "Ошибка при подключении\n";
		}
	}
?>