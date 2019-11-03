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


/**
* получение картинок из каталога 
**/
function get_images($dir){
	@$files = scandir($dir);
	if(!$files) 
		return false;
	$pattern ="#\.(jpe?g|png)$#i";
	foreach($files as $key => $file){
		if(!preg_match($pattern, $file)){
			unset($files[$key]);
		}
	}
	$files = array_merge($files);
    return $files;
}

/**
* Постраничная навигация
**/
function pagination($page, $count_pages, $modrew = false){
	// << < 3 4 5 6 7 > >>
	$back = null; // ссылка НАЗАД
	$forward = null; // ссылка ВПЕРЕД
	$startpage = null; // ссылка В НАЧАЛО
	$endpage = null; // ссылка В КОНЕЦ
	$page2left = null; // вторая страница слева
	$page1left = null; // первая страница слева
	$page2right = null; // вторая страница справа
	$page1right = null; // первая страница справа
   
	$uri = "?";
	if(!$modrew){
	// если есть параметры в запросе
		if( $_SERVER['QUERY_STRING'] ){
			foreach ($_GET as $key => $value) {
				if( $key != 'page' ) $uri .= "{$key}=$value&amp;";
			}
	 	}
	}else{
		$url = $_SERVER['REQUEST_URI'];
	 	$url = explode("?", $url);
	 	if(isset($url[1]) && $url[1] != ''){
			$params = explode("&", $url[1]);
			foreach($params as $param){
				if(!preg_match("#page=#", $param)) $uri .= "{$param}&amp;";
			}
	 	}
	}
   
	if( $page > 1 ){
	 	$back = "<a class='nav-link' data-page='" .($page-1). "' href='{$uri}page=" .($page-1). "'>&lt;</a>";
	}
	if( $page < $count_pages ){
		$forward = "<a class='nav-link' data-page='" .($page+1). "' href='{$uri}page=" .($page+1). "'>&gt;</a>";
	}
	if( $page > 3 ){
	 	$startpage = "<a class='nav-link' data-page='1' href='{$uri}page=1'>&laquo;</a>";
	}
	if( $page < ($count_pages - 2) ){
	 	$endpage = "<a class='nav-link' data-page='" .$count_pages. "' href='{$uri}page={$count_pages}'>&raquo;</a>";
	}
	if( $page - 2 > 0 ){
	 	$page2left = "<a class='nav-link' data-page='" .($page-2). "' href='{$uri}page=" .($page-2). "'>" .($page-2). "</a>";
	}
	if( $page - 1 > 0 ){
	 	$page1left = "<a class='nav-link' data-page='" .($page-1). "' href='{$uri}page=" .($page-1). "'>" .($page-1). "</a>";
	}
	if( $page + 1 <= $count_pages ){
	 	$page1right = "<a class='nav-link' data-page='" .($page+1). "' href='{$uri}page=" .($page+1). "'>" .($page+1). "</a>";
	}
	if( $page + 2 <= $count_pages ){
	 	$page2right = "<a class='nav-link' data-page='" .($page+2). "' href='{$uri}page=" .($page+2). "'>" .($page+2). "</a>";
	}
   
	return $startpage.$back.$page2left.$page1left.'<a class="nav-active">'.$page.'</a>'.$page1right.$page2right.$forward.$endpage;
   }

   /**
	* получение картинок из БД для определенной галереи
    **/
   	function get_images_db($gallery, $start_pos, $perpage){
		global $db;
		$query = "SELECT id, img, description FROM images WHERE gallery_id = $gallery ORDER BY id ASC LIMIT $start_pos, $perpage";
		$res = mysqli_query($db, $query);
		$images = array();
		while($row = mysqli_fetch_assoc($res)){
			$images[$row['id']] = $row;
		}
		return $images;
	}
	/**
	 * получение всех картинок из базы 
	**/
	function get_all_images_db($gallery, $start_pos, $perpage){
		global $db;
		$query = "SELECT id, img, description FROM images LIMIT $start_pos, $perpage";
		$res = mysqli_query($db, $query);
		$images = array();
		while($row = mysqli_fetch_assoc($res)){
			$images[$row['id']] = $row;
		}
		return $images;
	}
 	/**
  	* количество картинок определнной галереи 
	**/
  	function count_images($gallery){
		global $db;
		$query = "SELECT COUNT(*) FROM images WHERE gallery_id = $gallery";
		$res = mysqli_query($db, $query);
		$row = mysqli_fetch_row($res);
		// print_r($row);
		return $row[0];
	}	
	/**
	* количество всех картинок в галерее 
	**/
	function count_all_images($gallery){
		global $db;
		$query = "SELECT COUNT(*) FROM images ";
		$res = mysqli_query($db, $query);
		$row = mysqli_fetch_row($res);
		return $row[0];
	}	
	  
	function get_users(){
		global $db;
		$query = "SELECT user_login, user_password FROM users";
		$res = mysqli_query($db, $query);
		$users = array();
		while($row = mysqli_fetch_assoc($res)){
			$users[$row['user_login']] = $row;
		}
		return $users;
	}

	function deleteUser(){
		global $db;
		$data_id = join(', ', $_POST['check']);
		$query = 'DELETE FROM `users` WHERE id IN ('.$data_id.')';
    	$delete = mysqli_query($db,$query);
 	}

?>