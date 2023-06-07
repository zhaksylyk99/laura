<!DOCTYPE html>
<html>
<head>
	<title>Вход в админку</title>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
	<h2 style="text-align: center;padding-top: 100px">Вход в админ понель</h2>

	<form action="admin/admin.php" method="post" style="text-align: center;padding-top: 100px">
		<div class="form-group">
			<input type="text" placeholder="Введите логин" name="login">
		</div>
		<div class="form-group">
			<input type="text" placeholder="Введите пароль" name="password">
		</div>
			<button type="submit" class="btn btn-primaty">Войти</button>
	</form>

</body>
</html>