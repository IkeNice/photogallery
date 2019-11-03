<?php
    include 'check_admin.php';
    include 'config.php';
    include 'functions.php';
    if (isset ($_POST['btnDelete'])){
		deleteUser();
	}
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
        <?php $query = "SELECT * FROM users" ;?>        
        <?php $result = mysqli_query($db, $query);?>          
        <table cellspacing="2" cellpadding="5" >
            <caption>Таблица зарегистрированных пользователей сайта</caption>
            <tr>
                <th>ID Пользователя</th>
                <th>Имя Пользователя</th>
                <th>Email Пользователя</th>
                <th>Пароль Пользователя</th>
                <th></th>
            </tr>
            <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>

                <?php if($row['id'] == 0) {?>
                    <td contenteditable="false" align="center"> <?php echo ($row['id']) ?> </td>
                    <td contenteditable="false" align="center"> <?php echo ($row['user_login']) ?> </td>
                    <td contenteditable="false" align="center"><?php echo ($row['email']) ?></td>
                    <td contenteditable="false" align="center"> <?php echo ($row['user_password']) ?> </td>
                <?php }?>

                <?php if($row['id'] != 0) {?>
                    <td contenteditable="false" align="center"> <?php echo ($row['id']);?> </td>
                    <td contenteditable="false" align="center"><?php echo ($row['user_login']) ?></td>
                    <td contenteditable="false" align="center"><?php echo ($row['email']) ?></td>
                    <td contenteditable="false" align="center"><?php echo ($row['user_password']) ?></td>
                    <td> <input type='checkbox' class='style_checkbox' name="check[]" value="<?php echo ($row['id']) ?>">  </td>
                <?php }?>
                </tr>

            <?php }?>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th>
                    <br>
                    <input type="submit" name="btnDelete" value="Удалить пользователя" />
                    <br> 
                    <br>  
                </th> 
            </tr>
        </table>
    </form>

</div>
<?php include "footer.php"; ?>
</body>
</html>
