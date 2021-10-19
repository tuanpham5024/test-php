<?php
// echo md5('123456');
if (isset($_POST['username'])) {
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$query = "select * from admins where username = '$username' and password = '$password'";
	$result = $con->query($query);
	if (mysqli_num_rows($result) == 0) {
		$alert = "Tên Đăng Nhập Hoặc Mật Khảu Không Đúng!";
	} else {
		$user = mysqli_fetch_array($result);
		if ($user['adminstatus'] == 0) {
			$alert = "Tai khoan cua ban da bi khoa";
		} else {
			$_SESSION['admin'] = $username;
			header("location: .");
		}
	}
}
?>

<section class="center">
	<h1>Đăng nhập Admin:</h1>
	<h4><?php md5('123456') ?></h4>
	<section>
		<?= isset($alert) ? $alert : "" ?>
	</section>
	<form method="post">
		<section>
			<section>
				<label>Username: </label>
				<input type="text" name="username">
			</section>
			<section>
				<label>Password: </label>
				<input type="password" name="password" autocomplete="off">
			</section>
		</section>
		<section>
			<input type="submit" name="" value="Login">
		</section>
	</form>
</section>
<style type="text/css">
	.center {
		display: flex;
		flex-direction: column;
		align-items: center;
	}
</style>