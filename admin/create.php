		<?php
			if (isset($_GET['formSubmit'])) {
				$nameform = $_GET['name'];
				$codeform = $_GET['code'];
				$priceform = $_GET['price'];
				$imageform = $_GET['image'];
				$mysqli = new mysqli("localhost","root", "root", "blog_samples");
				if ($mysqli -> connect_errno) {
					echo "Error";
					exit;
				}

				$name = '"' .$mysqli -> real_escape_string($nameform).'"';
				$code = '"' .$mysqli -> real_escape_string($codeform).'"';
				$price = '"' .$mysqli -> real_escape_string($priceform).'"';
				$image = '"' .$mysqli -> real_escape_string($imageform).'"';
				$query = "INSERT INTO tblproduct (name, code, image, price) VALUES ($name, $code, $image, $price)";
				$result = $mysqli -> query($query);
				if ($result) {
					print('Успешно !'.'<br>');
				}
				$mysqli->close();
			}
			echo '<meta HTTP-EQUIV="Refresh" Content="0; URL=/admin/product.php">';
		?>
