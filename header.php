<?php
    require_once 'config.php';
?>
<link rel="stylesheet" href="css/style.css">
<header>
    <ul>
        <li class="cursoron"><a>Welcome to my Gallery!</a></li>
        <li style="float:right"><a href="logout.php">Logout</a></li>
        <li style="float:right"><a href="login.php">Login</a></li>
        <li style="float:right"><a href="admin.php">Admin</a></li>
        <li style="float:right"><a href="<?=SITE?>" class="active">Home</a></li>
    </ul>
</header>
