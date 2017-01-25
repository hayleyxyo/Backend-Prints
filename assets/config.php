<?php
	//	See Sample configdata.php file
	//	Useful Global Variables
		$host = $_SERVER['HTTP_HOST'];
		$root = dirname(__FILE__);

	$CONFIG=array();
	foreach(file("$root/config-data.php") as $line) {
		$line=trim($line);
		if($line && $line[0]!='#') {
			$line=preg_split('/\s+/',$line,2);
			if($line[0][0]=='!') define(substr($line[0],1),isset($line[1]) ? $line[1] : true);
			else $CONFIG[$line[0]] = isset($line[1]) ? $line[1] : true;
		}
	}
?>
