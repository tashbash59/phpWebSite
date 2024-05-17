<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<h1>First page is works!</h1>
	<a href="second.php">Переход на вторую страницу</a>
	<?php
		// phpinfo(); 
		echo extension_loaded('pgsql') ? 'pgsql loaded' : 'pgsql not loaded';
		echo extension_loaded('pdo_pgsql') ? 'pdo_pgsql loaded' : 'pdo_pgsql not loaded';
		echo extension_loaded('curl') ? 'curl loaded' : 'pdo_pgsql not loaded';
		phpinfo();
	 ?>
	
</body>

</html>