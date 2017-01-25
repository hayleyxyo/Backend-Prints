<?php
	require_once '../includes/classes/class.thumbnails.php';
	require_once '../includes/library.php';

	$scripts=array('','prints.sql','users.sql','artistscreate.sql','artistsimport.sql',
		'printscreate.sql','printsimport.sql','orders.sql','etc.sql');
	$setup = isset($_POST['setup']) ? key($_POST['setup']) : 0;

	$dsn="mysql:host=localhost;dbname=prints";

	try {
		$pdo = new PDO($dsn,'root','mysql');
	} catch(PDOException $e) {
		try {
			$dsn="mysql:host=localhost";
			$pdo = new PDO($dsn,'root','mysql');
		}
		catch (PDOException $e2) {
			die ($e2->getMessage());
		}
#		die ($e->getMessage());
	}

	$pdo->exec('SET SESSION TRANSACTION ISOLATION LEVEL SERIALIZABLE;');
	$pdo->exec('SET SESSION sql_mode = \'ANSI\';');
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


	if($setup) {
		$script=file_get_contents("sql/{$scripts[$setup]}");
		$pdo->exec($script);
	}

	if(isset($_POST['images'])) {
		$folder='../images';
		$sourceFolder='$folder/png';
		$options=array('newtype'=>IMAGETYPE_JPEG);

		$sql='SELECT id,filename,src FROM prints';
		foreach($pdo->query($sql) as $row) {
			list($id,$filename,$src)=$row;

			//	Using png, so change file extension
				$filename=basename($filename,'.jpg').'.png';

			$thumbnail=new Thumbnailer("$folder/png/$filename",$options);
			$thumbnail->make("$folder/original/$src",array('method'=>'scale','scale'=>100));
			$thumbnail->make("$folder/preview/$src",array('method'=>'pad','width'=>640,'height'=>480));
			$thumbnail->make("$folder/cart/$src",array('method'=>'pad','width'=>40,'height'=>30));
			$thumbnail->make("$folder/thumbnails/$src",array('method'=>'pad','width'=>160,'height'=>120));
			$thumbnail->make("$folder/thumbnails2/$src",array('method'=>'pad','width'=>160,'height'=>120,'colour'=>'sepia'));
		}
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>The Artworks Formally Known as Prints</title>
	<meta charset="utf-8">

	<link rel="stylesheet" type="text/css" href="styles/forms.css">
	<link rel="stylesheet" type="text/css" href="../styles/styles.css">

	<script type="text/javascript" src="includes/javascript.js"></script>

	<style type="text/css">
		ol#setup {
			list-style-type: none;
			padding: 0px;
			margin: 0px;
		}
		ol#setup li {
			border: 0px;
			border-bottom: 2px solid white;
			width: 16em;
		}
		ol#setup li ul {
			list-style-type: none;
			padding: 0px;
			margin: 0px;
		}
		ol#setup li {
			font-weight: bold;
		}
		ol#setup li ul li{
			border: none;
		}
		ol#setup button {
			width: 16em;
			font-weight: bold;
			text-align: left;
			background-color: transparent;
			border: 0px;
			color: #666;
			border-left: 2px solid white;
		}
		ol#setup button:hover {
			color: white;
		}
	</style>
</head>
<body>
<div id="body">
	<h1>The Artworks Formally Known as Prints</h1>
	<h2>Database Setup</h2>
	<form method="post" action="">
	<ol id="setup">
		<li>Database
			<ul><li><button type="submit" name="setup[1]">Create Database</button></li></ul>
		</li>
		<li>Artists
			<ul><li><button type="submit" name="setup[3]">Create Artists</button></li>
				<li><button type="submit" name="setup[4]">Import Artists</button></li>
			</ul>
		</li>
		<li>Users
			<ul><li><button type="submit" name="setup[2]">Create Users</button></li></ul>
		</li>
		<li>Prints
			<ul><li><button type="submit" name="setup[5]">Create Prints</button></li>
				<li><button type="submit" name="setup[6]">Import Prints</button></li>
				<li><button type="submit" name="images">Copy Images</button></li>
			</ul>
		</li>
		<li>Orders
			<ul><li><button type="submit" name="setup[7]">Create Orders &amp; Items</button></li>
			</ul>
		</li>
		<li>Misc
			<ul><li><button type="submit" name="setup[8]">Create View printdetails</button></li>
			</ul>
		</li>
	</ol>
	</form>
</div>
</body>
