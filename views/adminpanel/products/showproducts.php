<?php
$query = "select * from products";
$result = $con->query($query);
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	// $products = $con->query("select * from orderdetail where productId = $id");
	// if(mysqli_num_rows($products)!=0){
	//     $con->query("update products set status = 0 where id=$id");
	// }
	// else{
	//     $con->query("delete from products where id=$id");
	// }
	// ko có bảng order vì thầy chưa dạy
	$con->query("delete from products where id=$id");
	unlink("../imgs/" . $_GET['image']);
	header("location: ?option=showproducts");
}
?>
<?php $count = 1; ?>
<section>
	<h1>CÁC SẢN PHẨM</h1>
	<a href="?option=addproducts">ADD PRODUCTS</a>
	<table width="100%" border="1" cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				<thead>
					<th>STT</th>
					<th>ID</th>
					<th>Tên</th>
					<th>Giá</th>
					<th>Ảnh</th>
					<th>Trạng Thái</th>
					<th>Action</th>
				</thead>
		<tbody>
			<?php foreach ($result as $item) : ?>
				<tr>
					<td><?= $count++; ?></td>
					<td><?= $item['id'] ?></td>
					<td><?= $item['productName'] ?></td>
					<td><?= number_format($item['productPrice'], 0, ',', '.') ?></td>
					<td width="30%"><img width="20%" src="../imgs/<?= $item['productImage'] ?>"></td>
					<td><?= $item['productStatus'] == 1 ? 'Active' : 'UnActive' ?></td>
					<td style="text-align: center;">
						<a href="?option=productsupdate&id=<?= $item['id'] ?>&brandId=<?= $item['brandId'] ?>">Update</a>
						<a href="?option=showproducts&id=<?= $item['id'] ?>&image=<?= $item['productImage'] ?>">Delete</a>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
		</tr>
		</thead>
	</table>
</section>
<style type="text/css">
	a {
		text-decoration: none;
		font-weight: bold;
		color: blue;
	}

	a:hover {
		color: red;
		font-size: 15px;
		font-weight: initial;
		box-sizing: border-box;
	}
</style>