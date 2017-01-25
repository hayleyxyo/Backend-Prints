<?php

	$users=new Users($pdo);
	if(isset($_POST['login'])) {
		$row=$users->login($_POST['email'],$_POST['password']);
		if($row) {
			$_SESSION['user']=$row['id'];
			$_SESSION['email']=$_POST['email'];
			$_SESSION['name']="{$row['givenname']} {$row['familyname']}";
			$_SESSION['admin']=!!$row['admin'];
		}
		//else error
	}
	if(isset($_POST['logout'])) {
		//session_unset();
		unset($_SESSION['user'],$_SESSION['email'],$_SESSION['name'],$_SESSION['admin']);
		// session_destroy();
		// setcookie(session_name(),'',0);
	}
