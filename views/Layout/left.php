<?php 
$query = "select * from brands where brandStatus = 1";
$result = $con->query($query);
?>
<nav class="left">
<?php
	foreach ($result as $item):?>
	<a href="?option=search&brandId=<?=$item['id']?>"><?=$item['brandName']?></a> 
<?php endforeach;?>
</nav>
<style type="text/css">
	nav.left>a{
		float: left;
		width: 100%;
		margin-top: 3px;
		background: #00fff2;
		padding: 3px;
		box-sizing: border-box;
		color: red;
	}
</style>