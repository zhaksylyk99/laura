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
<script src="https://widget.cloudpayments.ru/bundles/cloudpayments"></script>
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
							<a><h1>Корзина</h1></a>
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
		<li class=""><a href="index.php">Главная</a></li>
		<li class=""><a href="auth.php">Личный кабинет</a></li>
		<li class=""><a href="apteka.php">Аптеки</a></li>
		<li class=""><a href="typo.php">Интересные новости</a></li>
		<li class="active"><a href="checkout.php">Корзина</a></li>
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
	<!--bottom-header-->
	<!--start-breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<li><a href="index.php">Главная</a></li>
					<li class="active">Корзина</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--start-ckeckout-->
	<div class="ckeckout">
		<div class="container">
			<div class="ckeck-top heading">
				
			</div>
			<div class="ckeckout-top">
			<div class="cart-items">
			 <h3>Товары</h3>
				<script>$(document).ready(function(c) {
					$('.close1').on('click', function(c){
						$('.cart-header').fadeOut('slow', function(c){
							$('.cart-header').remove();
						});
						});	  
					});
			   </script>
			<script>$(document).ready(function(c) {
					$('.close2').on('click', function(c){
						$('.cart-header1').fadeOut('slow', function(c){
							$('.cart-header1').remove();
						});
						});	  
					});
			   </script>
			   <script>$(document).ready(function(c) {
					$('.close3').on('click', function(c){
						$('.cart-header2').fadeOut('slow', function(c){
							$('.cart-header2').remove();
						});
						});	  
					});
			   </script>
				
<div id="product-item">
	<div class="submit-btn">
<a id="btnEmpty" href="checkout.php?action=empty"><input type="submit" id="btnEmpty" href="checkout.php?action=empty" value="Очистить  Корзину"></a>
<a id="btnEmpty" href="export.php?action=excel"><input type="submit" id="btnEmpty" href="checkout.php?action=empty" value="Загрузить"></a>
<a class="button button-lg button-secondary" style="color: #29293a" href="#" id="checkout-mercury"><input type="submit" value="Купить"></a>
<a id="btnEmpty" href="auth.php?action=excel"><input type="submit" id="btnEmpty" href="checkout.php?action=empty" value="Добавить доставку"></a>     
	</div>

	


<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	
<table class="table table-bordered" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;">Имя</th>
<th style="text-align:left;">Способ применения</th>
<th style="text-align:right;" width="5%">Количество</th>
<th style="text-align:right;" width="10%">Цена за единицу</th>
<th style="text-align:right;" width="10%">Цена</th>
<th style="text-align:center;" width="5%">Удалить</th>
</tr>


<style>
   .round {
    border-radius: 100px; /* Радиус скругления */
    box-shadow: 0 0 0 3px green, 0 0 13px #333; /* Параметры теней */
    margin-right: 5%;

   }
  </style>
<?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];
		?>
				<tr>
				<td><img src="/admin/product/img/<?php echo $item["image"]; ?>" class="round" width="40" height="40"/><?php echo $item["name"]; ?></td>
				<td><?php echo $item["code"]; ?></td>
				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				<td style="text-align:right;"><?php echo $item["price"]." тг."; ?></td>
				<td style="text-align:right;"><?php echo number_format($item_price, 2)." тг."; ?></td>
				<td style="text-align:center;"><a href="checkout.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="images/icon-delete.png" alt="Remove Item" /></a></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
		}
		?>

<tr>
<td colspan="2" align="right">Итог:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo number_format($total_price, 2)." тг."; ?></strong></td>
<td></td>
</tr>
</tbody>
</table>		
  <?php
} else {
?>
<div class="no-records">Ваша корзина  пуста</div>
<?php 
}
?>
</div>




</div>

    
  <div class="snackbars" id="form-output-global"></div>
  <script src="../pay/js/core.min.js"></script>
  <script src="../pay/js/script.js"></script>
  <script>
    $('#checkout-mercury').click(mercury);
  </script>



</body>
</html>