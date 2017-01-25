<?php
	class Users{
		private $pdo;
		private $sql=array(
			'insert'=>'INSERT INTO users(givenname,familyname,email,password,confirmation) VALUES(?,?,?,?,?)',
			'confirm'=>'SELECT id,givenname,familyname,password,admin FROM users WHERE email=? AND confirmation=?',
			'confirmation'=>'SELECT email FROM users WHERE confirmation=?',
			'login'=>'SELECT id,givenname,familyname,password,admin FROM users WHERE email=? AND active=true',
		);

		public function __construct($pdo) {
			//	$users=new Users($pdo)
			$this->pdo=$pdo;
		}

		public function insert(array $data) {
			list($givenname,$familyname,$email,$password)=$data;
			$password=password_hash($password,PASSWORD_DEFAULT);
			$confirmation=uniqid('',true);   //23 characters

			$prepared=$this->pdo->prepare($this->$sql['insert']);
			$data=array($givenname,$familyname,$email,$password,$confirmation);

			$prepared->execute($data);

			return $confirmation;
		}

		public function confirm($email, $confirmation,$password) {
			$prepared=$this->pdo->prepare($this->$sql['confirm']);
			$data=array($email, $confirmation);
			$prepared->execute($data);

			$row=$prepared->fetch();
			if($row && !password_verify($password,$row['password'])) $row=null;

			return $row;
		}

		public function confirmation($confirmation) {
			$prepared=$this->pdo->prepare($this->sql['confirmation']);
			$data=array($confirmation);
			$prepared->execute($data);
			return $prepared->fetchColumn();

		}

		public function login($email,$password) {
			$prepared=$this->pdo->prepare($this->sql['login']);
			$data=array($email);
			$prepared->execute($data);

			$row=$prepared->fetch();
			if($row && !password_verify($password,$row['password'])) $row=null;

			return $row;
		}

	}
