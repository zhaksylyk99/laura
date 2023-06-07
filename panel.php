<?php 
session_start();
?>
<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'image'=>$productByCode[0]["image"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["code"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;

	case "add":
			# code...
			break;	
}
}
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
		

		<?php echo "Добрый день,".$_SESSION['login']; ?></h1></a>
	</div>
<div class="header-bottom">
	<div class="container">
		<div class="header">
			<div class="col-md-9 header-left">
				<div class="top-nav">
					<ul class="memenu skyblue">
						<li class="active"><a href="/index.php">Главный</a></li>
						<li class=""><a href="/admin/product.php">Продукты</a></li>
						<li class=""><a href="/admin/user.php">Личный кабинет</a></li>
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
	$product_array = $db_handle->runQuery("SELECT * FROM tblproduct ORDER BY id ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
			<div class="col-md-4 product-left p-left">
				<div class="product-main simpleCart_shelfItem">
					<form method="post" action="checkout.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
						<div class="mask"><img src="/admin/product/img/<?php echo $product_array[$key]["image"]; ?>"></div>
							<div class="product-bottom">
								<h3><?php echo $product_array[$key]["name"]; ?></h3>
									<h4><a class="item_add" href="#"><i></i></a> 
										<span class=" item_price"><?php echo $product_array[$key]["price"]." тг."; ?>
											</span></h4>
										</div>
									
					</form>
				</div>
			</div>
		<div>
	<?php
		}
	}
	?>
		
	<?php else:
		echo '<h2>Вы что хакер?</h2>';
		echo '<a href="/index.php">На главную</a>';
		?>

	<?php endif ?>
	</div>

</body>
</html>