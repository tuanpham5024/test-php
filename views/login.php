<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title></title>
</head>

<body>
	<?php
	// echo md5('123456');
	if (isset($_POST['username'])) {
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$query = "select * from users where usernames = '$username' and password = '$password'";
		$result = $con->query($query);
		if (mysqli_num_rows($result) == 0) {
			$alert = "Tên Đăng Nhập Hoặc Mật Khảu Không Đúng!";
		} else {
			$user = mysqli_fetch_array($result);
			if ($user['states'] == 0) {
				$alert = "Tai khoan cua ban da bi khoa";
			} else {
				$_SESSION['user'] = $username;
				header("location: .");
				include "home.php";
			}
		}
	}
	?>
	<section class="container">
		<h1>Đăng nhập:</h1>
		<section>
			<?= isset($alert) ? $alert : "" ?>
		</section>
		<form class="form" method="post">
			<section>
				<label>Username: </label>
				<input type="text" name="username">
			</section>
			<section>
				<label>Password: </label>
				<input type="password" name="password" autocomplete="off">
			</section>
			<section>
				<input type="submit" name="" value="Login">
			</section>
		</form>
	</section>
	<style type="text/css">
		.container {
			display: flex;
			flex-direction: column;
			align-items: center;
		}

		.form {
			display: flex;
			flex-direction: column;
			gap: 20px 0;
		}
	</style>
</body>

</html>