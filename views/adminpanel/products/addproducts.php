<?php
if (isset($_POST['productName'])) {
	$name = $_POST['productName'];
	$query = "select * from products where productName='$name'";
	$result = $con->query($query);
	if (mysqli_num_rows($result) > 0) {
		$alert = "Đã tồn tại tên sản phẩm!";
	} else {
		$brandId = $_POST['brandId'];
		$price = $_POST['productPrice'];
		$store = "../imgs/";
		$des = $_POST['productDescription'];
		$status = $_POST['productStatus'];
		$imageName = $_FILES['image']['name'];
		$imageTemp = $_FILES['image']['tmp_name'];
		$exp3 = substr($imageName, strlen($imageName) - 3);
		$exp4 = substr($imageName, strlen($imageName) - 4);

		$arr = ['jpg', 'png', 'bmp', 'gif', 'JPG', 'PNG', 'BMP', 'GIF', 'jpeg', 'JPEG', 'webp', 'WEBP'];
		if (in_array($exp3, $arr)) {
			$imageName = time() . '_' . $imageName;
			move_uploaded_file($imageTemp, $store . $imageName);
			$con->query("insert into products(brandId,productName, productPrice, productImage, productDescription, productStatus) values('$brandId', '$name', '$price', '$imageName','$des', '$status')");
			header("location: ?option=showproducts");
		} else {
			$alert = "Ảnh không hợp lệ";
		}
	}
}
?>
<?php $brand = $con->query("select * from brands") ?>
<h1>ADD BRAND</h1>
<section><?= isset($alert) ? $alert : "" ?></section>
</section>
<section>
	<form method="post" enctype="multipart/form-data">
		<section>
			<label>Brand ID:</label>
			<select name="brandId" required="">
				<option hidden="">--Chọn Hãng--</option>
				<?php foreach ($brand as $item) : ?>
					<option value="<?= $item['id'] ?>" required><?= $item['brandName'] ?></option>
				<?php endforeach; ?>
			</select>
		</section>
		<section>
			<label>Product Name:</label><input type="text" name="productName" required="">
		</section>
		<section>
			<label>Product Price:</label><input type="number" name="productPrice" min="100000" required="">
		</section>
		<section>
			<label>Product Image:</label><input type="file" name="image">
		</section>
		<section>
			<label>Product Description:</label><textarea name="productDescription" id="productDescription"></textarea>
			<script type="text/javascript">
				CKEDITOR.replace("productDescription")
			</script>
		</section>
		<section>
			<label>Status</label><input type="radio" name="productStatus" value="1">Active<input type="radio" name="productStatus" value="0" checked="">UnActive
		</section>
		<section>
			<input type="submit" name="" value="Add">
		</section>
	</form>
</section>