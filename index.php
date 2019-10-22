<?php

    include 'functions.php';
    $dir = 'img/small/';
    $bdir = 'img/big/';
    $images = get_images($dir);

//----------- пагинация -----------//
    // фото на страницу
    $perpage = 6;
    // общее количество фото
    $count_img = count($images);
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
    $pagination = pagination($page, $count_pages)
//--------------------//

?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gallery</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="css/lightbox.css">
</head>

<body background="main_bg.jpg">
    <h1 align="center">Welcome to my Gallery!</h1>

    <!-- БОКОВОЕ МЕНЮ -->
    <div class="category-wrap">
        <h3>Категории</h3>
        <ul>
          <li><a href="">Портрет</a></li>
          <li><a href="">Макро</a></li>
          <li><a href="">Пейзаж</a></li>
        </ul>
    </div>

    <div class="wrapper">
        <div class="gallery">
            <!-- ВЫВОД КАРТИНОК В ЦИКЛЕ -->
            <!-- <?php //if($images): $i = 1?>
                <?php //foreach($images as $image): ?>
                    <div class="item">
                        <div>
                            <a  data-lightbox="lightbox" href="<?= $bdir . $image ?>">
                                <img class="front" src="<?= $dir . $image ?>" alt="">
                                <span class="back">Фото <?=$i?></span>
                            </a>
                        </div>
                    </div>
                <?php //$i++; endforeach; ?>
            <?php //else: ?>
                <p>В данной галерее нет картинок</p>
            <?php //endif; ?> -->

            <!-- ДЛЯ ПАГИНАЦИИ -->
            <?php if($images): $i = $start_pos + 1?>
            <?php for($j = $start_pos; $j < $end_pos; $j++): ?>
                <div class="item">
                    <div>
                        <a  data-lightbox="lightbox" href="<?= $bdir . $images[$j] ?>">
                            <img class="front" src="<?= $dir . $images[$j] ?>" alt="">
                            <span class="back">Фото <?=$i?></span>
                        </a>
                    </div>
                </div>
            <?php $i++; endfor; ?>
            <?php else: ?>
                <p>В данной галерее нет картинок</p>
            <?php endif; ?>
            <!--  -->
            <div class="clear">
            <?php if($count_pages > 1): ?>
                <div class="pagination"><?=$pagination?></div>
            <?php endif; ?>
            </div>

        </div>
    </div>

<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="js/lightbox.min.js"></script>
</body>
</html>