<?php
if (isset($_GET['option'])) {
	switch ($_GET['option']) {
		case 'home':
			include "views/home.php";
			break;
		case 'new':
			include "views/new.php";
			break;
		case 'Login':
			include "views/login.php";
			break;
		case 'fb':
			include "views/home.php";
			break;
		case 'yt':
			include "views/home.php";
			break;
		case 'tel':
			include "views/home.php";
			break;
		case 'signup':
			include "views/signup.php";
			break;
		case 'search':
			include "views/search.php";
			break;
		case 'productdetail':
			include "views/productdetail.php";
			break;
		case 'logout':
			unset($_SESSION['user']);
			header('location: .');
			break;
		default:
			break;
	}
} else {
	include "views/home.php";
}
