<table width="100%" border="1" cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<td style="font-weight: bold;">Xin chào: <?= $_SESSION['admin'] ?><br>
				<a href="?option=logout">LogOut</a>
			</td>
			<td style="font-weight: bold;">TRANG QUẢN TRỊ ADMIN</td>
		</tr>
		<tr>
			<td>
				<section>
					<a href="?option=showbrands">Thương Hiệu</a>
				</section>
			</td>
			<td>
				<?php //include"routes-admin.php"; 
				?>
			</td>
		</tr>
		<tr>
			<td>
				<section>
					<a href="?option=showproducts">Sản Phẩm</a>
				</section>
			</td>
			<td>
				<?php include "routes-admin.php"; ?>
			</td>
		</tr>
	</tbody>
</table>
<style type="text/css">
	a {
		text-decoration: none;
		font-weight: bold;
		color: blue;
		background-color: #6dd193;
	}

	a:hover {
		color: red;
		font-size: 15px;
		font-weight: initial;
		box-sizing: border-box;
	}
</style>