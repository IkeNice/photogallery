<?php
/*
function get_images($dir){
	$f = opendir($dir);
	while(false !== ($file = readdir($f))){
		// if($file == '.' || $file == '..') continue;
		if(!is_dir($dir . $file)) $files[] = $file;
	}
	return $files;
}
*/
function get_images($dir){
	@$files = scandir($dir);
	$pattern ="#\.(jpe?g|png)$#i";
	foreach($files as $key => $file){
		if(!preg_match($pattern, $file)){
			unset($files[$key]);
		}
	}
    return $files;
}

?>