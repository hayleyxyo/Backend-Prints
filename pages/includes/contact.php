<?php
	$edit=true;
	$errors='';
	$name=$email=$subject=$message='';

	function getData() {
		return array(
			'name'=>trim(@$_POST['name']),
			'email'=>trim(@$_POST['email']),
			'subject'=>trim(@$_POST['subject']),
			'message'=>trim(@$_POST['message']),
			'honeypot'=>isset($_POST['honeypot']),
		);
	}

	function multiline($text) {  //checks for line break
		return preg_match('/\r\\n/',$text);
	}

	function checkErrors($data) {
		extract($data);    //copy into simple variables
		$errors=array();

		if(!$name) $errors[]='Missing Name';
		elseif(multiline($name)) $errors[]='Invalid Name';

		if(!$email) $errors[]='Missing Email Address';
		elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[]='Invalid Email Address';

		if(!$subject) $errors[]='Missing Subject';
		elseif(multiline($subject)) $errors[]='Invalid Subject';

		if(!$message) $errors[]='Missing Message';

		if($honeypot) $errors[]='Only Humans Allowed';

		return $errors?:false;
	}

	if(isset($_POST['preview'])) {
		$data=getData();
		$errors=checkErrors($data);
		extract($data);
		if(!$errors) $edit=false;
		else $errors=sprintf('<p class="error">%s</p>',implode('<br>',$errors));
	}
	if(isset($_POST['review'])) {
		$data=getData();
		extract($data);
	}
	if(isset($_POST['send'])) {
		$data=getData();
		$errors=checkErrors($data);		//just in case of attack
		extract($data);
		if(!$errors) {		//send email
			$to="Hayley Zhang <hayleyxyo.zhang@gmail.com>";
			$headers="From: $name <$email>\r\nCc: $name <$email>";
			mail($to,$subject,$message,$headers);

		}
		else $errors=sprintf('<p class="error">%s</p>',implode('<br>',$errors));
	}
?>
