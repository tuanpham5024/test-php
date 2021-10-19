<?php
if (isset($_GET['option'])) {
	switch ($_GET['option']) {
		case 'showbrands':
			include "../views/adminpanel/brands/showbrand.php";
			break;
		case 'addbrands':
			include "../views/adminpanel/brands/addbrands.php";
			break;
		case 'showproducts':
			include "../views/adminpanel/products/showproducts.php";
			break;
		case 'addproducts':
			include "../views/adminpanel/products/addproducts.php";
			break;
		case 'productsupdate':
			include "../views/adminpanel/products/productsupdate.php";
			break;
		case 'logout':
			unset($_SESSION['admin']);
			header('location: .');
			break;
		default:
			break;
	}
} else {
	include "../views/adminpanel/home-admin.php";
}
