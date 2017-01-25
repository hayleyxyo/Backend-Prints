<?php
	$givenname=$familyname=$email='';

	$confirmation='';

	$users=new Users($pdo);

	function getData() {
		return array(
			'familyname'=>trim(@$_POST['familyname']),
			'givenname'=>trim(@$_POST['givenname']),
			'email'=>trim(@$_POST['email']),
			'password'=>@$_POST['password'],
			'confirm'=>@$_POST['confirm'],
		);
	}

	function checkErrors($data) {
		extract($data);    //copy into simple variables
		$errors=array();

		if(!$givenname) $errors[]='Missing Givenname';
		if(!$familyname) $errors[]='Missing Familyname';

		if(!$email) $errors[]='Missing Email Address';
		elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[]='Invalid Email Address';

		if(!$password) $errors[]='Missing Password';
		elseif($password!=$confirm) $errors[]='Unmatch Password';

		return $errors?:false;
	}

	// confirmation email
		//	/register?confirmation=...

		if(isset($_GET['confirmation'])) {
			$confirmation=$_GET['confirmation'];
			$email=$users->confirmation($confirmation);
			if(!$email) $confirmation=$email='';
		}

	//processing

	if(isset($_POST['register'])) {
		$data=getData();
		$errors=checkErrors($data);
		extract($data);
		if(!$errors) {
				$confirmation=$users->insert(array($givenname,$familyname,$email,$password));

				// Send Email
					$message="Please confirm: $link";
					$to="$givenname $familyname <$email>";
					$headers="From: Site Admin <info@example.com>";
					$subject='TAFKAP: confirm Registration';

					mail($to, $subject, $message, $headers);
		}
		else $errors=sprintf('<p class="error">%s</p>',implode('<br>',$errors));
	}

	if(isset($_POST['doconfirmation'])) {
			$row=$users->confirm($_POST['email'],$_POST['confirmation'],$_POST['password']);

			if($row) {
				$sql="UPDATE users SET active=true WHERE id={$row['id']}";
				$pdo->exec($sql);
				$_SESSION['user']=$row['id'];
				$_SESSION['email']=$email;
				$_SESSION['name']="{$row['givenname']} {$row['familyname']}";
				$_SESSION['admin']=!!$row['admin'];
			}
			//else error
	}
?>
