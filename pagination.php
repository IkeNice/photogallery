<?php
//----------- пагинация -----------//
    // фото на страницу
    $perpage = 9;
    // общее количество фото
    // $count_img = count($images);
    $count_img = count_all_images($gallery);
    // необходимое число страниц
    $count_pages = ceil($count_img / $perpage);
    // если число страниц равно 0
    if(!$count_pages) 
        $count_pages = 1;
    // получаем номер страницы 
    if( isset($_GET['page'])){
        $page = (int)$_GET['page'];
        if($page < 1) 
            $page = 1;
    }else{
        $page = 1;
    }
    // если запрашиваемая страница больше максимума
    if ($page > $count_pages)
        $page = $count_pages;
    // номер первой картинки на страницу
    $start_pos = ($page - 1) * $perpage;
    // номер последней картинки на страницу 
    $end_pos = $start_pos + $perpage;
    // если номер последней картинки больше числа всех картинок
    if($end_pos > $count_img)
        $end_pos = $count_img;
    // получаем пагинацию
    $pagination = pagination($page, $count_pages, $modrew = 1);