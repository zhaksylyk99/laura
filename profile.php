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

<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: /');
}
?>


<!DOCTYPE html>
<html>
<head>
<title>Личный кабинет</title>
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
<script type="text/javascript">
	$(function() {
	
	    var menu_ul = $('.menu_drop > li > ul'),
	           menu_a  = $('.menu_drop > li > a');
	    
	    menu_ul.hide();
	
	    menu_a.click(function(e) {
	        e.preventDefault();
	        if(!$(this).hasClass('active')) {
	            menu_a.removeClass('active');
	            menu_ul.filter(':visible').slideUp('normal');
	            $(this).addClass('active').next().stop(true,true).slideDown('normal');
	        } else {
	            $(this).removeClass('active');
	            $(this).next().stop(true,true).slideUp('normal');
	        }
	    });
	
	});
</script>		
</head>
<body> 
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

	<!--top-header-->
	<!--start-logo-->
	<div class="logo">
		 <a><h1>Личный кабинет</h1></a>
	</div>
	<!--start-logo-->
	<!--bottom-header-->
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
        <li class="active"><a href="auth.php">Личный кабинет</a></li>
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
                    <li class="active">Личный кабинет</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--start-single-->
	<div class="single contact">
		<div class="container">
			<div class="single-main">
				<div class="col-md-9 single-main-left">
				<div class="sngl-top">
					
						
						<!-- FlexSlider -->
						<script src="js/imagezoom.js"></script>
						<script defer src="js/jquery.flexslider.js"></script>
						<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

						<script>
						// Can also be used with $(document).ready()
						$(window).load(function() {
						  $('.flexslider').flexslider({
							animation: "slide",
							controlNav: "thumbnails"
						  });
						});
						</script>
						
					<div class="col-md-7 single-top-right">
						<div class="single-para simpleCart_shelfItem">
						<h2 style="margin: 10px 0;">ФИО:<?= $_SESSION['user']['full_name'] ?></h2>
							<div class="clearfix"> </div>
							
							
							<h2>Email:<?= $_SESSION['user']['email'] ?></h2>
							<p>Не покупайте кота в мешке. Воспользуйтесь уникальным предложением, которое предлагает компания "PHARMA PLUS", и расширьте свои возможности!</p>
							
							<ul class="tag-men">
								
      <form action="../action_page.php">

        <div class="row">
          <div class="col-50">
            <h3>Добавить адрес доставки</h3>
            <input type="text" id="fname" name="firstname" placeholder="ФИО">
            <input type="text" id="email" name="email" placeholder="email"><br><br>
            <input type="text" id="adr" name="address" placeholder="Адрес">
            <input type="text" id="city" name="city" placeholder="Город">

            

          <div class="col-50">
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            
            
        <br>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Адрес доставки совпадает с платежным адресом
        </label>
        <br>
        <br>
        <input type="submit" value="Продолжить оформление заказа" class="btn">
      </form>
      <br>
    
							</ul>
								<a href="vendor/logout.php" class="add-cart item_add">Выход</a>
							
						</div>
					</div>

					<div class="clearfix"> </div>
				</div>
				<div class="tabs">
					
				</div>
					<div class="latestproducts">
					<div class="product-one">
						
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
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
				<div class="col-md-3 single-right">
					<div class="w_sidebar">
						<section  class="sky-form">
							<h4>Совет 1</h4>
							<div class="row1 scroll-pane">
								<div class="col col-4">
									<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Принимайте лекарства в соответствии с указаниями врача или практикующей медсестры и фармацевта.Не корректируйте дозу вашего лекарства, не проконсультировавшись с человеком, который прописал вам лекарство.</label>
								</div>
								</div>
						</section>
						<section  class="sky-form">
							<h4>Совет 2</h4>
							<div class="row1 row2 scroll-pane">
								<div class="col col-4">
									<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Составьте список всех ваших лекарств, включая травы и добавки, и держите его в своем кошельке. Держите список в актуальном состоянии. Также в этом списке запишите, если у вас аллергия на какие-либо лекарства или есть другие серьезные аллергии. </label>
								</div>
								
							</div>
						</section>
						<section  class="sky-form">
							<h4>Совет 3</h4>
							<div class="row1 row2 scroll-pane">
								<div class="col col-4">
									<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Постарайтесь пойти только в одну аптеку, чтобы ваш фармацевт мог наилучшим образом справиться с любыми возможными лекарственными взаимодействиями. </label>
								</div>
								
							</div>
						</section>
						
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>



</body>
</html>
