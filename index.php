<!DOCTYPE html>
<?php
session_start();
$con = new MySQLi("localhost", "root", "", "ecommerce");
mysqli_set_charset($con, 'utf8');
?>
<html>

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title></title>
</head>

<body>
	<section id="wrapper">
		<header>
			<?php include "views/Layout/header.php"; ?>
		</header>
		<nav class="menu-top">
			<?php include "views/Layout/menu-top.php"; ?>
		</nav>
		<aside><?php include "views/Layout/left.php"; ?></aside>
		<article>
			<?php include "routes.php"; ?>
		</article>
		<aside>
			<?php include "views/Layout/right.php"; ?>
		</aside>
		<footer>Footer</footer>
	</section>
</body>

</html>