<?php
if (isset($_GET['productid'])) {
	$query = "select * from products where id=" . $_GET['productid'];
	$result = $con->query($query);
	$item = mysqli_fetch_array($result);
}
?>
<section class="product">
	<section>
		<a href="?option=productdetail&productid=<?= $item['id'] ?>">
			<img width="100%" src="imgs/<?= $item['productImage'] ?>">
		</a>
	</section>
	<section>
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
	<hr>
	<section>
		<?= $item['productDescription'] ?>
	</section>

</section>