<?php

    define("SITE", "http://photogallery/");

    define("DBHOST", "localhost");
    define("DBUSER", "root");
    define("DBPASS", "");
    define("DBNAME", "gallery");
    
    $db = @mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME) or die("Нет подключения к БД!");
    mysqli_set_charset($db, "utf8") or die("Не установлена кодировка соединения");
    