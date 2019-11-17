<?php
    include 'check_admin.php';
    include 'config.php';
    include 'functions.php';
    // удаление пользователей
    if (isset ($_POST['btnDeleteUser'])){
		deleteUser();
    }
    // удаление картинок 
    if (isset ($_POST['btnDeleteImg'])){
		deleteImg();
    }
    // ВЫБОРКА ПОЛЬЗОВАТЕЛЕЙ
    $queryUser = "SELECT * FROM users" ;       
    $resultUser = mysqli_query($db, $queryUser);
    // ВЫБОРКА КАРТИНОК
    $queryImg = "SELECT * FROM images" ;       
    $resultImg = mysqli_query($db, $queryImg);    
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body background="main_bg.jpg">
    <?php include "header.php"; ?>

<div class="block">
    <form name="first_f" method="post" action="admin.php">   
        <!-- Таблица зарегистрированных пользователей -->
        <table cellspacing="2" cellpadding="5" class="tableUser">
            <caption>Таблица зарегистрированных пользователей сайта</caption>
            <tr>
                <th>ID Пользователя</th>
                <th>Имя Пользователя</th>
                <th>Email Пользователя</th>
                <th>Пароль Пользователя</th>
                <th></th>
            </tr>
            <?php while($rowUser = mysqli_fetch_assoc($resultUser)) { ?>
                <tr>

                <?php if($rowUser['id'] == 0) {?>
                    <td contenteditable="false" align="center"> <?php echo ($rowUser['id']) ?> </td>
                    <td contenteditable="false" align="center"> <?php echo ($rowUser['user_login']) ?> </td>
                    <td contenteditable="false" align="center"><?php echo ($rowUser['email']) ?></td>
                    <td contenteditable="false" align="center"> <?php echo ($rowUser['user_password']) ?> </td>
                <?php }?>

                <?php if($rowUser['id'] != 0) {?>
                    <td contenteditable="false" align="center"> <?php echo ($rowUser['id']);?> </td>
                    <td contenteditable="false" align="center"><?php echo ($rowUser['user_login']) ?></td>
                    <td contenteditable="false" align="center"><?php echo ($rowUser['email']) ?></td>
                    <td contenteditable="false" align="center"><?php echo ($rowUser['user_password']) ?></td>
                    <td> <input type='checkbox' class='style_checkbox' name="check[]" value="<?php echo ($rowUser['id']) ?>">  </td>
                <?php }?>
                </tr>

            <?php }?>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th>
                    <br>
                    <input type="submit" name="btnDeleteUser" value="Удалить пользователя" />
                    <br> 
                    <br>  
                </th> 
                <th></th>
            </tr>
        </table>
        <!-- [] -->
        <!-- Таблица картинок -->
        <table cellspacing="2" cellpadding="5" class="tableImg">
            <caption>Таблица картинок</caption>
            <tr>
                <th>ID картинки</th>
                <th>ID галереи</th>
                <th>Название картинки</th>
                <th>Описание картинки</th>
                <th></th>
            </tr>
            <?php while($rowImg = mysqli_fetch_assoc($resultImg)) { ?>
                <tr>

                <?php if($rowImg['id'] == 0) {?>
                    <td contenteditable="false" align="center"> <?php echo ($rowImg['id']) ?> </td>
                    <td contenteditable="false" align="center"> <?php echo ($rowImg['gallery_id']) ?> </td>
                    <td contenteditable="false" align="center"><?php echo ($rowImg['img']) ?></td>
                    <td contenteditable="false" align="center"> <?php echo ($rowImg['description']) ?> </td>
                <?php }?>

                <?php if($rowImg['id'] != 0) {?>
                    <td contenteditable="false" align="center"> <?php echo ($rowImg['id']);?> </td>
                    <td contenteditable="false" align="center"><?php echo ($rowImg['gallery_id']) ?></td>
                    <td contenteditable="false" align="center"><?php echo ($rowImg['img']) ?></td>
                    <td contenteditable="false" align="center"><?php echo ($rowImg['description']) ?></td>
                    <td> <input type='checkbox' class='style_checkbox' name="check[]" value="<?php echo ($rowImg['id']) ?>">  </td>
                <?php }?>
                </tr>

            <?php }?>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th>
                    <br>
                    <input type="submit" name="btnDeleteImg" value="Удалить картинку" />
                    <br> 
                    <br>  
                </th> 
                <th></th>
            </tr>
        </table>
        <!-- [] -->
    </form>

</div>
</body>
</html>