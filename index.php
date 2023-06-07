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
}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Аптека</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link rel="icon" href="images/1.png">
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
						<div class="box">
							<select tabindex="5" class="dropdown drop">
								<option value="" class="label">Ваш Город:</option>
								<option value="1">Караганда</option>
								<option value="2">Алматы</option>
								<option value="3">Астана</option>
							</select>
						</div>
						
						
						
					</div>
				</div>

					<div class="col-md-6 top-header-left">
						<div class="cart box_1">
							<a href="auth.php">
						 		<div class="total">
								</div>
									<img src="https://erapisystems.ru/images/icon-12.png" alt="User" title="User" width="30">
									<p><a href="javascript:;" class="simpleCart_empty"><?= $_SESSION['user']['email'] ?></a></p>
							</a>
									<div class="clearfix"> </div>
								</div>
								</div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>

						<div class="logo">
							<a><h1>PHARMA PLUS</h1></a>
						</div>

						<div class="header-bottom">
					<div class="container">
				<div class="header">
			<div class="col-md-9 header-left">
		<div class="top-nav">
	<ul class="memenu skyblue">
		<li>
			<img src="images/logo.png" width="140" height="50" style="margin-top: -10px; margin-right: 20px;">
		</li>
		<li class="active"><a href="index.php">Главная</a></li>
		<li class=""><a href="auth.php">Личный кабинет</a></li>
		<li class=""><a href="apteka.php">Аптеки</a></li>
		<li class=""><a href="typo.php">Интересные новости</a></li>
		<li class=""><a href="checkout.php">Корзина</a></li>
	</ul>
		</div>
			<div class="clearfix"> </div>
		</div>
		<div class="col-md-3 header-right">
				<form action="search.php" method="post">
				<div class="search-bar">
				<input type="text" name="search" value="Поиск" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Поиск';}">
				<input type="submit" value="">
		</div>
				</form>

		</div>
			</div>
				</div>
					</div>
		
		<div class="bnr" id="home">
			<div  id="top" class="callbacks_container">
				<ul class="rslides" id="slider4">
				    <li>
						<img src="https://phonoteka.org/uploads/posts/2021-05/1620093313_43-phonoteka_org-p-fon-dlya-prezentatsii-tabletki-53.jpg"  alt=""/>

					</li>
					
					<li>
					<img src="https://top-fon.com/uploads/posts/2023-01/1674816522_top-fon-com-p-tabletki-fon-dlya-prezentatsii-95.jpg" alt=""/>
				</li>

					<li>
						<img src="https://escolaeducacao.com.br/wp-content/uploads/2022/07/pilula-anti-ressaca-que-degrada-o-alcool-do-organismo.jpg" alt=""/>
					</li>
				
				</ul>
			</div>
		<div class="clearfix"> </div>
	</div>
	

		<script src="js/responsiveslides.min.js"></script>
			 <script>
			    $(function () {
			      // Slideshow 4
			      $("#slider4").responsiveSlides({
			        auto: true,
			        pager: true,
			        nav: true,
			        speed: 500,
			        namespace: "callbacks",
			        before: function () {
			          $('.events').append("<li>before event fired.</li>");
			        },
			        after: function () {
			          $('.events').append("<li>after event fired.</li>");
			        }
			      });
			
			    });
			  </script>
			  
			
	<div class="product"> 
		<div class="container">
			<div class="product-top">
				<div class="product-one">
						<div id="product-grid">
							<div class="logo">
							<a><h1>Мы рекомендуем</h1></a>
						</div>
						<br>

	
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM tblproduct ORDER BY id ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
			<div class="col-md-4 product-left p-left">
				<div class="product-main simpleCart_shelfItem">
					<form method="post" action="checkout.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
						<div class="mask"><img  class="round" width="200" height="200" src="/admin/product/img/<?php echo $product_array[$key]["image"]; ?>"></div>
							<div class="product-bottom">
								<h3><?php echo $product_array[$key]["name"]; ?></h3>
									<h4><a class="item_add" href="#"><i></i></a> 
										<span class=" item_price"><?php echo $product_array[$key]["price"]." тг."; ?>
											</span></h4>
										</div>
									<div class="cart-action">
								<input  type="text" class="product-quantity" name="quantity" value="1" size="2"  />
							<input type="submit" value="Добавить" class="btnAddAction" a/></div>
						</div>
					</form>
				</div>
			</div>
		<div>
	<?php
		}
	}
	?>
		</div>
			<div class="clearfix"></div>
				</div>					
					</div>
						</div>
							</div>
	<script src="//code.jivo.ru/widget/eScJ64AyqX" async></script>

	
	
</body>
</html>