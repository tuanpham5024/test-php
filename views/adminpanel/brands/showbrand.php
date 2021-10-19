<?php
$query = "select * from brands";
$result = $con->query($query);
?>
<section>
	<h1>CÁC THƯƠNG HIỆU</h1>
	<a href="?option=addbrands">ADD BRAND</a>
	<table width="100%" border="1" cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				<thead>
					<th>ID</th>
					<th>Brand Name</th>
					<th>Status</th>
					<th>Action</th>
				</thead>
		<tbody>
			<?php foreach ($result as $item) : ?>
				<tr>
					<td><?= $item['id'] ?></td>
					<td><?= $item['brandName'] ?></td>
					<td><?= $item['brandStatus'] == 1 ? 'Active' : 'UnActive' ?></td>
					<td style="text-align: center;">
						<a href="#">Update</a>
						<a href="#">Delete</a>
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