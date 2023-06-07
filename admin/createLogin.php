		<?php
			if (isset($_GET['Submit'])) {
				$full_name = $_GET['full_name'];
				$loginform = $_GET['login'];
				$emailform = $_GET['email'];
				$passwordform = $_GET['password'];
				$avatarform = $_GET['avatar'];
				$mysqli = new mysqli("localhost","root", "root", "blog_samples");
				if ($mysqli -> connect_errno) {
					echo "Error";
					exit;
				}

				$name = '"' .$mysqli -> real_escape_string($full_name).'"';
				$login = '"' .$mysqli -> real_escape_string($loginform).'"';
				$email = '"' .$mysqli -> real_escape_string($emailform).'"';
				$password = '"' .$mysqli -> real_escape_string($passwordform).'"';
				$avatar = '"' .$mysqli -> real_escape_string($avatarform).'"';
				$query = "INSERT INTO users (full_name, login, email, password, avatar) VALUES ($name, $login, $email, $password, $avatar)";
				$result = $mysqli -> query($query);
				if ($result) {
					print('Успешно !'.'<br>');
				}
				$mysqli->close();
			}
			echo '<meta HTTP-EQUIV="Refresh" Content="0; URL=/admin/user.php">';
		?>
