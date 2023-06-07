<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Добавить</title>
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
		<a><h1>Добавить товары и пользователей</h1></a>
	</div>
<div class="header-bottom">
	<div class="container">
		<div class="header">
			<div class="col-md-9 header-left">
				<div class="top-nav">
					<ul class="memenu skyblue">
						<li class=""><a href="/panel.php">Главный</a></li>
						<li class=""><a href="/admin/product.php">Продукты</a></li>
						<li class=""><a href="/admin/user.php">Личный кабинет</a></li>
						<li class="active"><a href="/add.php">Добавить</a></li>
						<li class=""><a href="/logout.php">Выйти</a></li>
					</ul>
				</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<br>
<br>
	<H2>Добавить продукты</H2>
	<table class="table table-bordered" cellpadding="10" cellspacing="1">
					<tbody>
	<tr>
<th style="text-align:left;">Имя</th>
<th style="text-align:left;">Способ применения</th>
<th style="text-align:left;">Цена</th>
<th style="text-align:center;" width="10%">Картинка</th>
<th style="text-align:center;" width="5%">Добавить</th>
</tr>

<tr>
	<form action="/admin/create.php" method="get">
			<td><input type="name" name="name"></td>
			<td><textarea name="code"></textarea></td>
			<td><input type="number" name="price"></td>
			<td><input type="file" name="image"></td>
			<td><button type="submit" name="formSubmit">Добавить</button></td>
		</form>
</tr>
</tbody>
</table>

<table class="table table-bordered" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;">ФИО</th>
<th style="text-align:left;" >Логин</th>
<th style="text-align:left;" >Email</th>
<th style="text-align:left;">Пароль</th>
<th style="text-align:center;" width="10%">Картинка</th>
<th style="text-align:center;">Сохранить</th>
</tr>


<h2>Добавить пользователей</h2>
<tr>
		<form action="/admin/createLogin.php" method="get">
			<td><input type="name" name="full_name"></td>
			<td><input type="name" name="login"></td>
			<td><input type="text" name="email"></td>
			<td><input type="text" name="password"></td>
			<td><input type="file" name="avatar"></td>
			<td><button type="submit" name="Submit">Добавить</button></td>
		</form>
</tr>
</tbody>
</table>

</body>
</html>
