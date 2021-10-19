<style type="text/css">
	.prices>a {
		float: left;
		width: 100%;
		margin-top: 5px;
	}
</style>
<h2>Mức giá</h2>
<?php
$query = "select * from prices where pricesStatus=1";
$result = $con->query($query);
?>
<section class="prices">
	<?php foreach ($result as $item) : ?>
		<a href="?option=search&lowprice=<?= $item['lowprice'] ?>&highprice=<?= $item['highprice'] ?>"><?= number_format($item['lowprice'], 0, ',', '.') . ' - ' . number_format($item['highprice'], 0, ',', '.') ?></a>
	<?php endforeach; ?>
</section>