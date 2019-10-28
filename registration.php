<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- <link rel="stylesheet" href="css/stylelogin.css"> -->
        <link rel="stylesheet" href="css/loginstyle.css">
    </head>
<body background="main_bg.jpg">
<?php
    require_once 'config.php';
    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $query = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
        $result = mysqli_query($db, $query);
        
        if($result){
            $smsg = "Регистрация прошла успешно";
        } else {
            $fmsg = "ОШИБКА!!!";
        }
    }
?> 

    <!-- <div class="container">
        <form action="" class="form-singin" method="POST">
            <h2>Registration</h2>
            
            <?php  if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php }?>
            <?php  if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php }?>

            <input type="text" name="username" class="form-control" placeholder="Username" required>
            <input type="email" name="email" class="form-control" placeholder="Email" required>
            <input type="password" name="password" class="form-control" placeholder="Passsword" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
            <a href="login.php" class="btn btn-lg btn-primary btn-block">Login</a>
            <a href="<?=SITE?>" class="btn btn-lg btn-primary btn-block">Return Home</a>
                
        </form>
    </div> -->


    <div class="container">
	    <section id="content">
            <form action="" method="POST">
                <h1>Registration Form</h1>

                <?php  if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php }?>
                <?php  if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php }?>

                <div>
                    <input type="text" name="username" class="form-control" placeholder="Username" required>    
                </div>

                <div>
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
                
                <div>
                    <input type="password" name="password" class="form-control" placeholder="Passsword" required>
                </div>
                <div>
                    <input type="submit" value="Register" />
                    <a href="<?=SITE?>">Return home</a>
                    <a href="login.php" class="log">Login</a>
                </div>
            </form><!-- form -->
	        </section><!-- content -->
    </div><!-- container -->

    </body>
</html>