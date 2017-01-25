<?php
	//	Show Errors

	//	Peliminaries
		if(!session_id()) session_start();
		session_regenerate_id();

		$host=$_SERVER['HTTP_HOST'];
		$root=$_SERVER['WEB_ROOT']=str_replace($_SERVER['SCRIPT_NAME'],"",$_SERVER['SCRIPT_FILENAME']);

		require_once "$root/includes/pdo.php";
		require_once "$root/includes/classes/class.users.php";
		require_once "$root/includes/login.php";

	//	Pages
		$tile='The Artworks Formally Known as Prints';
		$heading='Welcome';
		$content='index.php';
		$php='index.php';

		$page=@$_GET['page'];
		switch($page) {
			case 'contact':
				$tile='TAFKAP: Contact';
				$heading='Contact Us';
				$content='contact.php';
				$php='contact.php';
				break;
			case 'register':
				$tile='TAFKAP: User Registration';
				$heading='Registration';
				$content='register.php';
				$php='register.php';
				break;
		}
	//	Extra PHP
		if($php) require_once "$root/pages/includes/$php";

?>
<!DOCTYPE html>
<html lang="en-au">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title><?php print $title; ?></title>
	<link rel="stylesheet" title="main" type="text/css" href="styles/styles.css">

	<link rel="stylesheet" type="text/css" href="styles/forms.css">
	<script type="text/javascript" src="scripts/lb.js"></script>
	<script type="text/javascript" src="scripts/javascript.js"></script>
</head>
<body>
<!-- pages/includes/header.php -->
	<header>
		<h1><?php  print $heading; ?></h1>
<?php if(isset($_SESSION['user'])): ?>
		<form method="post" action="">
		<p id="loggedin">Logged in as: <?php print $_SESSION['name']; ?>
			<button type="submit" name="logout">Logout</button>
		</p>
		</form>
<?php else: ?>
		<form method="post" action="">
			<input type="email" name="email" required>
			<input type="password" name="password" required>
			<button type="submit" name="login">Login</button>
		</form>
<?php endif; ?>
	</header>
<!-- end header.php -->
<!-- pages/includes/nav.php -->
	<nav>
		<ul>
			<li><a href="/">Home</a></li>
			<li><a href="/contact">Contact</a></li>
			<li><a href="/download">Download</a></li>
			<li><a href="/register">Register</a></li>
			<?php if(@$_SESSION['admin']): ?><li><a href="/admin">Administration</a></li><?php  endif;?>
		</ul>
	</nav>
<!-- end nav.php -->
<div id="body">
	<?php require_once "pages/$content"; ?>
</div>
<!-- pages/includes/footer.php -->
	<footer>
		<p>Footer</p>
	</footer>
<!-- end footer.php -->
</body>
</html>
