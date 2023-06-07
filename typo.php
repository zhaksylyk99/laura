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
							<a><h1>Интересные новости</h1></a>
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
		<li class="active"><a href="typo.php">Интересные новости</a></li>
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
						<img src="images/bnr1.jpg" alt=""/>
					</li>
				<li>
					<img src="images/bnr2.jpg" alt=""/>
				</li>
					<li>
						<img src="images/bnr3.jpg" alt=""/>
					</li>
				</ul>
			</div>
		<div class="clearfix"> </div>
	</div>

	<!--end-breadcrumbs-->
	<!--typo-starts-->
	<div class="pages" id="pages">
		<div class="container">
			<div class="typo-top heading">
				<h2>Рекомандация</h2>
			</div>

		    <div class="progress-bars">
			 <h3 class="ghj">Рейтенг товаров 2023</h3>
				 <div class="tab-content">
				 		<p>Парацетамол — 48,4 млн пачек</p>
					  <div class="tab-pane active" id="domprogress">
						  <div class="progress">    
							<div class="progress-bar progress-bar-primary" style="width: 51%"></div>
						  </div>
						  <p>Цитрамон 54,8 млн упаковок.</p>
						  <div class="progress">    
							<div class="progress-bar progress-bar-info" style="width: 60%"></div>
						  </div>
						  <p>Ксилометазолин, его приобрели 127 млн упаковок</p>
						  <div class="progress">
							<div class="progress-bar progress-bar-success" style="width: 80%"></div>
						  </div>
						  <p>Омепразол 25 млн упаковок</p>
						  <div class="progress">
							<div class="progress-bar progress-bar-warning" style="width: 30%"></div>
						  </div>
						  <p>Бисопролол — 39 млн упаковок</p>
						  <div class="progress">
							<div class="progress-bar progress-bar-danger" style="width: 40%"></div>
						  </div>
						  <p>Корвалол — 30 млн упаковок</p>
						  <div class="progress">
							<div class="progress-bar progress-bar-inverse" style="width: 35%"></div>
						  </div>
						</div>
			   </div>
		    </div>

		    <div class="alerts">
			  <h3 class="ghj">Совет дня</h3>
			   <div class="alert alert-success" role="alert">
					<strong>ВитаВИТ Имунно, Витамин Д</strong>- Сбалансированое питание, прогулки на свежем воздухе, отказ от вредных привычек.
			   </div>
			   <div class="alert alert-info" role="alert">
					<strong>Новопассит в каплях, Магнефар В6</strong>- Прогулки на свежем воздухе, рациональное питание, гимнастика, эмоциональный покой.
			   </div>
			   <div class="alert alert-warning" role="alert">
					<strong>Терафлекс таб, Суставит с хондроитином </strong>- снижение массы тела, рациональное питание, ЛФК, избегать резких движений,перегрузок.
			   </div>
			   <div class="alert alert-danger" role="alert">
					<strong>Ванночка с морской солью, крем Фельдшер для огрубевшей кожи, пластырь Юкан от сухой мозоли </strong> ношение ортопедический обуви, массаж стоп.
			   </div>
			   <div class="alert alert-success" role="alert">
					<strong>Aквалор для горла, ротокан для полоскания, витамин С </strong>ЗОЖ: обильное теплое питье, рациональное питание, здоровый сон.
			   </div>
		    </div>

		    <!--
			<div class="distracted">
			  <h3 class="ghj">Wells</h3>
				   <div class="well">
					There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration
				   </div>
				   <div class="well">
					It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here
				   </div>
				   <div class="well">
					Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic
				   </div>
		    </div>
		<div class="appearance">
			 <h3 class="ghj">Badges</h3>
				<div class="col-md-6">
					<p>Add modifier classes to change the appearance of a badge.</p>
					  <table class="table table-bordered">
						<thead>
							<tr>
								<th>Classes</th>
								<th>Badges</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>No modifiers</td>
								<td><span class="badge">42</span></td>
							</tr>
							<tr>
								<td><code>.badge-primary</code></td>
								<td><span class="badge badge-primary">1</span></td>
							</tr>
							<tr>
								<td><code>.badge-success</code></td>
								<td><span class="badge badge-success">22</span></td>
							</tr>
							<tr>
								<td><code>.badge-info</code></td>
								<td><span class="badge badge-info">30</span></td>
							</tr>
							<tr>
								<td><code>.badge-warning</code></td>
								<td><span class="badge badge-warning">412</span></td>
							</tr>
							<tr>
								<td><code>.badge-danger</code></td>
								<td><span class="badge badge-danger">999</span></td>
							</tr>
						</tbody>
					</table>                    
				</div>
				<div class="col-md-6">
				  <p>Easily highlight new or unread items with the <code>.badge</code> class</p>
					<div class="list-group list-group-alternate"> 
						<a href="#" class="list-group-item"><span class="badge">201</span> <i class="ti ti-email"></i> Inbox </a> 
						<a href="#" class="list-group-item"><span class="badge badge-primary">5021</span> <i class="ti ti-eye"></i> Profile visits </a> 
						<a href="#" class="list-group-item"><span class="badge">14</span> <i class="ti ti-headphone-alt"></i> Call </a> 
						<a href="#" class="list-group-item"><span class="badge">20</span> <i class="ti ti-comments"></i> Messages </a> 
						<a href="#" class="list-group-item"><span class="badge badge-warning">14</span> <i class="ti ti-bookmark"></i> Bookmarks </a> 
						<a href="#" class="list-group-item"><span class="badge badge-danger">30</span> <i class="ti ti-bell"></i> Notifications </a> 
					</div>
			    </div>
			   <div class="clearfix"> </div>
			</div>
			</div>
		</div>	
	</div>	
-->
	<!--typo-ends-->

	<a href="#" id="main">
      <div id="okno">
        Всплывающее окошко!
      </div>
    </a>
     
    <a href="#main">Вызвать всплывающее окно</a>

	 <style>
      #main {
        display: none;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
      }
      #okno {
        width: 300px;
        height: 50px;
        text-align: center;
        padding: 15px;
        border: 3px solid #0000cc;
        border-radius: 10px;
        color: #0000cc;
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        margin: auto;
      }
      #main:target {display: block;}
    </style>
</body>
</html>