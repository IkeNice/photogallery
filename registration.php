<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="css/loginstyle.css">
        <link rel="stylesheet" type="text/css" href="<?=SITE?>css/style.css">
    <!-- <link rel="stylesheet" href="<?=SITE?>css/lightbox.css"> -->
    </head>
<body background="main_bg.jpg">
<?php include "header.php"; ?>
<?php
    require_once 'config.php';
    if(isset($_POST['user_login']) && isset($_POST['user_password'])){
        $username = $_POST['user_login'];
        $email = $_POST['email'];
        $password = $_POST['user_password'];
        
        $query = "INSERT INTO users (user_login, user_password, email) VALUES ('$username', '$password', '$email')";
        $result = mysqli_query($db, $query);
        
        if($result){
            $smsg = "Регистрация прошла успешно";
        } else {
            $fmsg = "ОШИБКА!!!";
        }
        if($result){
            // header("Location: ".SITE); 
        } else {
            $fmsg = "ОШИБКА!!!";
        }
    }
?> 

    <div class="container">
	    <section id="content">
            <form action="" method="POST">
                <h1>Registration Form</h1>

                <?php  if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php }?>
                <?php  if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php }?>

                <div>
                    <input type="text" name="user_login" placeholder="Username" required>    
                </div>

                <div>
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                
                <div>
                    <input type="password" name="user_password" placeholder="Passsword" required>
                </div>

                <div>
                    <input type="submit" value="Register" />
                    <!-- <a href="<?=SITE?>">Return home</a> -->
                    <a href="login.php" class="log">Login</a>
                </div>
                
            </form>
	        </section>
    </div>

    </body>
</html>