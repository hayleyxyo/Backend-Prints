<?php
#	require_once 'config.php';

	define('DATABASE','prints');
	define('USER','printsadmin');
	define('PASSWORD','Test@123');

	$pdo=PDOConnect(DATABASE,USER,PASSWORD,true);

	function PDOConnect($database,$user,$password,$development=false) {
		$dsn=sprintf('mysql:host=localhost;dbname=%s',$database);
		try {
			$pdo = new PDO($dsn,$user,$password);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
		if($development) $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//	MySQL Only
			$pdo->exec('SET SESSION TRANSACTION ISOLATION LEVEL SERIALIZABLE;');
			$pdo->exec('SET SESSION sql_mode = \'ANSI\';');

		//				ANSI	MySQL
		//	||			Concat	or
		//	"			Field	Quote
		//	fn			fn (	fn(
		//	REAL		FLOAT	DOUBLE
		//	GROUP BY	Any		Field List only

		//	--sql-mode=REAL_AS_FLOAT,PIPES_AS_CONCAT,ANSI_QUOTES,IGNORE_SPACE,ONLY_FULL_GROUP_BY
		//	--transaction-isolation=SERIALIZABLE

		return $pdo;
	}

?>
