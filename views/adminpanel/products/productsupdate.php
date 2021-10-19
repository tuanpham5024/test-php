<?php $product = mysqli_fetch_array($con->query("select * from products where id =" . $_GET['id'])); ?>
<?php
if (isset($_POST['productName'])) {
	$name = $_POST['productName'];
	$query = "select * from products where productName='$name' and id !=" . $product['id'];
	$result = $con->query($query);
	if (mysqli_num_rows($result) != 0) {
		$alert = "Đã tồn tại tên sản phẩm này!";
	} else {
		$brandId = $_POST['brandId'];
		$price = $_POST['productPrice'];
		$store = "../img/";
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
			unlink($store . $product['productImage']);
		} else {
			$alert = "File đã chọn ko phải file ảnh!!";
		}
		if (empty($imageName)) {
			$imageName = $product['productImage'];
		}
		$con->query("update products set brandId = '$brandId', productName = '$name', productPrice = '$price', productImage = '$imageName', productDescription = '$des', productStatus = '$status' where id =" . $product['id']);
		header("location: ?option=showproducts");
	}
}
?>
<?php $brand = $con->query("select * from brands") ?>
<h1>UPDATE SẢN PHẨM</h1>
<section><?= isset($alert) ? $alert : "" ?></section>
</section>
<section>
	<form method="post" enctype="multipart/form-data">
		<section>
			<label>Brand ID:</label>
			<select name="brandId" required="">
				<option hidden="">--Chọn Hãng--</option>
				<?php foreach ($brand as $item) : ?>
					<option value="<?= $item['id'] ?>" <?= $item['id'] == $product['brandId'] ? 'selected' : '' ?>><?= $item['brandName'] ?></option>
				<?php endforeach; ?>
			</select>
		</section>
		<section>
			<label>Product Name:</label><input type="text" name="productName" required="" value="<?= $product['productName'] ?>">
		</section>
		<section>
			<label>Product Price:</label><input type="number" name="productPrice" min="100000" value="<?= $product['productPrice'] ?>">
		</section>
		<section>
			<label>Product Image:</label>
			<br>
			<img width="20%" src="../img/<?= $product['productImage'] ?>">
			<input type="file" name="image">
		</section>
		<section>
			<label>Product Description:</label><textarea name="productDescription" id="productDescription"><?= $product['productDescription'] ?></textarea>
			<script type="text/javascript">
				CKEDITOR.replace("productDescription")
			</script>
		</section>
		<section>
			<label>Status</label>
			<input type="radio" name="productStatus" value="1" <?= $product['productStatus'] == 1 ? 'checked' : '' ?>>Active
			<input type="radio" name="productStatus" value="0" <?= $product['productStatus'] == 0 ? 'checked' : '' ?>>UnActive
		</section>
		<section>
			<input type="submit" name="" value="Update">
		</section>
	</form>
</section>