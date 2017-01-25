<?php
	require_once"$root/includes/classes/class.catalogue.php";
	$catalogue=new Catalogue($pdo);

	$tbody=array();

	$template='<tr><td><img src="/images/thumbnails/%s" alt="%s" width="160" height="120"></td></tr>';

	$result=$catalogue->selectSome(array(3,5));
	foreach($result as $row) {
		$tbody[]=sprintf($template,$row['src'],$row['title']);
	}

	$tbody=implode('',$tbody);
