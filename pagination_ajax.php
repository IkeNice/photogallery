<?php

include 'functions.php';
$dir = 'img/small/';
$bdir = 'img/big/';
$images = get_images($dir);

require_once 'pagination.php';

// формирование + вывод
if($images): $i = $start_pos + 1;
    $output = null;
    for($j = $start_pos; $j < $end_pos; $j++):
        $output .= '<div class="item">';
        $output .= '<div>';
        $output .= '<a  data-lightbox="lightbox" href="' .$bdir . $images[$j]. '">';
        $output .= '<img class="front" src="' .$dir . $images[$j]. '" alt="">';
        $output .= ' <span class="back">Фото ' .$i. '</span>';
        $output .= '</a>';
        $output .= '</div>';
        $output .= '</div>';
        $i++; 
    endfor;
endif;

echo $output . '<div class="clear"></div><div class="pagination">' .$pagination. '</div>';

?>