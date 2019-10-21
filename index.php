<?php

    include 'functions.php';
    $dir = 'img/small/';
    $bdir = 'img/big/';
    $images = get_images($dir);

?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gallery</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/lightbox.css">
</head>

<body>
    <h1 align="center">Welcome to my Gallery!</h1>
    <div class="wrapper">
        <div class="gallery">

            <!-- ВЫВОД КАРТИНОК В ЦИКЛЕ -->
            <?php if($images): $i = 1?>
                <?php foreach($images as $image): ?>
                    <div class="item">
                        <div>
                            <a  data-lightbox="lightbox" href="<?= $bdir . $image ?>">
                                <img class="front" src="<?= $dir . $image ?>" alt="">
                                <span class="back">Фото <?=$i?></span>
                            </a>
                        </div>
                    </div>
                <?php $i++; endforeach; ?>
            <?php else: ?>
                <p>В данной галерее нет картинок</p>
            <?php endif; ?>

        </div>
   
    </div>

<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="js/lightbox.min.js"></script>
</body>
</html>