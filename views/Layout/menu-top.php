<a href="?option=home">Home</a>
<a href="?option=new">New</a>
<a href="?option=tel">Tel</a>
<a href="?option=signup">SignUp</a>
<?php if (empty($_SESSION['user'])) : ?>
	<a href="?option=Login">Login</a>
<?php else : ?>
	<section><span>Hello: <?= $_SESSION['user'] ?> [<a href="?option=logout">LogOut</a>]</span></section>
<?php endif; ?>