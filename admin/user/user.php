<?php
	$user = "root";
    $password = "root";
    $host = "localhost";
    $db = "blog_samples";
    $dbh = 'mysql:host='.$host.';dbname='.$db.';charset=utf8';
    $pdo = new PDO($dbh, $user, $password);


		$login = $_POST["login"];
		$email = $_POST["email"];
		$full_name = $_POST["full_name"];
		$password = $_POST["password"];
		$url = $_SERVER['REQUEST_URI'];
		$url = explode('/', $url);
		$str = $url[4];
		

		$row = "UPDATE users SET login=:login, email=:email, full_name=:full_name, password=:password WHERE id=$str";
		$query = $pdo -> prepare($row);
		$query -> execute(["login"=>$login, "email"=>$email, "full_name"=>$full_name, "password"=>$password]);
		echo '<meta HTTP-EQUIV="Refresh" Content="0; URL=/admin/user.php">';


	?>
	<?php
 
	