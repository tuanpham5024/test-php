<!DOCTYPE html>
<?php
session_start();
$con = new MySQLi("localhost", "root", "", "ecommerce");
mysqli_set_charset($con, 'utf8');
?>
<html>

<head>
	<meta charset="utf-8">
	<title>Admin</title>
	<script type="text/javascript" src="../public/ckeditor/ckeditor.js"></script>
</head>

<body>
	<?php
	if (empty($_SESSION['admin'])) {
		include "loginadmin.php";
	} else {
		include "controlpanel.php";
	}

	?>
</body>

</html>