<?php
  
    include 'functions.php';
    $dir = 'img/small/';
    $bdir = 'img/big/';
    $images = get_images($dir);
    require_once 'pagination.php';

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
            <?php if($images): $i = $start_pos + 1;?>
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
<script src="js/script.js"></script>
</body>
</html>