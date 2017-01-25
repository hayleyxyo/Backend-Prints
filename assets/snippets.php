<?php

/*	Show all errors
	================================================ */

	ini_set('display_errors', 1);
	error_reporting(E_ALL);

/*	Preliminaries
	================================================ */

	//	Sessions
		session_start();
	//	Caching
		header('Cache-Control: private');
	//	Config
		require_once('includes/config.php');
		$root=$_SERVER['WEB_ROOT'] = str_replace($_SERVER['SCRIPT_NAME'],"",$_SERVER['SCRIPT_FILENAME']);
	//	Includes
		require_once('includes/pdo.php');
		require_once('includes/library.php');

/*	Dispatch Normal Pages
	================================================ */

		//	index.php?index= …
			switch(@$_GET['index']) {
			//	Normal Pages
				case 'login':
					$index['include']='templates/login.php';
					$index['title']='TAFKAP: Login';
					break;
				case 'register':
					$index['include']='templates/register.php';
					$index['title']='TAFKAP: User Registration';
					$index['php']='includes/php/do.register.php';
					break;
				case 'checkout':
					$index['include']='templates/checkout.php';
					$index['title']='TAFKAP: Shopping Cart';
					$index['php']='includes/php/do.checkout.php';
					break;
				case 'contact':
					$index['include']='templates/contact.php';
					$index['title']='TAFKAP: Contact Us';
					$index['php']='includes/php/do.contact.php';
					break;
				case 'download':
					$index['include']='templates/download.php';
					$index['title']='TAFKAP: Contact Us';
					break;
				default:
					$index['include']='templates/index.php';
					$index['title']='The Artworks Formally Known As Prints';
					$index['php']='includes/php/do.index.php';
			}

/*	Extra PHP
	================================================ */

	if($index['php']) require_once $index['php'];


/*	Dispatch Admin Pages
	================================================ */

		//	Admin: Default to Login
			$index['include']='templates/login.php';
			$index['title']='TAFKAP: Login';
			$index['php']='includes/php/do.login.php';

		//	index.php?index= …
			switch(@$_GET['index']) {
			//	Normal Pages

			//	Admin Pages
				case 'admin':
					if (@$_SESSION['admin']) {
						$index['include']='templates/admin.php';
						$index['title']='TAFKAP: Administration';
					}
					break;
				case 'artists':
					if (@$_SESSION['admin']) {
						$index['include']='templates/artists.php';
						$index['title']='TAFKAP: Manage Artists';
						$index['php']='includes/php/do.artists.php';
					}
					break;
				case 'prints':
					if (@$_SESSION['admin']) {
						$index['include']='templates/prints.php';
						$index['title']='TAFKAP: Manage Prints';
						$index['php']='includes/php/do.prints.php';
					}
					break;
				case 'users':
					if (@$_SESSION['admin']) {
						$index['include']='templates/users.php';
						$index['title']='TAFKAP: Manage Users';
						$index['php']='includes/php/do.users.php';
					}
					break;
			//	Fall through
			}

/*	Admin Pages
	================================================ */

	//	admin.php
	//		<p><?php print "Welcome $_SESSION[givenname] $_SESSION[familyname]"; ?></p>

	//	prints.php


	//	artists.php



	//	users.php


?>