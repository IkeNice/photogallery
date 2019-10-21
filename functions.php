<?php

function get_images($dir){
	$f = opendir($dir);
	while(false !== ($file = readdir($f))){
		// if($file == '.' || $file == '..') continue;
		if(!is_dir($dir . $file)) $files[] = $file;
	}
	return $files;
}

// function get_images($dir){
//     $files = scandir($dir);
//     unset($files[0], $files[1]);
//     return $files;
//}

?>