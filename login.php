<?php
    session_start();
    require('config.php');
    if(isset($_POST['user_login']) and isset($_POST['user_password'])){
        $username = $_POST['user_login'];
        $password = $_POST['user_password'];
  
        $query = "SELECT * FROM users WHERE `user_login`='$username' and `user_password` ='$password'";
        $result = mysqli_query($db, $query) or die(mysqli_error($db));
        $count = mysqli_num_rows($result);
        // print_r($count);
        if($count == 1){
            $_SESSION['user_login'] = $username;
        } else {
            $fmsg = "Данные введены не правильно.";
        }
    }
    if(isset($_SESSION['user_login'])){
        $username = $_SESSION['user_login'];
        // echo "Hello, " . $username . "!";
        // echo "Login successful!";
        header("Location: ".SITE);        
    } else {
        //  $fmsg = "Ошибка входа!"; 
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- <link rel="stylesheet" href="css/stylelogin.css"> -->
        <link rel="stylesheet" href="css/loginstyle.css">
</head>
<body background="main_bg.jpg">

    <!-- <div class="container">
        <form action="<?=SITE?>" class="form-singin" method="POST">
            <h2>Login</h2>
            
            <input type="text" name="username" class="form-control" placeholder="Username" required>
            <input type="password" name="password" class="form-control" placeholder="Passsword" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
            <a href="registration.php" class="btn btn-lg btn-primary btn-block">Register</a>
            <a href="<?=SITE?>" class="btn btn-lg btn-primary btn-block">Return Home</a>
                
        </form>
    </div> -->

    <div class="container">
        <section id="content">
            <form  method="POST" >
                <h1>Login Form</h1>

                <?php  if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php }?>

                <div>
                    <input type="text" name="user_login" class="form-control" placeholder="Username" required="">
                </div>
                <div>
                    <input type="password" name="user_password" class="form-control" placeholder="Passsword" required="">
                </div>
                <div>
                    <input type="submit" value="Log in" />
                    <a href="<?=SITE?>">Return home</a>
                    <a href="registration.php">Register</a>
                </div>
            </form>	
        </section>
    </div>



    </body>
</html>