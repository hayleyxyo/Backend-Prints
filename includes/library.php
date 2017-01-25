<?php
	function isEmail($text) {
		//	< 5.2
			//	$pattern='/^[a-zA-Z0-9_]+([\.\-][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([\.\-][a-zA-Z0-9_]+)*\.[a-zA-Z]{2,6}$/';
			//	return preg_match($pattern,$text);
		//	>= 5.2
			return filter_var($text, FILTER_VALIDATE_EMAIL);
	}

	function isimage($type) {
		$types=array('image/gif','image/jpeg','image/pjpeg','image/png');
		return in_array($type,$types);
	}

	function uploadError($file,$required=false) {
		switch($file['error']) {
			case 0:	return false;
			case 1:
			case 2:	return 'File too large';
			case 4:	return $required ? 'Missing File' : false;
			default: return 'Problem with file upload';
		}
	}
	function redirect($page,$uri=null) {
		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		header("Location: http://$host$uri/$page");
		exit;
	}
	function usetemplate($file,$data) {
		//	$file=name of file
		//	$data= array of names to be interpolated
		//	assumes [=name] notation

		//	$thing='hahaha'; $test=array('zero','one','two');
		//	$string='[=thing] Try [=test[0]] and [=test[1]] or [=test[2]] but not[=test[3]]';
		//	$data=explode(' ','thing test[0] test[2] etc');

		$file=file_get_contents($file);
		foreach($data as $datum)
			$file=str_replace("[=$datum]",eval("return @$$datum;"),$file);
			//	The following is simpler, but won’t work with array variables
			//$file=str_replace("[=$datum]",@$$datum,$file);
		return $file;
	}

	function pager($page,$pageCount) {
		$pager=array();
		$pager[]=	$page==1 			? '<span>First</span>' 		: '<a href="?page=1">First</a>';
		$pager[]=	$page==1 			? '<span>Previous</span>'	: '<a href="?page='.($page-1).'">Previous</a>';
		$pager[]=	$page==$pageCount	? '<span>Next</span>'		: '<a href="?page='.($page+1).'">Next</a>';
		$pager[]=	$page==$pageCount	? '<span>Last</span>'		: '<a href="?page='.$pageCount.'">Last</a>';

		return "<p>Page $page of $pageCount</p>".'<p>'.implode('',$pager).'</p>';
	}

	function options($name,$data,$id=0) {
		$options=array();
		foreach($data as $item)
			$options[]=sprintf('<option value="%s"%s>%s</option>',$item[0],$item[0]==$id ? ' selected' : '',$item[1]);
		return implode('',$options);
	}

	function printr($data) {
		print '<pre>';
		print_r($data);
		print '</pre>';
	}
	function fileNumber($text,$number) {
		$dot=strrpos($text,'.');
		$name=substr($text,0,$dot);
		$ext=substr($text,$dot+1);
		return sprintf('%s%06d.%s',$name,$number,$ext);
	}

	function relativeDirectory($from,$to) {
		for($i=0;$i<min(strlen($from),strlen($to))&&$from[$i]==$to[$i];$i++);
		$from=substr($from,$i);
		$to=substr($to,$i);
		$from="$from/";
		$from=preg_replace('://:','/',$from);
		$from=preg_replace(':[^/].*?/:','$1../',$from);
		return("$from$to");
	}

?>
