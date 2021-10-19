<?php
$query = "select * from products where productStatus = 1";
if (isset($_GET['brandId'])) {
	$query .= " and brandId =" . $_GET['brandId'];
} else if (isset($_POST['keyword'])) {
	$query .= " and productName like '%" . $_POST['keyword'] . "%'";
} else if (isset($_GET['lowprice'])) {
	$lowprice = $_GET['lowprice'];
	$highprice = $_GET['highprice'];
	$query .= " and productPrice>='$lowprice' and productPrice<='$highprice'";
}
$result = $con->query($query);
?>
<section class="products">
	<?php foreach ($result as $item) : ?>
		<section class="product">
			<section>
				<a href="?option=productdetail&productid=<?= $item['id'] ?>">
					<img src="img/<?= $item['productImage'] ?>">
				</a>
			</section>
			<section style="text-align: center;">
				<section>
					<?= $item['productName'] ?>
				</section>
				<section>
					<?= number_format($item['productPrice'], 0, '.', '.') ?> Đ
				</section>
				<section>
					<input type="submit" value="Add To Cart" name="">
				</section>
			</section>

		</section>
	<?php endforeach; ?>
</section>

<style type="text/css">
	.products img {
		width: 100%;
		box-sizing: border-box;
	}

	.product {
		width: 40%;
		float: left;
		margin-left: 7%;
		margin-top: 5%;
		margin-bottom: 5%;
		box-sizing: border-box;

	}
</style>