<?php
if (isset($_POST['brandName'])) {
	$brandName = $_POST['brandName'];
	$query = "select * from brands where brandName='$brandName'";
	$result = $con->query($query);
	if (mysqli_num_rows($result) > 0) {
		$alert = "Đã tồn tại tên hãng!";
	} else {
		$brandStatus = $_POST['brandStatus'];
		$query = "insert into brands(brandName,brandStatus) values('$brandName', '$brandStatus')";
		$con->query($query);
		header("location. ?option=showbrand");
	}
}
?>
<h1>ADD BRAND</h1>
<section><?= isset($alert) ? $alert : "" ?></section>
</section>
<section>
	<form method="post">
		<section>
			<label>Brand name:</label><input type="text" name="brandName">
		</section>
		<section>
			<label>Status</label><input type="radio" name="brandStatus" value="1">Active<input type="radio" name="brandStatus" value="0" checked="">UnActive
		</section>
		<section>
			<input type="submit" name="" value="Add">
		</section>
	</form>
</section>