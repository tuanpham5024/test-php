<?php
if (isset($_POST['username'])) {
	$username = $_POST['username'];
	$query = "select * from users where usernames='$username'";
	$result = $con->query($query);
	if (mysqli_num_rows($result) > 0) {
		$alert = "Tên đăng nhập này không có sẵn. Đề nghị chọn 1 tên khác";
	} else {
		$password = md5($_POST['password']);
		$fullname = $_POST['fullname'];
		$mobile = $_POST['mobile'];
		$address = $_POST['address'];
		$email = $_POST['email'];
		$query1 = "insert into users(usernames,password,fullname, mobile,addess,email) values('$username','$password', '$fullname','$mobile','$address','$email')";
		$con->query($query1);
		$alert = "Đã đăng ký thành công tài khoản!!";
	}
}
?>


<section class="container">
	<h1>Đăng ký tài khoản</h1>
	<section><?= isset($alert) ? $alert : "" ?></section>
	<section>
		<form class="form" method="post" onsubmit="if (confirmpassword.value!=password.value){
			alert('Xác nhận mật khẩu không đúng!');
			confirmpassword.value = '';
			confirmpassword.focus();
			return false;}">
			<section>
				<label>Username: </label>
				<input type="text" name="username" required>
			</section>
			<section>
				<label>Password: </label>
				<input type="password" name="password" required>
			</section>
			<section>
				<label>Confirm Password:</label>
				<input type="password" name="confirmpassword">
			</section>
			<section>
				<label>Full name: </label>
				<input type="text" name="fullname" required>
			</section>
			<section>
				<label>Mobile: </label>
				<input type="tel" name="mobile" required>
			</section>
			<section>
				<label>Address: </label>
				<textarea name="address" rows="3" required=""></textarea>
			</section>
			<section>
				<label>Email: </label>
				<input type="email" name="email">
			</section>
			<section>
				<input type="submit" value="Đăng Ký" name="">
			</section>
		</form>
	</section>
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

	.form input {
		margin-right: auto;
	}
</style>