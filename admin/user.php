<?php 
session_start();
require_once '../vendor/connect.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Админка</title>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<script src="js/jquery-1.11.0.min.js"></script>
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Luxury Watches Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<script src="js/simpleCart.min.js"> </script>
	<link href="css/memenu.css" rel="stylesheet" type="text/css" media="all" />
	<script type="text/javascript" src="js/memenu.js"></script>
	<script>$(document).ready(function(){$(".memenu").memenu();});</script>	
	<script src="js/jquery.easydropdown.js"></script>
</head>
<body>
	<div class="logo">
		<a><h1><?php
		if(!empty($_SESSION["login"])) :?>
		

		редактировать пользователей</h1></a>
	</div>
<div class="header-bottom">
	<div class="container">
		<div class="header">
			<div class="col-md-9 header-left">
				<div class="top-nav">
					<ul class="memenu skyblue">
						<li class=""><a href="/panel.php">Главный</a></li>
						<li class=""><a href="/admin/product.php">Продукты</a></li>
						<li class="active"><a href="/admin/user.php">Личный кабинет</a></li>
						<li class=""><a href="/add.php">Добавить</a></li>
						<li class=""><a href="/logout.php">Выйти</a></li>
					</ul>
				</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<br>
<br>
	
		
<?php
	$sql=$pdo->prepare("SELECT * FROM users");
	$sql->execute();
	while($res=$sql->fetch(PDO::FETCH_OBJ)):;
?>
<table class="table table-bordered" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;">Логин</th>
<th style="text-align:left;" >Email</th>
<th style="text-align:left;" >ФИО</th>
<th style="text-align:right;">Пароль</th>
<th style="text-align:center;">Сохранить</th>
</tr>
	<form action="/admin/user/user.php/<?php echo $res->id ?>" method="post">
		<tr>
				<td><input type="text" name="login" value="<?php echo $res->login ?>"></td>
				<td><input type="text" name="email" value="<?php echo $res->email ?>"></td>
				<td style="text-align:right;"><input type="text" name="full_name" value="<?php echo $res->full_name ?>"></td>
				<td style="text-align:right;"><input type="text" name="password" value="<?php echo $res->password ?>"></td>
				<td style="text-align:center;"><input type="submit" value="Сохранить" name=""></td>
				</tr>
		
	</form>
	<tbody>
	</table>

	<?php endwhile ?>

	<?php else:
		echo '<h2>Вы что хакер?</h2>';
		echo '<a href="/index.php">На главную</a>';
		?>

	<?php endif ?>
	</div>
  
</body>
</html>