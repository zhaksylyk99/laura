
<!DOCTYPE html>
<html>
<head>
<title>Аптека | Поиск</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!--jQuery(necessary for Bootstrap's JavaScript plugins)-->
<script src="js/jquery-1.11.0.min.js"></script>
<!--Custom-Theme-files-->
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Luxury Watches Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--start-menu-->
<script src="js/simpleCart.min.js"> </script>
<link href="css/memenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/memenu.js"></script>
<script>$(document).ready(function(){$(".memenu").memenu();});</script>	
<!--dropdown-->
<script src="js/jquery.easydropdown.js"></script>			
</head>
<body> 
	<!--top-header-->
	<div class="top-header">
		<div class="container">
			<div class="top-header-main">
				<div class="col-md-6 top-header-left">
					<div class="drop">
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="col-md-6 top-header-left">
					<div class="cart box_1">
								<a href="checkout.php">
							 		<div class="total">
								</div>
									<img src="images/cart-1.png" alt="" />
								</a>
									<p><a href="javascript:;" class="simpleCart_empty">Корзина</a></p>
										<div class="clearfix"> </div>
									</div>
								</div>
									<div class="clearfix"></div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--top-header-->
	<!--start-logo-->
	<div class="logo">
		<a><h1>Резултать поиска</h1></a>
	</div>
	<!--start-logo-->
	<!--bottom-header-->
	<div class="header-bottom">
		<div class="container">
			<div class="header">
				<div class="col-md-9 header-left">
				<div class="top-nav">
						<ul class="memenu skyblue"><li class="active"><a href="index.php">Главная</a></li>
							<li class="active"><a href="auth.php">Личный кабинет</a></li>
					</ul>
				</div>
			<div class="clearfix"> </div>
		</div>
			<div class="col-md-3 header-right"> 
				<form action="search.php" method="post">
					<form action="search.php" method="post">
					<div class="search-bar">
					<input type="text" name="search" value="Поиск" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Поиск';}">
					<input type="submit" value="">
				</div>
					</form>
					</form>
				</div>
			</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!--bottom-header-->
	<!--start-breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<li><a href="index.php">Главная</a></li>
					<li class="active">Поиск</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--start-ckeckout-->
	<div class="ckeckout">
		<div class="container">
			<div class="ckeck-top heading">
					<!--end-breadcrumbs-->
<?php

$search = $_POST['search'];

$servername = "localhost";
$username = "root";
$password = "root";
$db = "blog_samples";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$sql = "select * from tblproduct where name like '%$search%'";

$result = $conn->query($sql);

if ($result->num_rows > 0){
while($row = $result->fetch_assoc() ){
	?>
	<div class="product-item">
			<div class="col-md-4 product-left p-left">
				<div class="product-main simpleCart_shelfItem">
			<form method="post" action="checkout.php?action=add&code=<?php echo $row["code"]; ?>">
			<div class="mask"><img src="/admin/product/img/<?php echo $row["image"]; ?>"></div>
			<div class="product-tile-footer">
			<div class="product-bottom"><?php echo $row["name"]; ?></div>
			<div class="product-price"><?php echo $row["price"]." тг."; ?></div>
			<div class="cart-action"><input  type="text" class="product-quantity" name="quantity" value="1" size="2"  /><input type="submit" value="Добавить" class="btnAddAction" a/></div>
			</div>
			</form>
		</div>
			</div>
				</div>
		<div>
			<?php
}
} else {
	echo "0 records";
}

$conn->close();

?>
		 </div>
		</div>
	</div>
	<!--end-ckeckout-->
	<!--information-starts-->

</body>
</html>