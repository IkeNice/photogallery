<?php
// ДЛЯ РАБОТЫ БЕЗ ДБ
// include 'functions.php';
// $dir = 'img/small/';
// $bdir = 'img/big/';
// $images = get_images($dir);
// require_once 'pagination.php';
//

// ДЛЯ РАБОТЫ С ДБ
require_once 'config.php';
include 'functions.php';

$gallery = isset($_GET['gallery']) ? (int)$_GET['gallery'] : 1;
if($gallery < 1)
    $gallery = 1;

require_once 'pagination.php';

$dir = 'img/small/';
$bdir = 'img/big/';

$images = get_images_db($gallery, $start_pos, $perpage);
//

// формирование + вывод без бд
// if($images): $i = $start_pos + 1;
//     $output = null;
//     for($j = $start_pos; $j < $end_pos; $j++):
//         $output .= '<div class="item">';
//         $output .= '<div>';
//         $output .= '<a  data-lightbox="lightbox" href="' .$bdir . $images[$j]. '">';
//         $output .= '<img class="front" src="' .$dir . $images[$j]. '" alt="">';
//         $output .= ' <span class="back">Фото ' .$i. '</span>';
//         $output .= '</a>';
//         $output .= '</div>';
//         $output .= '</div>';
//         $i++; 
//     endfor;
// endif;
//

// формирование + вывод с дб
if($images): $output = null;
    foreach($images as $image):
        $output .= '<div class="item">';
        $output .= '<div>';
        $output .= '<a data-lightbox="lightbox" href="' .$bdir . $image['img']. '">';
        $output .= '<img class="front" src="' .$dir . $image['img']. '" alt="">';
        $output .= '<span class="back">' .$image['description']. '</span>';
        $output .= '</a>';
        $output .= '</div>';
        $output .= '</div>';
    endforeach;
endif;
//
echo $output . '<div class="clear"></div><div class="pagination">' .$pagination. '</div>';

?>